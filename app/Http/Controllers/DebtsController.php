<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;
use App\Models\Customer;
use App\Models\Payment; // Ensure you import the Payment model
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DebtsController extends Controller
{
    // Fetch and display all debts
    public function index()
    {
        // Fetch all debts with their associated customers
        $debts = Debt::with('customer')->get();
        
        // Fetch all customers
        $customers = Customer::all();
        
        // Map debts to include additional data for the view
        $debtsData = $debts->map(function ($debt, $index) {
            return [
                'uuid' => $debt->uuid,
                'no' => $index + 1,
                'customer_name' => $debt->customer ? $debt->customer->name : 'Personal Debt',
                'customer_set' => $debt->customer ? ($debt->customer->set ?? 'N/A') : 'N/A',
                'created_date' => $debt->created_at->format('Y-m-d'),
                'debts_amount' => $debt->amount,
                'received_amount' => $debt->amount_paid,
                'balance_amount' => $debt->amount - $debt->amount_paid,
                'due_date' => Carbon::parse($debt->due_date)->format('Y-m-d'),
                'status' => $this->calculateStatus($debt),
            ];
        });
    
        // Calculate total current debts (unpaid or partially paid)
        $totalCurrentDebts = $debts->filter(function ($debt) {
            return $debt->amount_paid < $debt->amount; // Debts that are not fully paid
        })->count();
    
        // Calculate total value of debt (sum of all remaining balances)
        $totalValueOfDebt = $debts->sum(function ($debt) {
            return $debt->amount - $debt->amount_paid; // Remaining balance for each debt
        });
    
        // Calculate total paid debts
        $totalPaidDebts = $debts->filter(function ($debt) {
            return $debt->amount_paid >= $debt->amount; // Fully paid debts
        })->count();
    
        // Calculate total amount received
        $totalAmountReceived = $debts->sum('amount_paid'); // Sum of all payments received
    
        // Calculate overdue debts
        $overdueDebts = $debts->filter(function ($debt) {
            return Carbon::now()->isPast($debt->due_date) && $debt->amount_paid < $debt->amount; // Overdue debts
        })->count();
    
        // Calculate debts due soon (within the next 14 days)
        $debtsDueSoon = $debts->filter(function ($debt) {
            return Carbon::now()->diffInDays($debt->due_date) <= 14 && $debt->amount_paid < $debt->amount; // Debts due soon
        })->count();
    
        // Pass all data to the view
        return view('debts.index', compact('debts', 'debtsData', 'customers', 'totalCurrentDebts', 'totalValueOfDebt', 'totalPaidDebts', 'totalAmountReceived', 'overdueDebts', 'debtsDueSoon'));
    }
    // Adding of new debts handler
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id', // Allow null for personal debts
            'customer_set' => 'required|string|max:255', // Validate custom
            'amount' => 'required|numeric|min:1',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        Debt::create([
            'customer_id' => $request->input('customer_id'), // Can be null
            'customer_set' => $validated['customer_set'], // Store the customer set
            'amount' => $request->input('amount'),
            'amount_paid' => 0, // Default to 0
            'due_date' => $request->input('due_date'),
        ]);

        return redirect()->route('debts.index')->with('success', 'Debt added successfully.');
    }

    // Edit a debt
    public function edit($uuid)
    {
        $debt = Debt::where('uuid', $uuid)->first();
        if (!$debt) {
            abort(404);
        }

        // Fetch all customers to pass to the view
        $customers = Customer::all();

        return view('debts.edit', compact('debt', 'customers'));
    }

    // For updating the debts
    public function update(Request $request, $uuid)
    {
        $debt = Debt::where('uuid', $uuid)->first();
        if (!$debt) {
            abort(404);
        }

        $validated = $request->validate([
            'amount_paid' => 'required|numeric|min:0|max:' . ($debt->amount - $debt->amount_paid),
        ]);

        // Record the payment
        $payment = new Payment();
        $payment->debt_id = $debt->id;
        $payment->amount_paid = $validated['amount_paid'];
        $payment->paid_at = now(); // Record the payment date
        $payment->save();

        // Update the amount paid in the debt
        $debt->amount_paid += $validated['amount_paid'];

        // If the debt is fully paid, mark it as paid
        if ($debt->amount_paid >= $debt->amount) {
            $debt->paid_at = now(); // Mark as fully paid
        }

        $debt->save();

        return redirect()->route('debts.index')->with('success', 'Payment recorded successfully.');
    }

    // Deletion of debts
    public function destroy($uuid)
    {
        $debt = Debt::where('uuid', $uuid)->first();
        if (!$debt) {
            abort(404);
        }

        $debt->delete();

        return redirect()->route('debts.index')->with('success', 'Debt deleted successfully.');
    }

    // Display the debts status
    private function calculateStatus($debt)
    {
        if ($debt->paid_at) {
            return 'Paid';
        }

       $now = Carbon::now();
if (Carbon::parse($debt->due_date)->isPast()) {
    return 'Overdue';
}

        if ($now->diffInDays($debt->due_date) <= 14) {
            return 'Due Soon'; // Within 2 weeks
        }

        return 'Pending';
    }

    // Show payment history for a debt
    public function showPaymentHistory($uuid)
    {
        $debt = Debt::where('uuid', $uuid)->first();
        if (!$debt) {
            return redirect()->back()->with('error', 'Debt not found');
        }

        $payments = Payment::where('debt_id', $debt->id)->get();
        return view('debts.history', compact('debt', 'payments'));
    }

    // Handle payment for a debt
    public function pay(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'debt_uuid' => 'required|exists:debts,uuid', // Use uuid instead of id
            'amount_paid' => 'required|numeric|min:0',
        ]);
    
        // Find the debt by uuid
        $debt = Debt::where('uuid', $validated['debt_uuid'])->first();
        if (!$debt) {
            return redirect()->route('debts.index')->with('error', 'Debt not found.');
        }
    
        // Check if the debt is already fully paid
        if ($debt->amount_paid >= $debt->amount) {
            return redirect()->route('debts.index')->with('error', 'This debt has already been fully paid.');
        }
    
        // Ensure the payment does not exceed the remaining balance
        $remainingBalance = $debt->amount - $debt->amount_paid;
        if ($validated['amount_paid'] > $remainingBalance) {
            return redirect()->route('debts.index')->with('error', 'The payment amount exceeds the remaining balance.');
        }
    
        // Record the payment
        $payment = new Payment();
        $payment->debt_id = $debt->id; // Use the debt's id for the payment record
        $payment->amount_paid = $validated['amount_paid'];
        $payment->paid_at = now(); // Record the payment date
        $payment->save();
    
        // Update the amount paid in the debt
        $debt->amount_paid += $validated['amount_paid'];
    
        // If the debt is fully paid, mark it as paid
        if ($debt->amount_paid >= $debt->amount) {
            $debt->paid_at = now(); // Mark as fully paid
        }
    
        $debt->save();
    
        return redirect()->route('debts.index')->with('success', 'Payment recorded successfully.');
    }
}