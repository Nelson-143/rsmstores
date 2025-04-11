<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CreateOrder extends Component
{
    public $products;
    public $customers;
    public $activeTab = 1;
    public $purchaseDate;
    public $selectedCustomers = [];
    public $searchProduct = '';
    public $searchCustomer = '';
    public $showModal = false;
    public $customProductName;
    public $customProductQuantity;
    public $customProductPrice;
    public float $taxRate;

    public function mount()
    {
        $this->products = Product::where('account_id', auth()->user()->account_id)
            ->with(['category', 'unit'])
            ->get();
        $this->customers = Customer::where('account_id', auth()->user()->account_id)
            ->get()
            ->sortBy('name');
        
        $this->purchaseDate = now()->format('Y-m-d');
        $this->taxRate = auth()->user()->account->tax_rate ?? 0;
        for ($i = 1; $i <= 5; $i++) {
            $this->selectedCustomers[$i] = 'pass_by';
            Cart::instance('customer' . $i);
        }
        Log::info('CreateOrder mounted', ['user_id' => auth()->id(), 'tax_rate' => $this->taxRate]);
    }

    public function switchTab($tab)
    {
        Log::info('Switching tab', ['from' => $this->activeTab, 'to' => $tab]);
        $this->activeTab = $tab;
        // Optionally reset search or other tab-specific state
        $this->searchProduct = '';
        $this->searchCustomer = '';
    }
    public function render()
    {
        $filteredProducts = $this->products->filter(function ($product) {
            return empty($this->searchProduct) || Str::contains(Str::lower($product->name), Str::lower($this->searchProduct));
        });
    
        $filteredCustomers = $this->customers->filter(function ($customer) {
            return empty($this->searchCustomer) || Str::contains(Str::lower($customer->name), Str::lower($this->searchCustomer));
        });
    
        $currentCart = Cart::instance('customer' . $this->activeTab)->content();
    
        return view('livewire.create-order', [
            'filteredProducts' => $filteredProducts,
            'filteredCustomers' => $filteredCustomers,
            'currentCart' => $currentCart,
            'taxRate' => $this->taxRate,
        ])->extends('layouts/tabler')->section('content');
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $tax = $product->selling_price * ($this->taxRate / 100);
            Cart::instance('customer' . $this->activeTab)->add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['tax' => $tax],
            ]);
            session()->flash('success', 'Product added to cart!');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }

    public function updateCart($rowId, $qty)
    {
        $cartItem = Cart::instance('customer' . $this->activeTab)->get($rowId);
        if ($cartItem) {
            $product = Product::find($cartItem->id);
            if ($product && $qty > $product->quantity) {
                session()->flash('error', 'Requested quantity for ' . $product->name . ' exceeds stock.');
                return;
            }
            $tax = $product->selling_price * ($this->taxRate / 100);
            Cart::instance('customer' . $this->activeTab)->update($rowId, [
                'qty' => $qty,
                'options' => ['tax' => $tax],
            ]);
            session()->flash('success', 'Cart updated!');
        }
    }

    public function removeFromCart($rowId)
    {
        Cart::instance('customer' . $this->activeTab)->remove($rowId);
        session()->flash('success', 'Product removed from cart!');
    }

    public function addCustomProduct()
    {
        $this->validate([
            'customProductName' => 'required|string',
            'customProductQuantity' => 'required|numeric|min:1',
            'customProductPrice' => 'required|numeric|min:0',
        ]);

        $tax = $this->customProductPrice * ($this->taxRate / 100);
        Cart::instance('customer' . $this->activeTab)->add([
            'id' => uniqid(),
            'name' => $this->customProductName,
            'qty' => $this->customProductQuantity,
            'price' => $this->customProductPrice,
            'weight' => 1,
            'options' => ['tax' => $tax],
        ]);

        $this->reset(['customProductName', 'customProductQuantity', 'customProductPrice', 'showModal']);
        session()->flash('success', 'Custom product added to cart!');
    }

    public function createOrder()
    {
        Log::info('createOrder method started', ['activeTab' => $this->activeTab]);

        $currentCart = Cart::instance('customer' . $this->activeTab)->content();
        Log::info('Cart contents', ['cart' => $currentCart->toArray()]);

        if ($currentCart->isEmpty()) {
            session()->flash('error', 'Cart is empty. Cannot proceed to invoice.');
            Log::warning('Cart is empty');
            return;
        }

        foreach ($currentCart as $item) {
            $product = Product::find($item->id);
            if ($product && $item->qty > $product->quantity) {
                session()->flash('error', 'Product "' . $product->name . '" is out of stock!');
                Log::warning('Stock check failed', ['product_id' => $item->id]);
                return;
            }
        }

        $subTotal = Cart::instance('customer' . $this->activeTab)->subtotalFloat();
        $vat = 0;
        foreach ($currentCart as $item) {
            $vat += $item->options->tax * $item->qty;
        }
        $total = $subTotal + $vat;

        session()->put('pending_order', [
            'cart' => $currentCart->toArray(),
            'customer_id' => $this->selectedCustomers[$this->activeTab],
            'sub_total' => $subTotal,
            'vat' => $vat,
            'total' => $total,
            'active_tab' => $this->activeTab,
            'tax_rate' => $this->taxRate,
        ]);

        Log::info('Redirecting to invoices.create without order creation', [
            'sub_total' => $subTotal,
            'vat' => $vat,
            'total' => $total,
        ]);
        return redirect()->route('invoices.create');
    }
}