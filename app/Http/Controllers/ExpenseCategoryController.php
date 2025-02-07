<?php
namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:expense_categories,name',
        ]);

        ExpenseCategory::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Expense category added successfully.');
    }
}

