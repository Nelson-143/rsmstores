<?php

namespace app\Http\Controllers\Quotation;

use app\Enums\QuotationStatus;
use app\Models\Product;
use app\Models\Customer;
use app\Models\Quotation;
use app\Models\QuotationDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use app\Http\Requests\Quotation\StoreQuotationRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class QuotationController extends Controller
{
    public function index()
    {
        $account_id = auth()->user()->account_id;
        $quotations = Quotation::where("user_id", auth()->id())
                               ->where("account_id", $account_id)
                               ->count();

        return view('quotations.index', [
            'quotations' => $quotations
        ]);
    }

    public function create()
    {
        Cart::instance('quotation')->destroy();

        $account_id = auth()->user()->account_id;
        return view('quotations.create', [
            'cart' => Cart::content('quotation'),
            'products' => Product::where("user_id", auth()->id())
                                 ->where("account_id", $account_id)
                                 ->get(),
            'customers' => Customer::where("user_id", auth()->id())
                                   ->where("account_id", $account_id)
                                   ->get(),
        ]);
    }

    public function store(StoreQuotationRequest $request)
    {
        if (count(Cart::instance('quotation')->content()) === 0) {
            return redirect()->back()->with('message', 'Please search & select products!');
        }

        DB::transaction(function () use ($request) {
            $account_id = auth()->user()->account_id;
            $quotation = Quotation::create([
                'date' => $request->date,
                'reference' => $request->reference,
                'customer_id' => $request->customer_id,
                'customer_name' => Customer::where('id', $request->customer_id)
                                           ->where('account_id', $account_id)
                                           ->firstOrFail()
                                           ->name,
                'tax_percentage' => $request->tax_percentage,
                'discount_percentage' => $request->discount_percentage,
                'shipping_amount' => $request->shipping_amount, //* 100,
                'total_amount' => $request->total_amount, //* 100,
                'status' => $request->status,
                'note' => $request->note,
                "uuid" => Str::uuid(),
                "user_id" => auth()->id(),
                "account_id" => $account_id,
                'tax_amount' => Cart::instance('quotation')->tax(), //* 100,
                'discount_amount' => Cart::instance('quotation')->discount(), //* 100,
            ]);

            foreach (Cart::instance('quotation')->content() as $cart_item) {
                QuotationDetails::create([
                    'quotation_id' => $quotation->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price, //* 100,
                    'unit_price' => $cart_item->options->unit_price, //* 100,
                    'sub_total' => $cart_item->options->sub_total, //* 100,
                    'product_discount_amount' => $cart_item->options->product_discount, //* 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax, //* 100,
                ]);
                //status = sent, reduce product quantity
                if ($request->status == 1) {
                    Product::where('id', $cart_item->id)
                           ->where('account_id', $account_id)
                           ->update(['quantity' => DB::raw('quantity-' . $cart_item->qty)]);
                }
            }

            Cart::instance('quotation')->destroy();
        });

        return redirect()
            ->route('quotations.index')
            ->with('success', 'Quotation Created!');
    }

    public function show($uuid)
    {
        $account_id = auth()->user()->account_id;
        $quotation = Quotation::where("user_id", auth()->id())
                              ->where('account_id', $account_id)
                              ->where('uuid', $uuid)
                              ->firstOrFail();

        return view('quotations.show', [
            'quotation' => $quotation,
            'quotation_details' => QuotationDetails::where('quotation_id', $quotation->id)
                                                   ->get()
        ]);
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->update([
            "status" => 2
        ]);

        $account_id = auth()->user()->account_id;
        $quotations = Quotation::where("user_id", auth()->id())
                               ->where("account_id", $account_id)
                               ->count();

        return redirect()
            ->route('quotations.index', [
                'quotations' => $quotations
            ]);
    }

    // complete quotation method
    public function update(Request $request, $uuid)
    {
        $account_id = auth()->user()->account_id;
        $quotation = Quotation::where("user_id", auth()->id())
                              ->where('account_id', $account_id)
                              ->where('uuid', $uuid)
                              ->firstOrFail();

        $quotation->with(['customer', 'quotationDetails'])->get();
        $quotation->status = 1;
        
        // Reduce the stock
        $quoteProducts = $quotation->quotationDetails;

        foreach ($quoteProducts as $product) {
            Product::where('id', $product->product_id)
                   ->where('account_id', $account_id)
                   ->update(['quantity' => DB::raw('quantity-' . $product->quantity)]);
        }

        $quotation->save();

        return redirect()
            ->route('quotations.index')
            ->with('success', 'Quotation Completed!');
    }
}
