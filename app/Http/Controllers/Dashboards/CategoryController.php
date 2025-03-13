<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure authentication
    }

    public function index()
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        // Fetch categories for the logged-in user's account
        $categories = Category::where('account_id', $accountId)
            ->where('user_id', auth()->id())
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        $data = $request->validated();
        $data['uuid'] = Str::uuid();
        $data['user_id'] = auth()->id();
        $data['account_id'] = $accountId; // Set the account_id
        $data['slug'] = Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        // Ensure the category belongs to the logged-in user's account
        $this->authorize('view', $category);

        $category = Category::where('slug', $category->slug)
            ->where('account_id', auth()->user()->account_id)
            ->firstOrFail();

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        // Ensure the category belongs to the logged-in user's account
        $this->authorize('update', $category);

        $category = Category::where('slug', $category->slug)
            ->where('account_id', auth()->user()->account_id)
            ->firstOrFail();

        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $slug)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        // Find the category by slug and account_id
        $category = Category::where(['slug' => $slug, 'account_id' => $accountId, 'user_id' => auth()->id()])->firstOrFail();

        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Ensure the category belongs to the logged-in user's account
        $this->authorize('delete', $category);

        $category = Category::where('slug', $category->slug)
            ->where('account_id', auth()->user()->account_id)
            ->firstOrFail();

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}