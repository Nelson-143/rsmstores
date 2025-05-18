<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recommendation;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Expense;
use App\Models\Debt;
use App\Models\TaxReport;
use App\Models\CustomOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    /**
     * Display the main reports dashboard
     */
    public function index(Request $request)
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id;
        
        // Set default report type if not provided
        $reportType = $request->get('report_type', 'monthly');
        
        // Date range handling
        $dateRange = $this->getDateRange($reportType, $request);
        
        // Gather all report data
        $salesData = $this->getSalesData($userId, $accountId, $dateRange);
        $expenseData = $this->getExpenseData($userId, $accountId, $dateRange);
        $debtData = $this->getDebtData($userId, $accountId, $dateRange);
        $inventoryData = $this->getInventoryData($accountId);
        $customOrdersData = $this->getCustomOrdersData($userId, $accountId, $dateRange);
        
        // Calculate metrics
        $lowStockItems = $inventoryData['products']->where('quantity', '>', 0)->where('quantity', '<=', 5)->count();
        $outOfStockItems = $inventoryData['outOfStockItems'] ?? 0;
        
        // Financial statements
        $incomeStatement = $this->getIncomeStatement($salesData, $expenseData, $debtData, $customOrdersData);
        $balanceSheet = $this->getBalanceSheet($userId, $accountId, $debtData);
        $cashFlow = $this->getCashFlow($salesData, $expenseData, $debtData);
        
        // Additional reports
        $vatReport = $this->getVatReport($userId, $accountId, $dateRange);
        $recentTransactions = $this->getRecentTransactions($userId, $accountId);
        $keyMetrics = $this->calculateKeyMetrics($incomeStatement);
        $recommendations = $this->getRecommendations($userId);
        $actionableInsights = $this->generateActionableInsights($incomeStatement, $inventoryData, $debtData);
        $chartData = $this->getChartData($reportType, $userId, $accountId);
        
        return view('reports.index', [
            'reportType' => $reportType,
            'startDate' => $dateRange['start']->format('Y-m-d'),
            'endDate' => $dateRange['end']->format('Y-m-d'),
            
            // Data sections
            'salesData' => $salesData,
            'expenseData' => $expenseData,
            'debtData' => $debtData,
            'customOrdersData' => $customOrdersData,
            'inventoryData' => $inventoryData,
            
            // Financial statements
            'incomeStatement' => $incomeStatement,
            'balanceSheet' => $balanceSheet,
            'cashFlow' => $cashFlow,
            
            // Additional reports
            'vatReport' => $vatReport,
            'recentTransactions' => $recentTransactions,
            
            // Metrics and insights
            'keyMetrics' => $keyMetrics,
            'recommendations' => $recommendations,
            'actionableInsights' => $actionableInsights,
            
            // Chart data
            'chartLabels' => $chartData['labels'],
            'chartData' => $chartData['data'],
            'chartCustomData' => $chartData['customData'],
            
            // Inventory metrics
            'lowStockItems' => $lowStockItems,
            'outOfStockItems' => $outOfStockItems,
        ]);
    }

    /**
     * Generate a daily report
     */
    public function generateDailyReport()
    {
        $date = now()->format('Y-m-d');
        $userId = auth()->id();
        $accountId = auth()->user()->account_id;

        $orders = Order::with('customer')
            ->where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereDate('order_date', $date)
            ->get();
            
        $totalSales = $orders->sum('total');
        $totalProductsSold = $orders->sum('total_products');

        $expenses = Expense::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereDate('expense_date', $date)
            ->get();
            
        $totalExpenses = $expenses->sum('amount');
        $profit = $totalSales - $totalExpenses;

        Report::create([
            'user_id' => $userId,
            'type' => 'daily',
            'data' => [
                'sales' => $totalSales,
                'expenses' => $totalExpenses,
                'profit' => $profit,
                'products_sold' => $totalProductsSold,
            ],
            'account_id' => $accountId,
        ]);

        return redirect()->route('reports.index')->with('success', 'Daily report generated successfully.');
    }

    /**
     * Get the date range based on report type and request
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
        
        return compact('start', 'end');
    }

    /**
     * Get sales data including VAT, subtotal, and total sales
     */
    protected function getSalesData($userId, $accountId, $dateRange)
    {
        $orders = Order::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();

        return [
            'totalSales' => $orders->sum('total'),
            'totalVat' => $orders->sum('vat'),
            'subTotal' => $orders->sum('subtotal'),
            'orderCount' => $orders->count(),
            'orders' => $orders,
            'startDate' => $dateRange['start']->format('Y-m-d'),
            'endDate' => $dateRange['end']->format('Y-m-d'),
        ];
    }

    /**
     * Get expense data
     */
    protected function getExpenseData($userId, $accountId, $dateRange)
    {
        $expenses = Expense::where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();

        return [
            'totalExpenses' => $expenses->sum('amount'),
            'expenseCount' => $expenses->count(),
            'expenses' => $expenses,
        ];
    }

    /**
     * Get debt data
     */
    protected function getDebtData($userId, $accountId, $dateRange)
    {
        $debts = Debt::where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();
            
        $totalDebts = $debts->sum('amount');
        $totalPaid = $debts->sum('amount_paid');
        $outstandingDebts = $totalDebts - $totalPaid;
        
        return [
            'totalDebts' => $totalDebts,
            'totalPaid' => $totalPaid,
            'outstandingDebts' => $outstandingDebts,
            'debtCount' => $debts->count(),
            'debts' => $debts,
        ];
    }

    /**
     * Get custom orders data
     */
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

    /**
     * Get inventory data
     */
    protected function getInventoryData($accountId)
    {
        $products = Product::where('account_id', $accountId)->get();
        
        return [
            'totalInventoryValue' => $products->sum(function ($product) {
                return $product->quantity * $product->buying_price;
            }),
            'outOfStockItems' => $products->where('quantity', '<=', 0)->count(),
            'lowStockItems' => $products->where('quantity', '>', 0)->where('quantity', '<=', 5)->count(),
            'products' => $products,
        ];
    }

    /**
     * Generate income statement
     */
    protected function getIncomeStatement($salesData, $expenseData, $debtData, $customOrdersData = [])
    {
        // Calculate COGS (Cost of Goods Sold) from order details
        $cogs = OrderDetails::whereHas('order', function($q) use ($salesData) {
                $q->whereBetween('created_at', [
                    Carbon::parse($salesData['startDate']), 
                    Carbon::parse($salesData['endDate'])
                ]);
            })
            ->with('product')
            ->get()
            ->sum(function($detail) {
                return $detail->quantity * $detail->product->buying_price;
            });

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

    /**
     * Generate balance sheet
     */
    protected function getBalanceSheet($userId, $accountId, $debtData)
    {
        $assets = [
            'Cash' => 0, // Placeholder - should come from your accounting system
            'Accounts Receivable' => Order::where('user_id', $userId)
                ->where('account_id', $accountId)
                ->where('paid', false)
                ->sum('total'),
            'Inventory' => Product::where('account_id', $accountId)
                ->sum(DB::raw('quantity * buying_price')),
        ];

        $liabilities = [
            'Accounts Payable' => Expense::where('account_id', $accountId)
                ->where('paid', false)
                ->sum('amount'),
            'VAT Payable' => Order::where('user_id', $userId)
                ->where('account_id', $accountId)
                ->sum('vat'),
            'Outstanding Debts' => $debtData['outstandingDebts'] ?? 0,
        ];

        $totalAssets = array_sum($assets);
        $totalLiabilities = array_sum($liabilities);
        
        return [
            'assets' => $assets,
            'liabilities' => $liabilities,
            'totalAssets' => $totalAssets,
            'totalLiabilities' => $totalLiabilities,
            'equity' => $totalAssets - $totalLiabilities,
        ];
    }

    /**
     * Generate cash flow statement
     */
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
                'vat_paid' => 0, // Placeholder - should come from your accounting system
                'debt_payments' => $debtData['totalPaid'] ?? 0,
            ],
        ];
    }

    /**
     * Get VAT report
     */
    protected function getVatReport($userId, $accountId, $dateRange)
    {
        $orders = Order::with('customer')
            ->where('user_id', $userId)
            ->where('account_id', $accountId)
            ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
            ->get();

        return [
            'totalVatCollected' => $orders->sum('vat'),
            'totalSales' => $orders->sum('total'),
            'startDate' => $dateRange['start']->format('Y-m-d'),
            'endDate' => $dateRange['end']->format('Y-m-d'),
        ];
    }

    /**
     * Get recent transactions
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
     * Calculate key financial metrics
     */
    protected function calculateKeyMetrics($incomeStatement)
    {
        $revenue = $incomeStatement['revenue'] ?? 0;
        $grossProfit = $incomeStatement['grossProfit'] ?? 0;
        $expenses = $incomeStatement['expenses'] ?? 0;
        $netIncome = $incomeStatement['netIncome'] ?? 0;
        
        return [
            'grossMargin' => $revenue > 0 ? ($grossProfit / $revenue) * 100 : 0,
            'expenseRatio' => $revenue > 0 ? ($expenses / $revenue) * 100 : 0,
            'netMargin' => $revenue > 0 ? ($netIncome / $revenue) * 100 : 0,
            'ytdPerformance' => $netIncome,
        ];
    }

    /**
     * Generate actionable insights
     */
    protected function generateActionableInsights($incomeStatement, $inventoryData, $debtData)
    {
        $insights = [];
        
        // Profitability insights
        if ($incomeStatement['netIncome'] < 0) {
            $insights[] = $this->createInsight(
                'Negative Profitability', 
                'Your business is currently operating at a loss. Immediate action is required to reduce costs or increase sales.',
                'danger'
            );
        } elseif ($incomeStatement['netIncome'] < ($incomeStatement['revenue'] * 0.05)) {
            $insights[] = $this->createInsight(
                'Low Profit Margin', 
                sprintf('Your profit margin is very low (%.2f%%). Consider reviewing pricing or reducing operational costs.', 
                    $incomeStatement['netIncome'] / $incomeStatement['revenue'] * 100),
                'warning'
            );
        }

        // Debt insights
        if (($debtData['outstandingDebts'] ?? 0) > 0) {
            $insights[] = $this->createInsight(
                'Outstanding Debts', 
                sprintf('You have %s in outstanding debts. Consider following up with customers.', 
                    number_format($debtData['outstandingDebts'], 2)),
                'warning'
            );
        }

        // Inventory insights
        if ($inventoryData['outOfStockItems'] > 0) {
            $insights[] = $this->createInsight(
                'Out of Stock Items', 
                sprintf('You have %d products out of stock. This is causing lost sales opportunities.', 
                    $inventoryData['outOfStockItems']),
                'danger'
            );
        }
        
        if ($inventoryData['lowStockItems'] > 0) {
            $insights[] = $this->createInsight(
                'Low Stock Items', 
                sprintf('You have %d products with low stock levels. Consider replenishing inventory.', 
                    $inventoryData['lowStockItems']),
                'warning'
            );
        }

        return $insights;
    }

    /**
     * Get recommendations for the user
     */
    protected function getRecommendations($userId)
    {
        return Recommendation::where('user_id', $userId)
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
    }

    /**
     * Get chart data for visualization
     */
    protected function getChartData($reportType, $userId, $accountId)
    {
        $now = now();
        $labels = [];
        $data = [];
        $customData = [];

        switch ($reportType) {
            case 'daily':
                for ($i = 6; $i >= 0; $i--) {
                    $date = $now->copy()->subDays($i);
                    $labels[] = $date->format('D, M j');

                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereDate('created_at', $date)
                        ->sum('total');

                    $customData[] = CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $date) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereDate('created_at', $date);
                        })->sum('total');
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

                    $customData[] = CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $start, $end) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereBetween('created_at', [$start, $end]);
                        })->sum('total');
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

                    $customData[] = CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $month) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereYear('created_at', $month->year)
                              ->whereMonth('created_at', $month->month);
                        })->sum('total');
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

                    $customData[] = CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $year) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereYear('created_at', $year->year);
                        })->sum('total');
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
     * Helper method to create an insight
     */
    protected function createInsight($title, $message, $status)
    {
        return [
            'title' => $title,
            'message' => $message,
            'status' => $status,
            'date' => now()->format('M j, Y'),
        ];
    }
}