<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use App\Mail\StockAlert;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->count();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        $products = Product::where('user_id', auth()->id())->with(['category', 'unit'])->get();

        $customers = Customer::where('user_id', auth()->id())->get(['id', 'name']);

        $carts = Cart::content();

        return view('orders.create', [
            'products' => $products,
            'customers' => $customers,
            'carts' => $carts,
        ]);
    }

    public function store(OrderStoreRequest $request)
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);
            if ($item->qty > $product->quantity) {
                return back()->withErrors(['error' => 'Product "' . $product->name . '" is out of stock!']);
            }
        }

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'payment_type' => $request->payment_type,
            'pay' => $request->pay,
            'order_date' => Carbon::now()->format('Y-m-d'),
            'order_status' => OrderStatus::PENDING->value,
            'total_products' => Cart::count(),
            'sub_total' => Cart::subtotal(),
            'vat' => Cart::tax(),
            'total' => Cart::total(),
            'invoice_no' => IdGenerator::generate([
                'table' => 'orders',
                'field' => 'invoice_no',
                'length' => 10,
                'prefix' => 'INV-'
            ]),
            'due' => (Cart::total() - $request->pay),
            'user_id' => auth()->id(),
            'uuid' => Str::uuid(),
        ]);

        // Create Order Details
        $contents = Cart::content();
        $oDetails = [];

        foreach ($contents as $content) {
            $oDetails['order_id'] = $order['id'];
            $oDetails['product_id'] = $content->id;
            $oDetails['quantity'] = $content->qty;
            $oDetails['unitcost'] = $content->price;
            $oDetails['total'] = $content->subtotal;
            $oDetails['created_at'] = Carbon::now();

            OrderDetails::insert($oDetails);
        }

        // Delete Cart Sopping History
        Cart::destroy();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order has been created!');
    }
    // public function store(OrderStoreRequest $request)
    // {
    //     // Check if any items in cart exceed the available stock
    //     foreach (Cart::content() as $item) {
    //         $product = Product::find($item->id);
    //         if ($item->qty > $product->quantity) {
    //             return back()->withErrors(['error' => 'Product "' . $product->name . '" is out of stock!']);
    //         }
    //     }

    //     // Create the order
    //     $order = Order::create([
    //         'customer_id' => $request->customer_id,
    //         'payment_type' => $request->payment_type,
    //         'pay' => $request->pay,
    //         'order_date' => Carbon::now()->format('Y-m-d'),
    //         'order_status' => 'PENDING',
    //         'total_products' => Cart::count(),
    //         'sub_total' => Cart::subtotal(),
    //         'vat' => Cart::tax(),
    //         'total' => Cart::total(),
    //         'invoice_no' => IdGenerator::generate([
    //             'table' => 'orders',
    //             'field' => 'invoice_no',
    //             'length' => 10,
    //             'prefix' => 'INV-'
    //         ]),
    //         'due' => (Cart::total() - $request->pay),
    //         'user_id' => auth()->id(),
    //         'uuid' => Str::uuid(),
    //     ]);

    //     // Store order details
    //     foreach (Cart::content() as $content) {
    //         OrderDetails::create([
    //             'order_id' => $order->id,
    //             'product_id' => $content->id,
    //             'quantity' => $content->qty,
    //             'unitcost' => $content->price,
    //             'total' => $content->subtotal,
    //         ]);

    //         // Reduce product quantity
    //         $product = Product::find($content->id);
    //         $product->update([
    //             'quantity' => $product->quantity - $content->qty
    //         ]);
    //     }

    //     // Clear the cart
    //     Cart::destroy();

    //     return redirect()
    //         ->route('orders.index')
    //         ->with('success', 'Order has been created successfully!');
    // }

    public function show($uuid)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        $order->loadMissing(['customer', 'details'])->get();
        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function update($uuid, Request $request)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        // TODO refactoring

        // Reduce the stock
        $products = OrderDetails::where('order_id', $order->id)->get();

        $stockAlertProducts = [];
        foreach ($products as $product) {
            $productEntity = Product::where('id', $product->product_id)->first();
            $newQty = $productEntity->quantity - $product->quantity;
            if ($newQty < $productEntity->quantity_alert) {
                $stockAlertProducts[] = $productEntity;
            }
            $productEntity->update(['quantity' => $newQty]);
        }

        if (count($stockAlertProducts) > 0) {
            $listAdmin = [];
            foreach (User::all('email') as $admin) {
                $listAdmin [] = $admin->email;
            }
            // Mail::to($listAdmin)->send(new StockAlert($stockAlertProducts));
        }
        $order->update([
            'order_status' => OrderStatus::COMPLETE,
            'due' => '0',
            'pay' => $order->total
        ]);

        return redirect()
            ->route('orders.complete')
            ->with('success', 'Order has been completed!');
    }

    public function destroy($uuid)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        $order->delete();
    }

    public function downloadInvoice($uuid)
    {
        $order = Order::with(['customer', 'details'])->where('uuid', $uuid)->firstOrFail();
        // TODO: Need refactor
        //dd($order);

        //$order = Order::with('customer')->where('id', $order_id)->first();
        // $order = Order::
        //     ->where('id', $order)
        //     ->first();

        return view('orders.print-invoice', [
            'order' => $order,
        ]);
    }

    public function cancel(Order $order)
    {
        $order->update([
            'order_status' => 2
        ]);
        $orders = Order::where('user_id',auth()->id())->count();

        return redirect()
            ->route('orders.index', [
                'orders' => $orders
            ])
            ->with('success', 'Order has been canceled!');
    }
    public function setActiveCustomer(Request $request)
{
    $request->validate([
        'active_customer' => 'required|integer|min:0|max:4'
    ]);

    session(['active_customer' => $request->active_customer]);

    return response()->json(['success' => true]);
}
public function updateCartItem(Request $request, $rowId)
{
    $qty = $request->input('qty');
    // Update cart logic
    return response()->json(['cartContent' => view('partials.cart-content', compact('cart'))->render()]);
}

public function deleteCartItem(Request $request)
{
    $rowId = $request->input('rowId');
    // Delete cart item logic
    return response()->json(['success' => true, 'cartContent' => view('partials.cart-content', compact('cart'))->render()]);
}

}
