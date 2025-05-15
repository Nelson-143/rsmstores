<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recommendation;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Expense;
use app\Models\ExpenseCategory;
use App\Models\TaxReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id;
        
        // Set default report type if not provided
        $reportType = $request->get('report_type', 'monthly');
        
        // Date range handling
        $dateRange = $this->getDateRange($reportType, $request);
        
        // 1. Sales Data (now with VAT instead of tax)
        $salesData = $this->getSalesData($userId, $accountId, $dateRange);
        
        // 2. Expense Data
        $expenseData = $this->getExpenseData($userId, $accountId, $dateRange);
        
        // 3. Inventory Data
        $inventoryData = $this->getInventoryData($accountId);
        
        // 4. Financial Statements (updated for VAT)
        $incomeStatement = $this->getIncomeStatement($salesData, $expenseData);
        $balanceSheet = $this->getBalanceSheet($userId, $accountId, $request);
        $cashFlow = $this->getCashFlow($salesData, $expenseData);
        
        // 5. VAT Report (instead of generic tax report)
        $vatReport = $this->getVatReport($userId, $accountId, $dateRange);
        
        // 6. Recent Transactions
        $recentTransactions = $this->getRecentTransactions($userId, $accountId);
        
        // 7. Key Metrics (updated calculations)
        $keyMetrics = $this->calculateKeyMetrics($incomeStatement);
        
        // 8. Recommendations and Insights
        $recommendations = $this->getRecommendations($userId);
        $actionableInsights = $this->generateActionableInsights($incomeStatement, $inventoryData);
        
        // 9. Chart Data
        $chartData = $this->getChartData($reportType, $userId, $accountId);
        
        return view('reports.index', array_merge(
            $salesData,
            $expenseData,
            $inventoryData,
            [
                'reportType' => $reportType,
                'incomeStatement' => $incomeStatement,
                'balanceSheet' => $balanceSheet,
                'cashFlow' => $cashFlow,
                'vatReport' => $vatReport, // Changed from taxReport to vatReport
                'recentTransactions' => $recentTransactions,
                'chartLabels' => $chartData['labels'],
                'chartData' => $chartData['data'],
                'recommendations' => $recommendations,
                'actionableInsights' => $actionableInsights,
                'startDate' => $dateRange['start']->format('Y-m-d'),
                'endDate' => $dateRange['end']->format('Y-m-d'),
            ],
            $keyMetrics
        ));
    }

    protected function getDateRange($reportType, $request)
    {
        $now = now();
        
        if ($request->has('start_date') && $request->has('end_date')) {
            return [
                'start' => Carbon::parse($request->start_date),
                'end' => Carbon::parse($request->end_date)
            ];
        }
        
        switch ($reportType) {
            case 'daily':
                return [
                    'start' => $now->copy()->startOfDay(),
                    'end' => $now->copy()->endOfDay()
                ];
            case 'weekly':
                return [
                    'start' => $now->copy()->startOfWeek(),
                    'end' => $now->copy()->endOfWeek()
                ];
            case 'monthly':
                return [
                    'start' => $now->copy()->startOfMonth(),
                    'end' => $now->copy()->endOfMonth()
                ];
            case 'yearly':
                return [
                    'start' => $now->copy()->startOfYear(),
                    'end' => $now->copy()->endOfYear()
                ];
            default:
                return [
                    'start' => $now->copy()->subMonth(),
                    'end' => $now->copy()
                ];
        }
    }

    protected function getSalesData($userId, $accountId, $dateRange)
    {
        $query = Order::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);
            
        $totalSales = (clone $query)->sum('total');
        $totalVat = (clone $query)->sum('vat');
        $subTotal = (clone $query)->sum('sub_total');
        
        // Get detailed sales data for the period
        $salesBreakdown = (clone $query)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total_sales'),
                DB::raw('SUM(vat) as total_vat'),
                DB::raw('SUM(sub_total) as sub_total'),
                DB::raw('COUNT(*) as transaction_count')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        // Get product sales mix from order details
        $productSales = OrderDetails::whereHas('order', function($q) use ($userId, $accountId, $dateRange) {
                $q->where('user_id', $userId)
                  ->where('account_id', $accountId)
                  ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);
            })
            ->select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(total) as total_value')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_value')
            ->with('product')
            ->get();
            
        return [
            'totalSales' => $totalSales,
            'totalVat' => $totalVat,
            'subTotal' => $subTotal,
            'salesBreakdown' => $salesBreakdown,
            'productSales' => $productSales,
            'totalOrders' => $query->count(),
            'startDate' => $dateRange['start'],
            'endDate' => $dateRange['end'],
        ];
    }

