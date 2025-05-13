<?php

namespace app\Http\Controllers\Product;

use app\Http\Controllers\Controller;
use app\Http\Requests\Product\StoreProductRequest;
use app\Http\Requests\Product\UpdateProductRequest;
use app\Models\Category;
use app\Models\Product;
use app\Models\Unit;
use app\Models\Supplier;
use App\Models\ProductLocation;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure authentication
    }

    public function index()
    {
        // Temporarily remove pagination for debugging
        $products = Product::with(['category', 'unit', 'supplier'])
            ->orderBy('created_at', 'desc')
            ->get();
    
        Log::debug('All products without pagination', [
            'count' => $products->count(),
            'items' => $products->pluck('id')
        ]);
    
        return view('products.index', ['products' => $products]);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();

        return view('products.create', compact('categories', 'units', 'suppliers'));
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'unit_id' => 'required|exists:units,id',
        'buying_price' => 'required|numeric|min:0',
        'selling_price' => 'required|numeric|min:0',
        'location_ids' => 'required|array',
        'quantities' => 'required|array',
        'location_ids.*' => 'exists:locations,id',
        'quantities.*' => 'required|integer|min:0',
    ]);

    $product = Product::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'unit_id' => $request->unit_id,
        'supplier_id' => $request->supplier_id,
        'buying_price' => $request->buying_price,
        'selling_price' => $request->selling_price,
        'tax' => $request->tax ?? 0,
        'tax_type' => $request->tax_type ?? 'fixed',
        'quantity_alert' => $request->quantity_alert ?? 0,
        'expire_date' => $request->expire_date,
        'notes' => $request->notes,
        'product_image' => $request->product_image ?? null,
        'account_id' => auth()->user()->account_id,
    ]);

    $locationIds = $request->input('location_ids', []);
    $quantities = $request->input('quantities', []);
    $totalQuantity = 0;
    foreach ($locationIds as $index => $locationId) {
        $quantity = $quantities[$index] ?? 0;
        if ($quantity > 0) {
            ProductLocation::create([
                'product_id' => $product->id,
                'location_id' => $locationId,
                'quantity' => $quantity,
                'account_id' => auth()->user()->account_id,
            ]);
            $totalQuantity += $quantity;
        }
    }
    // No need to set $product->quantity manually; it’s computed

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    public function show($uuid)
{
    $product = Product::with(['category', 'unit', 'supplier', 'user'])
                     ->where('uuid', $uuid)
                     ->firstOrFail();

    // Verify account access in middleware instead
    $this->authorize('view', $product);

    $barcode = (new BarcodeGeneratorHTML())->getBarcode($product->code, 'C128');
    return view('products.show', compact('product', 'barcode'));
}

    public function edit($uuid)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        // Ensure the product belongs to the logged-in user's account
        $product = Product::where('uuid', $uuid)
                            ->where('account_id', $accountId)
                            ->firstOrFail();

        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();

        return view('products.edit', compact('product', 'categories', 'units', 'suppliers'));
    }

   public function update(Request $request, $uuid)
{
    $product = Product::where('uuid', $uuid)->first();
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'unit_id' => 'required|exists:units,id',
        'buying_price' => 'required|numeric|min:0',
        'selling_price' => 'required|numeric|min:0',
        'location_ids' => 'required|array',
        'quantities' => 'required|array',
        'location_ids.*' => 'exists:locations,id',
        'quantities.*' => 'required|integer|min:0',
    ]);

    $product->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'unit_id' => $request->unit_id,
        'supplier_id' => $request->supplier_id,
        'buying_price' => $request->buying_price,
        'selling_price' => $request->selling_price,
        'tax' => $request->tax ?? 0,
        'tax_type' => $request->tax_type ?? 'fixed',
        'quantity_alert' => $request->quantity_alert ?? 0,
        'expire_date' => $request->expire_date,
        'notes' => $request->notes,
        'product_image' => $request->product_image ?? $product->product_image,
        'account_id' => auth()->user()->account_id,
    ]);

    ProductLocation::where('product_id', $product->id)->where('account_id', auth()->user()->account_id)->delete();
    $locationIds = $request->input('location_ids', []);
    $quantities = $request->input('quantities', []);
    foreach ($locationIds as $index => $locationId) {
        $quantity = $quantities[$index] ?? 0;
        if ($quantity > 0) {
            ProductLocation::create([
                'product_id' => $product->id,
                'location_id' => $locationId,
                'quantity' => $quantity,
                'account_id' => auth()->user()->account_id,
            ]);
        }
    }

    return redirect()->route('products.show', $product->uuid)->with('success', 'Product updated successfully.');
}

public function destroy($uuid)
{
    $accountId = auth()->user()->account_id;
    
    $product = Product::where('uuid', $uuid)
                     ->where('account_id', $accountId)
                     ->firstOrFail();

    // Remove image if exists
    if ($product->product_image && file_exists(public_path($product->product_image))) {
        unlink(public_path($product->product_image));
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}
}