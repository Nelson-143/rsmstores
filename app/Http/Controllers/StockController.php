<?php
namespace app\Http\Controllers;

use app\Models\Product;
use app\Models\StockTransfer;
use app\Models\DamagedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log as Logger;


class StockController extends Controller
{public function transfer()
    {
        $accountId = auth()->user()->account_id; // Get the logged-in user's account_id
        $products = Product::where('account_id', $accountId)->get(); // Fetch products based on account_id
    
        // Fetch stock transfers for the logged-in user's account
        $stockTransfers = StockTransfer::where('account_id', $accountId)->with('product')->get();
    
        // Log the fetched products and stock transfers for debugging
        \Log::info('Fetched Products: ', $products->toArray());
        \Log::info('Fetched Stock Transfers: ', $stockTransfers->toArray());
    
        return view('stock.transfer', compact('products', 'stockTransfers'));
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

        // Attach account_id to the stock transfer
        $data = $request->all();
        $data['account_id'] = auth()->user()->account_id;

        StockTransfer::create($data);

        return redirect()->back()->with('success', 'Stock transfer recorded successfully.');
    }

    // Display damaged products form
    public function showDamagedForm()
    {
        $accountId = auth()->user()->account_id; // Get the logged-in user's account_id
        $products = Product::where('account_id', $accountId)->get(); // Fetch products based on account_id
    
        // Calculate remaining quantities
        foreach ($products as $product) {
            $totalDamagedQuantity = DamagedProduct::where('product_id', $product->id)
                ->where('account_id', $accountId)
                ->sum('quantity');
    
            $product->remaining_quantity = $product->quantity - $totalDamagedQuantity;
        }
    
        $damagedProducts = DamagedProduct::where('account_id', $accountId)->with('product')->get(); // Fetch damaged products
    
        return view('stock.damaged', compact('products', 'damagedProducts'));
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

    // Attach account_id to the damaged product record
    $data = $request->all();
    $data['account_id'] = auth()->user()->account_id;

    // Find the product
    $product = Product::find($data['product_id']);

    // Calculate the total damaged quantity for this product
    $totalDamagedQuantity = DamagedProduct::where('product_id', $product->id)
        ->where('account_id', $data['account_id'])
        ->sum('quantity');

    // Check if the product has enough quantity
    if ($product->quantity - $totalDamagedQuantity < $data['quantity']) {
        return redirect()->back()->withErrors(['quantity' => 'Not enough remaining quantity to record this damage.']);
    }

    // Create the damaged product record
    DamagedProduct::create($data);

    // Update the product's quantity
    $product->quantity -= $data['quantity'];
    $product->save();

    return redirect()->back()->with('success', 'Damaged product recorded successfully.');
}
}
