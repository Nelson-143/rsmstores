<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recommendation;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Expense;
use App\Models\Debt; // Add Debt model
use App\Models\TaxReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomOrderDetail; // Assuming this is the model for custom orders
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    /**
     * Get the date range based on report type and request.
     */
    protected function getDateRange($reportType, Request $request)
    {
        $now = now();
        switch ($reportType) {
            case 'daily':
                $start = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : $now->copy()->startOfDay();
                $end = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : $now->copy()->endOfDay();
                break;
            case 'weekly':
                $start = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : $now->copy()->startOfWeek();
                $end = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : $now->copy()->endOfWeek();
                break;
            case 'monthly':
                $start = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : $now->copy()->startOfMonth();
                $end = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : $now->copy()->endOfMonth();
                break;
            case 'yearly':
                $start = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : $now->copy()->startOfYear();
                $end = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : $now->copy()->endOfYear();
                break;
            default:
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                break;
        }
        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id;
        
        // Set default report type if not provided
        $reportType = $request->get('report_type', 'monthly');
        
        // Date range handling
        $dateRange = $this->getDateRange($reportType, $request);
        
        // 1. Sales Data with VAT
        $salesData = $this->getSalesData($userId, $accountId, $dateRange);
        
        // 2. Expense Data
        $expenseData = $this->getExpenseData($userId, $accountId, $dateRange);
        
        // 3. Debt Data (new)
        $debtData = $this->getDebtData($userId, $accountId, $dateRange);
        
        // 4. Inventory Data
        $inventoryData = $this->getInventoryData($accountId);

        // 4.5. Custom Orders Data
        $customOrdersData = $this->getCustomOrdersData($userId, $accountId, $dateRange);

        // Assign lowStockItems and outOfStockItems from inventoryData
        $lowStockItems = $inventoryData['products']->where('quantity', '>', 0)->where('quantity', '<=', 5)->count();
        $outOfStockItems = $inventoryData['outOfStockItems'] ?? 0;
        
        // 5. Financial Statements (updated with debts)
        $incomeStatement = $this->getIncomeStatement($salesData, $expenseData, $debtData, $customOrdersData);
        $balanceSheet = $this->getBalanceSheet($userId, $accountId, $debtData);
        $cashFlow = $this->getCashFlow($salesData, $expenseData, $debtData);
        
        // 6. VAT Report
        $vatReport = $this->getVatReport($userId, $accountId, $dateRange);
        
        // 7. Recent Transactions
        $recentTransactions = $this->getRecentTransactions($userId, $accountId);
        
        // 8. Key Metrics (with safe calculations)
        $keyMetrics = $this->calculateKeyMetrics($incomeStatement);
        
        // 9. Recommendations and Insights
        $recommendations = $this->getRecommendations($userId);
        $actionableInsights = $this->generateActionableInsights($incomeStatement, $inventoryData, $debtData);
        
        // 10. Chart Data
        $chartData = $this->getChartData($reportType, $userId, $accountId);
        
        return view('reports.index', array_merge(
            $salesData,
            $expenseData,
            $debtData,
            $customOrdersData,
            $inventoryData,
            [
                'reportType' => $reportType,
                'incomeStatement' => $incomeStatement,
                'balanceSheet' => $balanceSheet,
                'cashFlow' => $cashFlow,
                'vatReport' => $vatReport,
                'recentTransactions' => $recentTransactions,
                'chartLabels' => $chartData['labels'],
                'chartData' => $chartData['data'],
                'recommendations' => $recommendations,
                'actionableInsights' => $actionableInsights,
                'startDate' => $dateRange['start']->format('Y-m-d'),
                'endDate' => $dateRange['end']->format('Y-m-d'),
                'totalAvailableStock' => $totalAvailableStock ?? 0, // Ensure variable is defined
                'lowStockItems' => $lowStockItems,
                'outOfStockItems' => $outOfStockItems,
                'totalStockValue' => $totalStockValue ?? 0,
            ],
            $keyMetrics
        ));
    }

    /**
     * Get sales data including VAT, subtotal, and total sales for the given user, account, and date range.
     */
    protected function getSalesData($userId, $accountId, $dateRange)
    {
        $orders = Order::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();

        $totalSales = $orders->sum('total');
        $totalVat = $orders->sum('vat');
        $subTotal = $orders->sum('subtotal');

        return [
            'totalSales' => $totalSales,
            'totalVat' => $totalVat,
            'subTotal' => $subTotal,
            'startDate' => $dateRange['start']->format('Y-m-d'),
            'endDate' => $dateRange['end']->format('Y-m-d'),
        ];
    }

    // Add new method for expense data
    protected function getExpenseData($userId, $accountId, $dateRange)
    {
        $expenses = Expense::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();

        $totalExpenses = $expenses->sum('amount');

        return [
            'totalExpenses' => $totalExpenses,
            'expenses' => $expenses,
        ];
    }

    // Add new method for debt data
    protected function getDebtData($userId, $accountId, $dateRange)
    {
        $totalDebts = Debt::where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->sum('amount');
            
        $totalPaid = Debt::where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->sum('amount_paid');
            
        $outstandingDebts = $totalDebts - $totalPaid;
        
        return [
            'totalDebts' => $totalDebts,
            'totalPaid' => $totalPaid,
            'outstandingDebts' => $outstandingDebts,
        ];
    }

    // Update income statement to include debts
    protected function getIncomeStatement($salesData, $expenseData, $debtData, $customOrdersData = [])
    {
        // Calculate COGS (Cost of Goods Sold) from order details
        $cogs = OrderDetails::whereHas('order', function($q) use ($salesData) {
                $q->whereBetween('created_at', [$salesData['startDate'], $salesData['endDate']]);
            })
            ->with('product')
            ->get()
            ->sum(function($detail) {
                return $detail->quantity * $detail->product->buying_price;
            });

        // Include custom orders in revenue
        $totalRevenue = ($salesData['subTotal'] ?? 0) + ($customOrdersData['totalCustomSales'] ?? 0);

        return [
            'revenue' => $totalRevenue,
            'regular_sales' => $salesData['subTotal'] ?? 0,
            'custom_sales' => $customOrdersData['totalCustomSales'] ?? 0,
            'gross_sales' => $salesData['totalSales'] ?? 0,
            'vat' => $salesData['totalVat'] ?? 0,
            'cogs' => $cogs,
            'grossProfit' => $totalRevenue - $cogs,
            'expenses' => $expenseData['totalExpenses'] ?? 0,
            'debt_payments' => $debtData['totalPaid'] ?? 0,
            'netIncome' => $totalRevenue - $cogs - ($expenseData['totalExpenses'] ?? 0) - ($debtData['totalPaid'] ?? 0),
            'startDate' => $salesData['startDate'],
            'endDate' => $salesData['endDate'],
        ];
    }

    // Update balance sheet to include debts
    protected function getBalanceSheet($userId, $accountId, $debtData)
    {
        $balanceSheet = [
            'assets' => [
                'Cash' => 0,
                'Accounts Receivable' => Order::with('customer')
                    ->where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('total'),
                'Inventory' => Product::where('account_id', $accountId)
                    ->sum(DB::raw('quantity * buying_price')),
            ],
            'liabilities' => [
                'Accounts Payable' => Expense::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('amount'),
                'VAT Payable' => Order::with('customer')
                    ->where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('vat'),
                'Outstanding Debts' => $debtData['outstandingDebts'] ?? 0,
            ],
        ];
        
        $balanceSheet['totalAssets'] = array_sum($balanceSheet['assets']);
        $balanceSheet['totalLiabilities'] = array_sum($balanceSheet['liabilities']);
        $balanceSheet['equity'] = $balanceSheet['totalAssets'] - $balanceSheet['totalLiabilities'];
        
        return $balanceSheet;
    }

    // Update cash flow to include debt payments
    protected function getCashFlow($salesData, $expenseData, $debtData)
    {
        return [
            'inflows' => [
                'sales' => $salesData['subTotal'] ?? 0,
                'vat_collected' => $salesData['totalVat'] ?? 0,
                'debt_collections' => $debtData['totalPaid'] ?? 0,
            ],
            'outflows' => [
                'cogs' => $salesData['cogs'] ?? 0,
                'operating_expenses' => $expenseData['totalExpenses'] ?? 0,
                'vat_paid' => 0,
                'debt_payments' => $debtData['totalPaid'] ?? 0,
            ],
        ];
    }

    // Update key metrics with safe division
    protected function calculateKeyMetrics($incomeStatement)
    {
        $revenue = $incomeStatement['revenue'] ?? 0;
        $grossProfit = $incomeStatement['grossProfit'] ?? 0;
        $expenses = $incomeStatement['expenses'] ?? 0;
        $netIncome = $incomeStatement['netIncome'] ?? 0;
        
        // Safe division to prevent divide by zero errors
        $grossMargin = $revenue > 0 ? ($grossProfit / $revenue) * 100 : 0;
        $expenseRatio = $revenue > 0 ? ($expenses / $revenue) * 100 : 0;
        $netMargin = $revenue > 0 ? ($netIncome / $revenue) * 100 : 0;
            
        return [
            'grossMargin' => $grossMargin,
            'expenseRatio' => $expenseRatio,
            'netMargin' => $netMargin,
            'ytdPerformance' => $netIncome,
        ];
    }

    // Update insights to include debt-related insights
    protected function generateActionableInsights($incomeStatement, $inventoryData, $debtData)
    {
        $insights = [];
        
        // 1. Profitability Insights
        if ($incomeStatement['netIncome'] < 0) {
            $insights[] = $this->createInsight(
                'Negative Profitability', 
                'Your business is currently operating at a loss. Immediate action is required to reduce costs or increase sales.',
                'danger'
            );
        }
        
        // 2. Debt Insights
        if (($debtData['outstandingDebts'] ?? 0) > 0) {
            $insights[] = $this->createInsight(
                'Outstanding Debts', 
                'You have '.number_format($debtData['outstandingDebts'], 2).' in outstanding debts. Consider following up with customers.',
                'warning'
            );
        }
        
        // 3. VAT Insights
        if (($incomeStatement['vat'] ?? 0) > 0) {
            $insights[] = $this->createInsight(
                'VAT Liability', 
                'You have collected '.number_format($incomeStatement['vat'], 2).' in VAT that needs to be remitted to tax authorities.',
                'warning'
            );
        }
        
        // 4. Inventory Insights
        if (($inventoryData['outOfStockItems'] ?? 0) > 0) {
            $insights[] = $this->createInsight(
                'Out of Stock Items', 
                'You have '.$inventoryData['outOfStockItems'].' products out of stock. This is causing lost sales opportunities.',
                'danger'
            );
        }
        
        return $insights;
    }

    protected function hasVatPaymentRecords($vatAmount)
    {
        // Implement logic to check if VAT payments have been recorded
        // This is a placeholder - implement based on your payment tracking
        return false;
    }

    protected function createInsight($title, $message, $status)
    {
        return [
            'title' => $title,
            'message' => $message,
            'status' => $status,
            'date' => now()->format('M j, Y'),
        ];
    }


    protected function getCustomOrdersData($userId, $accountId, $dateRange)
{
    $customOrders = CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $dateRange) {
            $q->where('user_id', $userId)
              ->where('account_id', $accountId)
              ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);
        })
        ->get();

    return [
        'totalCustomSales' => $customOrders->sum('total'),
        'customOrderCount' => $customOrders->count(),
        'customOrders' => $customOrders
    ];
}
    protected function getChartData($reportType, $userId, $accountId)
    {
        $now = now();
        $labels = [];
        $data = [];
        $customData = []; // For custom orders

        switch ($reportType) {
            case 'daily':
                for ($i = 6; $i >= 0; $i--) {
                    $date = $now->copy()->subDays($i);
                    $labels[] = $date->format('D, M j');

                    // Regular orders
                    $data[] = Order::with('customer')
                        ->where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereDate('created_at', $date)
                        ->sum('total');

                    // Custom orders
                    $customData[] = class_exists('App\\Models\\CustomOrderDetail') ? \App\Models\CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $date) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereDate('created_at', $date);
                        })->sum('total') : 0;
                }
                break;

            case 'weekly':
                for ($i = 3; $i >= 0; $i--) {
                    $start = $now->copy()->subWeeks($i)->startOfWeek();
                    $end = $now->copy()->subWeeks($i)->endOfWeek();
                    $labels[] = 'Week '.($i + 1).' ('.$start->format('M j').')';

                    $data[] = Order::with('customer')
                        ->where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereBetween('created_at', [$start, $end])
                        ->sum('total');

                    $customData[] = class_exists('App\\Models\\CustomOrderDetail') ? \App\Models\CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $start, $end) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereBetween('created_at', [$start, $end]);
                        })->sum('total') : 0;
                }
                break;

            case 'monthly':
                for ($i = 11; $i >= 0; $i--) {
                    $month = $now->copy()->subMonths($i);
                    $labels[] = $month->format('M Y');

                    $data[] = Order::with('customer')
                        ->where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $month->year)
                        ->whereMonth('created_at', $month->month)
                        ->sum('total');

                    $customData[] = class_exists('App\\Models\\CustomOrderDetail') ? \App\Models\CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $month) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereYear('created_at', $month->year)
                              ->whereMonth('created_at', $month->month);
                        })->sum('total') : 0;
                }
                break;

            case 'yearly':
                for ($i = 4; $i >= 0; $i--) {
                    $year = $now->copy()->subYears($i);
                    $labels[] = $year->format('Y');

                    $data[] = Order::with('customer')
                        ->where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $year->year)
                        ->sum('total');

                    $customData[] = class_exists('App\\Models\\CustomOrderDetail') ? \App\Models\CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $year) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereYear('created_at', $year->year);
                        })->sum('total') : 0;
                }
                break;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'customData' => $customData,
        ];
    }

