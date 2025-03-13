<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PosController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'unit'])->get();

        $customers = Customer::all()->sortBy('name');

        $carts = Cart::content();

        return view('pos.index', [
            'products' => $products,
            'customers' => $customers,
            'carts' => $carts,
        ]);
    }

    public function addCartItem(Request $request)
    {
        $request->all();

        $rules = [
            'id' => 'required|numeric',
            'name' => 'required|string',
            'selling_price' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        Cart::add(
            $validatedData['id'],
            $validatedData['name'],
            1,
            $validatedData['selling_price'],
            1,
            (array) $options = null
        );

        return redirect()
            ->back()
            ->with('success', 'Product has been added to cart!');
    }

    public function updateCartItem(Request $request, $rowId)
    {
        $rules = [
            'qty' => 'required|numeric',
            'product_id' => 'numeric'
        ];
        
        $validatedData = $request->validate($rules);
        if ($validatedData['qty'] > Product::where('id', intval($validatedData['product_id']))->value('quantity')) {
            return redirect()
            ->back()
            ->with('error', 'The requested quantity is not available in stock.');
        }
        

        Cart::update($rowId, $validatedData['qty']);

        return redirect()
            ->back()
            ->with('success', 'Product has been updated from cart!');
    }

    public function deleteCartItem(String $rowId)
    {
        Cart::remove($rowId);

        return redirect()
            ->back()
            ->with('success', 'Product has been deleted from cart!');
    }

    public function storeDebt(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id', // Allow null for personal debts
            'customer_set' => 'required|string|max:255', // Validate custom
            'amount' => 'required|numeric|min:1',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $debt = new Debt();
        $debt->customer_id = $request->input('customer_id'); // Can be null
        $debt->customer_set = $validated['customer_set']; // Store the customer set
        $debt->amount = $request->input('amount');
        $debt->amount_paid = 0; // Default to 0
        $debt->due_date = $request->input('due_date');
        $debt->account_id = auth()->user()->account_id; // Set the account ID
        $debt->save();

        return redirect()->route('debts.index')->with('success', 'Debt added successfully.');
    }
}
