<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the branches.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches')); // Load the UI
    }

    /**
     * Store a newly created branch in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'created_by' => 'required|exists:users,id',
        ]);

        $branch = Branch::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Branch created successfully!',
            'branch' => $branch
        ], 201);
    }

    /**
     * Get the specified branch (AJAX request).
     */
    public function show($id)
    {
        $branch = Branch::findOrFail($id);

        return response()->json([
            'success' => true,
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified branch in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|in:active,disabled',
        ]);

        $branch->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Branch updated successfully!',
            'branch' => $branch
        ]);
    }

    /**
     * Disable the specified branch.
     */
    public function destroy(Branch $branch)
    {
        $branch->update(['status' => 'disabled']);

        return response()->json([
            'success' => true,
            'message' => 'Branch disabled successfully!'
        ]);
    }
}
