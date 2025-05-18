<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Recommendation;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Expense;
<<<<<<< HEAD
use App\Models\Debt; // Add Debt model
use App\Models\TaxReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomOrderDetail; // Assuming this is the model for custom orders
=======
use app\Models\ExpenseCategory;
use App\Models\TaxReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
<<<<<<< HEAD
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

=======
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
    public function index(Request $request)
    {
        $userId = auth()->id();
        $accountId = auth()->user()->account_id;
        
        // Set default report type if not provided
        $reportType = $request->get('report_type', 'monthly');
        
        // Date range handling
        $dateRange = $this->getDateRange($reportType, $request);
        
<<<<<<< HEAD
        // 1. Sales Data with VAT
=======
        // 1. Sales Data (now with VAT instead of tax)
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
        $salesData = $this->getSalesData($userId, $accountId, $dateRange);
        
        // 2. Expense Data
        $expenseData = $this->getExpenseData($userId, $accountId, $dateRange);
        
<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
        $chartData = $this->getChartData($reportType, $userId, $accountId);
        
        return view('reports.index', array_merge(
            $salesData,
            $expenseData,
<<<<<<< HEAD
            $debtData,
            $customOrdersData,
=======
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            $inventoryData,
            [
                'reportType' => $reportType,
                'incomeStatement' => $incomeStatement,
                'balanceSheet' => $balanceSheet,
                'cashFlow' => $cashFlow,
<<<<<<< HEAD
                'vatReport' => $vatReport,
=======
                'vatReport' => $vatReport, // Changed from taxReport to vatReport
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                'recentTransactions' => $recentTransactions,
                'chartLabels' => $chartData['labels'],
                'chartData' => $chartData['data'],
                'recommendations' => $recommendations,
                'actionableInsights' => $actionableInsights,
                'startDate' => $dateRange['start']->format('Y-m-d'),
                'endDate' => $dateRange['end']->format('Y-m-d'),
<<<<<<< HEAD
                'totalAvailableStock' => $totalAvailableStock ?? 0, // Ensure variable is defined
                'lowStockItems' => $lowStockItems,
                'outOfStockItems' => $outOfStockItems,
                'totalStockValue' => $totalStockValue ?? 0,
=======
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            ],
            $keyMetrics
        ));
    }

<<<<<<< HEAD
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

=======
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
            
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
        return [
            'totalSales' => $totalSales,
            'totalVat' => $totalVat,
            'subTotal' => $subTotal,
<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
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
<<<<<<< HEAD

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
=======
            
        return [
            'revenue' => $salesData['subTotal'], // Before VAT
            'gross_sales' => $salesData['totalSales'], // Including VAT
            'vat' => $salesData['totalVat'],
            'cogs' => $cogs,
            'grossProfit' => $salesData['subTotal'] - $cogs, // Profit before expenses
            'expenses' => $expenseData['totalExpenses'],
            'netIncome' => ($salesData['subTotal'] - $cogs) - $expenseData['totalExpenses'],
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            'startDate' => $salesData['startDate'],
            'endDate' => $salesData['endDate'],
        ];
    }

