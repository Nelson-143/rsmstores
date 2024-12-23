<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DebtsController extends Controller
{
    //fetch and display all debts
    public function index()
{   $debts = Debt::with('customer')->get();

    $debtsData = $debts->map(function ($debt, $index) {
        return [
            'no' => $index + 1,
            'customer_name' => $debt->customer->name,
            'customer_set' => $debt->customer->set ?? 'N/A', // Assuming a "set" field exists
            'created_date' => $debt->created_at->format('Y-m-d'),
            'debts_amount' => $debt->amount,
            'received_amount' => $debt->amount_paid,
            'balance_amount' => $debt->amount - $debt->amount_paid,
            'due_date' => $debt->due_date->format('Y-m-d'),
            'status' => $this->calculateStatus($debt),
        ];
    });

    return view('debts.index', compact('debts'));
}

// adding of new debts handler
public function store(Request $request)
{
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'amount' => 'required|numeric|min:1',
        'due_date' => 'required|date|after_or_equal:today',
    ]);

    Debt::create([
        'customer_id' => $validated['customer_id'],
        'amount' => $validated['amount'],
        'amount_paid' => 0,
        'due_date' => $validated['due_date'],
    ]);

    return redirect()->route('debts.index')->with('success', 'Debt added successfully.');
}

// for updating the  debts
public function update(Request $request, $id)
{
//$debt = Debt::findOrFail($id);
$debt = (new Debt())->findOrFail($id);
    $validated = $request->validate([
        'amount_paid' => 'required|numeric|min:0|max:' . ($debt->amount - $debt->amount_paid),
    ]);

    $debt->amount_paid += $validated['amount_paid'];

    if ($debt->amount_paid >= $debt->amount) {
        $debt->paid_at = now(); // Mark as fully paid
    }

    $debt->save();

    return redirect()->route('debts.index')->with('success', 'Debt updated successfully.');
}

// deletion of debts 
public function destroy($id)
{
    $debt = (new Debt())->findOrFail($id);
    $debt->delete();

    return redirect()->route('debts.index')->with('success', 'Debt deleted successfully.');
}

// display the debts status 
private function calculateStatus($debt)
{
    if ($debt->paid_at) {
        return 'Paid';
    }

    $now = Carbon::now();
    if ($debt->due_date->isPast()) {
        return 'Overdue';
    }

    if ($now->diffInDays($debt->due_date) <= 14) {
        return 'Due Soon'; // Within 2 weeks
    }

    return 'Pending';
}


}
