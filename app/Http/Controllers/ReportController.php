<?php
namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recommendation;
use App\Models\IncomeStatement;
use App\Models\BalanceSheet;
use App\Models\CashFlow;
use App\Models\TaxReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
    
        // Fetch data for reports
        $reports = Report::where('user_id', $userId)->get();
        $recommendations = Recommendation::where('user_id', $userId)
            ->where('is_read', false)
            ->orderBy('priority', 'desc')
            ->get();
    
        // Fetch financial statements
        $incomeStatement = IncomeStatement::where('user_id', $userId)->first();
        $balanceSheet = BalanceSheet::where('user_id', $userId)->first();
        $cashFlow = CashFlow::where('user_id', $userId)->first();
        $taxReport = TaxReport::where('user_id', $userId)->first();
    
        return view('reports.index', compact('reports', 'recommendations', 'incomeStatement', 'balanceSheet', 'cashFlow', 'taxReport'));
    }




    public function generate(Request $request)
    {
        $request->validate([
            'type' => 'required|in:daily,weekly,monthly,yearly',
        ]);

        // Generate the report data (mocked for now)
        $reportData = [
            'sales' => 1000,
            'expenses' => 500,
            'profit' => 500,
        ];

        $report = Report::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'data' => $reportData,
        ]);

        return redirect()->route('reports.index')->with('success', 'Report generated successfully.');
    }

    public function markRecommendationRead($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Recommendation marked as read.');
    }
}
