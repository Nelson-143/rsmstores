<?php
namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetCategory;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BudgetController extends Controller
{
    public function index()
    {
        // Fetch data for the budget dashboard
        $growthData = $this->getGrowthData();
        $expenses = Expense::with('category')->where('user_id', auth()->id())->get();
        $budgets = Budget::with('category')->where('user_id', auth()->id())->get();
        $budgetCategories = BudgetCategory::all();

        return view('budgets.index', compact('budgets', 'budgetCategories', 'expenses', 'growthData'));
    }
    
    private function getGrowthData()
    {
        // Retrieve budgets for the authenticated user
        $budgets = Budget::where('user_id', auth()->id())
            ->orderBy('start_date')
            ->get(['start_date', 'amount']); 

        // Prepare data for the growth chart
        $growthData = [
            'dates' => [],
            'values' => []
        ];

        foreach ($budgets as $budget) {
            $growthData['dates'][] = Carbon::parse($budget->start_date)->format('Y-m-d');
            $growthData['values'][] = $budget->amount;
        }

        return $growthData;
    }

    public function create()
    {
        $budgetCategories = BudgetCategory::all();
     return view('budgets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'budget_category_id' => 'required|exists:budget_categories,id',
            'amount' => 'required|numeric|min:0.01',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
        ]);
    
        $data = [
            'user_id' => auth()->id(),
            'category_id' => $request->budget_category_id,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ];
    
        // 🚨 Debug: Check if the data is being prepared correctly
        dd($data); // Stop execution and print data
    
        Budget::create($data);
    
        return redirect()->route('budgets.index')->with('success', 'Budget added successfully.');
    }
    
    
}