protected function getExpenseData($userId, $accountId, $dateRange)
{
    $totalExpenses = Expense::where('user_id', $userId)
        ->where('account_id', $accountId)
        ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
        ->sum('amount');
            
    return [
        'totalExpenses' => $totalExpenses,
        'expenseByCategory' => [], // Return empty array for categories
    ];
}

    protected function getInventoryData($accountId)
    {
        $totalAvailableStock = Product::where('account_id', $accountId)->sum('quantity');
        $totalStockValue = Product::where('account_id', $accountId)
            ->sum(DB::raw('quantity * selling_price'));
            
        $lowStockItems = Product::where('account_id', $accountId)
            ->whereColumn('quantity', '<=', 'quantity_alert')
            ->count();
            
        $outOfStockItems = Product::where('account_id', $accountId)
            ->where('quantity', 0)
            ->count();
            
        $fastMovingItems = OrderDetails::whereHas('order', function($q) use ($accountId) {
                $q->where('account_id', $accountId)
                  ->where('created_at', '>=', now()->subDays(30));
            })
            ->select(
                'product_id',
                DB::raw('SUM(quantity) as total_sold')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->with('product')
            ->get();
            
        return [
            'totalAvailableStock' => $totalAvailableStock,
            'totalStockValue' => $totalStockValue,
            'lowStockItems' => $lowStockItems,
            'outOfStockItems' => $outOfStockItems,
            'fastMovingItems' => $fastMovingItems->count(),
            'topSellingProducts' => $fastMovingItems,
        ];
    }

    protected function getIncomeStatement($salesData, $expenseData)
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
            
        return [
            'revenue' => $salesData['subTotal'], // Before VAT
            'gross_sales' => $salesData['totalSales'], // Including VAT
            'vat' => $salesData['totalVat'],
            'cogs' => $cogs,
            'grossProfit' => $salesData['subTotal'] - $cogs, // Profit before expenses
            'expenses' => $expenseData['totalExpenses'],
            'netIncome' => ($salesData['subTotal'] - $cogs) - $expenseData['totalExpenses'],
            'startDate' => $salesData['startDate'],
            'endDate' => $salesData['endDate'],
        ];
    }

    protected function getBalanceSheet($userId, $accountId, Request $request)
    {
        // Initialize with default values
        $balanceSheet = [
            'assets' => [
                'Cash' => 0, // This would come from your cash records
                'Accounts Receivable' => Order::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    //->where('payment_status', '!=', 'paid')
                    ->sum('total'),
                'Inventory' => Product::where('account_id', $accountId)
                    ->sum(DB::raw('quantity * buying_price')),
            ],
            'liabilities' => [
                'Accounts Payable' => Expense::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    //->where('paid', false)
                    ->sum('amount'),
                'VAT Payable' => Order::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('vat'), // Total VAT collected
            ],
        ];
        
        // Calculate totals
        $balanceSheet['totalAssets'] = array_sum($balanceSheet['assets']);
        $balanceSheet['totalLiabilities'] = array_sum($balanceSheet['liabilities']);
        $balanceSheet['equity'] = $balanceSheet['totalAssets'] - $balanceSheet['totalLiabilities'];
        
        return $balanceSheet;
    }

    protected function getCashFlow($salesData, $expenseData)
    {
        return [
            'inflows' => [
                'sales' => $salesData['subTotal'], // Before VAT
                'vat_collected' => $salesData['totalVat'], // VAT collected from customers
            ],
            'outflows' => [
                'cogs' => $salesData['cogs'] ?? 0,
                'operating_expenses' => $expenseData['totalExpenses'],
                'vat_paid' => 0, // This would be VAT paid to suppliers (if tracked)
            ],
        ];
    }

    protected function getVatReport($userId, $accountId, $dateRange)
    {
        // Calculate VAT collected from sales
        $vatCollected = Order::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->sum('vat');
            
        // VAT paid would come from your expense records (if you track VAT on purchases)
        $vatPaid = 0; // Placeholder - implement based on your system
        
        return [
            'vat_collected' => $vatCollected,
            'vat_paid' => $vatPaid,
            'vat_liability' => $vatCollected - $vatPaid,
            'period_start' => $dateRange['start']->format('Y-m-d'),
            'period_end' => $dateRange['end']->format('Y-m-d'),
        ];
    }

    protected function getRecentTransactions($userId, $accountId, $limit = 10)
    {
        return Order::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->with('customer')
            ->latest()
            ->take($limit)
            ->get();
    }

    protected function calculateKeyMetrics($incomeStatement)
    {
        $grossMargin = $incomeStatement['revenue'] > 0 
            ? ($incomeStatement['grossProfit'] / $incomeStatement['revenue']) * 100 
            : 0;
            
        $expenseRatio = $incomeStatement['revenue'] > 0 
            ? ($incomeStatement['expenses'] / $incomeStatement['revenue']) * 100 
            : 0;
            
        $netMargin = $incomeStatement['revenue'] > 0 
            ? ($incomeStatement['netIncome'] / $incomeStatement['revenue']) * 100 
            : 0;
            
        return [
            'grossMargin' => $grossMargin,
            'expenseRatio' => $expenseRatio,
            'netMargin' => $netMargin,
            'ytdPerformance' => $incomeStatement['netIncome'],
        ];
    }

    protected function getRecommendations($userId, $limit = 5)
    {
        return Recommendation::where('user_id', $userId)
            ->where('is_read', false)
            ->orderBy('priority', 'desc')
            ->take($limit)
            ->get();
    }

    protected function generateActionableInsights($incomeStatement, $inventoryData)
    {
        $insights = [];
        
        // 1. Profitability Insights
        if ($incomeStatement['netIncome'] < 0) {
            $insights[] = $this->createInsight(
                'Negative Profitability', 
                'Your business is currently operating at a loss. Immediate action is required to reduce costs or increase sales.',
                'danger'
            );
        } elseif ($incomeStatement['netIncome'] < 5) {
            $insights[] = $this->createInsight(
                'Low Profit Margin', 
                'Your profit margin is very low ('.number_format($incomeStatement['netMargin'], 2).'%). Consider reviewing pricing or reducing operational costs.',
                'warning'
            );
        }
        
        // 2. Expense Insights
        // if ($incomeStatement['expenseRatio'] > 60) {
        //     $insights[] = $this->createInsight(
        //         'High Expense Ratio', 
        //         'Your expenses are '.number_format($incomeStatement['expenseRatio'], 2).'% of revenue, which is very high. Review expense categories for cost-saving opportunities.',
        //         'danger'
        //     );
        // }
        
        // 3. Inventory Insights
        if ($inventoryData['outOfStockItems'] > 0) {
            $insights[] = $this->createInsight(
                'Out of Stock Items', 
                'You have '.$inventoryData['outOfStockItems'].' products out of stock. This is causing lost sales opportunities.',
                'danger'
            );
        }
        
        if ($inventoryData['lowStockItems'] > 0) {
            $insights[] = $this->createInsight(
                'Low Stock Items', 
                'You have '.$inventoryData['lowStockItems'].' products below reorder level. Consider restocking soon to avoid shortages.',
                'warning'
            );
        }
        
        // 4. VAT Insights
        if ($incomeStatement['vat'] > 0 && !$this->hasVatPaymentRecords($incomeStatement['vat'])) {
            $insights[] = $this->createInsight(
                'VAT Liability', 
                'You have collected '.number_format($incomeStatement['vat'], 2).' in VAT that needs to be remitted to tax authorities.',
                'warning'
            );
        }
        
        // // 5. Positive Insights
        // if ($incomeStatement['netMargin'] > 20) {
        //     $insights[] = $this->createInsight(
        //         'Healthy Profit Margin', 
        //         'Great job! Your profit margin is '.number_format($incomeStatement['netMargin'], 2).'%, which is excellent.',
        //         'success'
        //     );
        // }
        
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

    protected function getChartData($reportType, $userId, $accountId)
    {
        $now = now();
        $labels = [];
        $data = [];

        switch ($reportType) {
            case 'daily':
                for ($i = 6; $i >= 0; $i--) {
                    $date = $now->copy()->subDays($i);
                    $labels[] = $date->format('D, M j');
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereDate('created_at', $date)
                        ->sum('total');
                }
                break;

            case 'weekly':
                for ($i = 3; $i >= 0; $i--) {
                    $start = $now->copy()->subWeeks($i)->startOfWeek();
                    $end = $now->copy()->subWeeks($i)->endOfWeek();
                    $labels[] = 'Week '.($i + 1).' ('.$start->format('M j').')';
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereBetween('created_at', [$start, $end])
                        ->sum('total');
                }
                break;

            case 'monthly':
                for ($i = 11; $i >= 0; $i--) {
                    $month = $now->copy()->subMonths($i);
                    $labels[] = $month->format('M Y');
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $month->year)
                        ->whereMonth('created_at', $month->month)
                        ->sum('total');
                }
                break;

            case 'yearly':
                for ($i = 4; $i >= 0; $i--) {
                    $year = $now->copy()->subYears($i);
                    $labels[] = $year->format('Y');
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $year->year)
                        ->sum('total');
                }
                break;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

public function generateDailyReport()
{
    $date = now()->format('Y-m-d');

    // Fetch data from the orders table
    $orders = Order::whereDate('order_date', $date)->get();
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