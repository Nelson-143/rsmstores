<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransfer;
use App\Models\DamagedProduct;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function transfer()
    {
        $products = Product::all();
        return view('stock.transfer', compact('products'));
    }
    // Handle stock transfer
    public function transferStock(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        StockTransfer::create($request->all());

        return redirect()->back()->with('success', 'Stock transfer recorded successfully.');
    }

    // Display damaged products form
    public function showDamagedForm()
    {
        $products = Product::all();
        return view('stock.damaged', compact('products'));
    }

    // Record damaged product
    public function recordDamaged(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'location' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
        ]);

        DamagedProduct::create($request->all());

        return redirect()->back()->with('success', 'Damaged product recorded successfully.');
    }
}
