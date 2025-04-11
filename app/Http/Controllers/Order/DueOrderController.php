<?php

namespace app\Http\Controllers\Order;

use app\Models\Customer;
use app\Models\Order;
use app\Models\OrderDetails;
use app\Models\Product;
use app\Models\User;
use app\Http\Controllers\Controller;
use app\Mail\StockAlert;
use Illuminate\Http\Request;

class DueOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('due', '>', '0')
            ->latest()
            ->with('customer')
            ->get();

        return view('due.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        $order->loadMissing(['customer', 'details'])->get();

        return view('due.show', [
           'order' => $order
        ]);
    }

    public function edit(Order $order)
    {
        $order->loadMissing(['customer', 'details'])->get();

        $customers = Customer::select(['id', 'name'])->get();

        return view('due.edit', [
            'order' => $order,
            'customers' => $customers
        ]);
    }

    public function update(Order $order, Request $request)
    {
        $rules = [
            'pay' => 'required|numeric'
        ];

        $validatedData = $request->validate($rules);

        $mainPay = $order->pay;
        $mainDue = $order->due;

        $paidDue = $mainDue - $validatedData['pay'];
        $paidPay = $mainPay + $validatedData['pay'];

        $order->update([
            'due' => $paidDue,
            'pay' => $paidPay
        ]);
        // no more due
        if ($paidDue == 0) {
            $order->update([
                'order_status' => 1
            ]);
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
                Mail::to($listAdmin)->send(new StockAlert($stockAlertProducts));
            }
        }

        return redirect()
            ->route('due.index')
            ->with('success', 'Due amount has been updated!');
    }
}