<<<<<<< HEAD
    // Update balance sheet to include debts
    protected function getBalanceSheet($userId, $accountId, $debtData)
    {
        $balanceSheet = [
            'assets' => [
                'Cash' => 0,
                'Accounts Receivable' => Order::with('customer')
                    ->where('user_id', $userId)
                    ->where('account_id', $accountId)
=======
    protected function getBalanceSheet($userId, $accountId, Request $request)
    {
        // Initialize with default values
        $balanceSheet = [
            'assets' => [
                'Cash' => 0, // This would come from your cash records
                'Accounts Receivable' => Order::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    //->where('payment_status', '!=', 'paid')
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                    ->sum('total'),
                'Inventory' => Product::where('account_id', $accountId)
                    ->sum(DB::raw('quantity * buying_price')),
            ],
            'liabilities' => [
                'Accounts Payable' => Expense::where('user_id', $userId)
                    ->where('account_id', $accountId)
<<<<<<< HEAD
                    ->sum('amount'),
                'VAT Payable' => Order::with('customer')
                    ->where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('vat'),
                'Outstanding Debts' => $debtData['outstandingDebts'] ?? 0,
            ],
        ];
        
=======
                    //->where('paid', false)
                    ->sum('amount'),
                'VAT Payable' => Order::where('user_id', $userId)
                    ->where('account_id', $accountId)
                    ->sum('vat'), // Total VAT collected
            ],
        ];
        
        // Calculate totals
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
        $balanceSheet['totalAssets'] = array_sum($balanceSheet['assets']);
        $balanceSheet['totalLiabilities'] = array_sum($balanceSheet['liabilities']);
        $balanceSheet['equity'] = $balanceSheet['totalAssets'] - $balanceSheet['totalLiabilities'];
        
        return $balanceSheet;
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            ],
        ];
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            
        return [
            'grossMargin' => $grossMargin,
            'expenseRatio' => $expenseRatio,
            'netMargin' => $netMargin,
<<<<<<< HEAD
            'ytdPerformance' => $netIncome,
        ];
    }

    // Update insights to include debt-related insights
    protected function generateActionableInsights($incomeStatement, $inventoryData, $debtData)
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
    {
        $insights = [];
        
        // 1. Profitability Insights
        if ($incomeStatement['netIncome'] < 0) {
            $insights[] = $this->createInsight(
                'Negative Profitability', 
                'Your business is currently operating at a loss. Immediate action is required to reduce costs or increase sales.',
                'danger'
            );
<<<<<<< HEAD
        }
        
        // 2. Debt Insights
        if (($debtData['outstandingDebts'] ?? 0) > 0) {
            $insights[] = $this->createInsight(
                'Outstanding Debts', 
                'You have '.number_format($debtData['outstandingDebts'], 2).' in outstanding debts. Consider following up with customers.',
=======
        } elseif ($incomeStatement['netIncome'] < 5) {
            $insights[] = $this->createInsight(
                'Low Profit Margin', 
                'Your profit margin is very low ('.number_format($incomeStatement['netMargin'], 2).'%). Consider reviewing pricing or reducing operational costs.',
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                'warning'
            );
        }
        
<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
            $insights[] = $this->createInsight(
                'Out of Stock Items', 
                'You have '.$inventoryData['outOfStockItems'].' products out of stock. This is causing lost sales opportunities.',
                'danger'
            );
        }
        
<<<<<<< HEAD
=======
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
        
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
        return $insights;
    }

    protected function hasVatPaymentRecords($vatAmount)
<<<<<<< HEAD
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
=======
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
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb

        switch ($reportType) {
            case 'daily':
                for ($i = 6; $i >= 0; $i--) {
                    $date = $now->copy()->subDays($i);
                    $labels[] = $date->format('D, M j');
<<<<<<< HEAD

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
=======
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereDate('created_at', $date)
                        ->sum('total');
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                }
                break;

            case 'weekly':
                for ($i = 3; $i >= 0; $i--) {
                    $start = $now->copy()->subWeeks($i)->startOfWeek();
                    $end = $now->copy()->subWeeks($i)->endOfWeek();
                    $labels[] = 'Week '.($i + 1).' ('.$start->format('M j').')';
<<<<<<< HEAD

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
=======
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereBetween('created_at', [$start, $end])
                        ->sum('total');
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                }
                break;

            case 'monthly':
                for ($i = 11; $i >= 0; $i--) {
                    $month = $now->copy()->subMonths($i);
                    $labels[] = $month->format('M Y');
<<<<<<< HEAD

                    $data[] = Order::with('customer')
                        ->where('user_id', $userId)
=======
                    $data[] = Order::where('user_id', $userId)
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $month->year)
                        ->whereMonth('created_at', $month->month)
                        ->sum('total');
<<<<<<< HEAD

                    $customData[] = class_exists('App\\Models\\CustomOrderDetail') ? \App\Models\CustomOrderDetail::whereHas('order', function($q) use ($userId, $accountId, $month) {
                            $q->where('user_id', $userId)
                              ->where('account_id', $accountId)
                              ->whereYear('created_at', $month->year)
                              ->whereMonth('created_at', $month->month);
                        })->sum('total') : 0;
=======
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                }
                break;

            case 'yearly':
                for ($i = 4; $i >= 0; $i--) {
                    $year = $now->copy()->subYears($i);
                    $labels[] = $year->format('Y');
<<<<<<< HEAD

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
=======
                    $data[] = Order::where('user_id', $userId)
                        ->where('account_id', $accountId)
                        ->whereYear('created_at', $year->year)
                        ->sum('total');
>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
                }
                break;
        }

        return [
            'labels' => $labels,
            'data' => $data,
<<<<<<< HEAD
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

=======
        ];
    }

>>>>>>> 7f8822cbc5d1f06e6dd71b2bd19c46aff0228fbb
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