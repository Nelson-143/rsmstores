<?php
namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::with('category')->where('user_id', auth()->id())->get();
        return view('budgets.index', compact('budgets'));
    }

    public function create()
    {
        $categories = ExpenseCategory::all();
        return view('budgets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0.01',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Budget::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('budgets.index')->with('success', 'Budget added successfully.');
    }
}
