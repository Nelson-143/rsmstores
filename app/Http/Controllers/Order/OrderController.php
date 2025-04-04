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
use App\Models\Debt;
use App\Mail\StockAlert;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Str;

class OrderController extends Controller
{
    public function index()
    {
        
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $orders = Order::query()
            ->where('account_id', $accountId) // Filter by account_id
            ->count();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $products = Product::query()
            ->where('account_id', $accountId) // Filter by account_id
            ->with(['category', 'unit'])
            ->get();

        $customers = Customer::where('user_id', $userId)
            ->where('account_id', $accountId) // Filter by account_id
            ->get(['id', 'name']);

        $carts = Cart::content();

        return view('orders.create', [
            'products' => $products,
            'customers' => $customers,
            'carts' => $carts,
        ]);
    }

    public function store(OrderStoreRequest $request)
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

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
            'user_id' => $userId,
            'account_id' => $accountId, // Set the account_id
            'uuid' => Str::uuid(),
        ]);

     $contents = Cart::content();
foreach ($contents as $content) {
    $oDetails = new OrderDetails();
    $oDetails->order_id = $order['id'];
    $oDetails->product_id = $content->id;
    $oDetails->quantity = $content->qty;
    $oDetails->unitcost = $content->price;
    $oDetails->total = $content->subtotal;
    $oDetails->created_at = Carbon::now();
    $oDetails->account_id = $order->account_id;
    $oDetails->save();
}

        // Delete Cart Shopping History
        Cart::destroy();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order has been created!');
    }

    public function show($uuid)
    {
       
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $order = Order::where('uuid', $uuid)
           
            ->where('account_id', $accountId) // Filter by account_id
            ->firstOrFail();

        $order->loadMissing(['customer', 'details']);

        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function update($uuid, Request $request)
    {
     
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $order = Order::where('uuid', $uuid)
            
            ->where('account_id', $accountId) // Filter by account_id
            ->firstOrFail();

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
            foreach (User ::all('email') as $admin) {
                $listAdmin[] = $admin->email;
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
     
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $order = Order::where('uuid', $uuid)
           
            ->where('account_id', $accountId) // Filter by account_id
            ->firstOrFail();

        $order->delete();
    }

    public function downloadInvoice($uuid)
    {
        
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        $order = Order::with(['customer', 'details'])
            ->where('uuid', $uuid)
            
            ->where('account_id', $accountId) // Filter by account_id
            ->firstOrFail();

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

    public function showOrder($orderId)
    {
       
        $accountId = auth()->user()->account_id; // Get the account_id of the logged-in user

        // Fetch the order with its related customer and items
        $order = Order::with(['customer', 'details'])
            ->where('uuid', $orderId)
          
            ->where('account_id', $accountId) // Filter by account_id
            ->firstOrFail();

        return view('orders.show', compact('order'));
    }
 


public function approve($uuid)
{
    // Find the order by UUID
    $order = Order::where('uuid', $uuid)->firstOrFail();

    // Update the order status to COMPLETE
    $order->update([
        'order_status' => OrderStatus::COMPLETE,
    ]);

    // Optionally, reduce the product stock here (if not already handled elsewhere)
    foreach ($order->details as $detail) {
        $product = Product::find($detail->product_id);
        $product->update([
            'quantity' => $product->quantity - $detail->quantity,
        ]);
    }

    return redirect()
        ->route('orders.index')
        ->with('success', 'Order approved successfully!');
}



}


