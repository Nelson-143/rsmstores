<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::with('category')->where('user_id', auth()->id());
        
        if ($request->has('expense_category_id') && $request->expense_category_id) {
            $query->where('category_id', $request->expense_category_id);
        }
        
        if ($request->has('date') && $request->date) {
            $query->whereDate('expense_date', $request->date);
        }
        
        $expenses = $query->paginate(10);
        $expenseCategories = ExpenseCategory::all();

        $expenseTotals = Expense::selectRaw('SUM(amount) as total, category_id')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        $expenseCategoryNames = $expenseTotals->pluck('category.name'); 
        $expenseTotals = $expenseTotals->pluck('total');  

        $expenseTrendsData = Expense::selectRaw('DATE(expense_date) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('expenses.index', compact('expenses', 'expenseCategories', 'expenseCategoryNames', 'expenseTotals', 'expenseTrendsData'));
    }

    public function create()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('expenses.create', compact('expenseCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0.01',
            'expense_date' => 'required|date',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $attachment = $request->file('attachment') 
                      ? $request->file('attachment')->store('attachments') 
                      : null;

        Expense::create([
            'user_id' => auth()->id(),
            'category_id' => $request->expense_category_id,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description,
            'attachment' => $attachment,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }
}