/**
 * Get inventory data for the given account.
 */
protected function getInventoryData($accountId)
{
    $products = Product::where('account_id', $accountId)->get();
    $totalInventoryValue = $products->sum(function ($product) {
        return $product->quantity * $product->buying_price;
    });
    $outOfStockItems = $products->where('quantity', '<=', 0)->count();

    return [
        'totalInventoryValue' => $totalInventoryValue,
        'outOfStockItems' => $outOfStockItems,
        'products' => $products,
    ];
}


/**
 * Get VAT report for the given user, account, and date range.
 */
protected function getVatReport($userId, $accountId, $dateRange)
{
    $orders = Order::with('customer')
        ->where('user_id', $userId)
        ->where('account_id', $accountId)
        ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
        ->get();

    $totalVatCollected = $orders->sum('vat');
    $totalSales = $orders->sum('total');

    return [
        'totalVatCollected' => $totalVatCollected,
        'totalSales' => $totalSales,
        'startDate' => $dateRange['start']->format('Y-m-d'),
        'endDate' => $dateRange['end']->format('Y-m-d'),
    ];
}

/**
 * Get recent transactions for the given user and account.
 */
protected function getRecentTransactions($userId, $accountId)
{
    return Order::with('customer')
        ->where('user_id', $userId)
        ->where('account_id', $accountId)
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
}

