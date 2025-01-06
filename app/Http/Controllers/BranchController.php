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
        return view('branches.index', compact('branches')); // Load the index view
        
    }

    /**
     * Show the form for creating a new branch (optional for API).
     */
    public function create()
    {
        return view('branches.create'); // Load the create view
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
        return response()->json(['message' => 'Branch created successfully', 'branch' => $branch], 201);
    }

    /**
     * Display the specified branch.
     */
    public function show(Branch $branch)
    {
        return response()->json($branch, 200);
    }

    /**
     * Show the form for editing the specified branch (optional for API).
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id); // Retrieve the branch by ID
        return view('branches.edit', compact('branch')); // Load the edit view
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
        return response()->json(['message' => 'Branch updated successfully', 'branch' => $branch], 200);
    }

    /**
     * Remove (disable) the specified branch from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->update(['status' => 'disabled']);
        return response()->json(['message' => 'Branch disabled successfully'], 200);
    }
}
