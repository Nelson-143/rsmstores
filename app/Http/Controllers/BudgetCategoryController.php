<?php

namespace App\Http\Controllers;

use App\Models\BudgetCategory;
use Illuminate\Http\Request;

class BudgetCategoryController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:expense_categories,name',
        ]);

        BudgetCategory::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Expense category added successfully.');
    }
}