/**
 * Get recommendations for the given user.
 */
protected function getRecommendations($userId)
{
    $recommendations = Recommendation::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get()
        ->map(function ($rec) {
            return [
                'title' => $rec->title,
                'message' => $rec->message,
                'status' => $rec->status ?? 'info',
                'date' => $rec->created_at->format('M j, Y'),
            ];
        })
        ->toArray();

    return $recommendations;
}

public function generateDailyReport()
{
    $date = now()->format('Y-m-d');

    // Fetch data from the orders table
    $orders = Order::with('customer')
    ->whereDate('order_date', $date)->get();
    $totalSales = $orders->sum('total');
    $totalProductsSold = $orders->sum('total_products');

    // Fetch data from the expenses table
    $expenses = Expense::whereDate('expense_date', $date)->get();
    $totalExpenses = $expenses->sum('amount');

    // Calculate profit
    $profit = $totalSales - $totalExpenses;

    // Prepare the report data
    $reportData = [
        'sales' => $totalSales,
        'expenses' => $totalExpenses,
        'profit' => $profit,
        'products_sold' => $totalProductsSold,
    ];

    // Save the report
    Report::create([
        'user_id' => auth()->id(),
        'type' => 'daily',
        'data' => $reportData,
        'account_id' => auth()->user()->account_id,
    ]);

    return redirect()->route('reports.index')->with('success', 'Daily report generated successfully.');
}


}