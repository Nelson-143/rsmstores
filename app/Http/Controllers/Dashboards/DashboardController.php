<?php

namespace app\Http\Controllers\Dashboards;

use app\Http\Controllers\Controller;
use app\Models\Category;
use app\Models\Order;
use app\Models\Product;
use app\Models\Purchase;
use app\Models\Quotation;
use app\Models\Customer;
use app\Models\Debt;
use app\Models\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    
  public function index(Request $request) {
    $accountId = auth()->user()->account_id;

    // Existing logic for counts
    $ordersCount = Order::where('account_id', $accountId)->count();
    $productsCount = Product::where('account_id', $accountId)->count();
    $purchasesCount = Purchase::where('account_id', $accountId)->count();
    $todayPurchases = Purchase::whereDate('date', today()->format('Y-m-d'))->where('account_id', $accountId)->count();
    $todayProducts = Product::whereDate('created_at', today()->format('Y-m-d'))->where('account_id', $accountId)->count();
    $todayQuotations = Quotation::whereDate('created_at', today()->format('Y-m-d'))->where('account_id', $accountId)->count();
    $todayOrders = Order::whereDate('created_at', today()->format('Y-m-d'))->where('account_id', $accountId)->count();
    $categoriesCount = Category::where('account_id', $accountId)->count();
    $quotationsCount = Quotation::where('account_id', $accountId)->count();

    // New logic for customers, debt, branch, carts, and growth rates
    $customersCount = Customer::where('account_id', $accountId)->count(); // Count customers

  $debts = Debt::where('account_id', $accountId)->get();
$totalValueOfDebt = $debts->sum(function ($debt) {
    return $debt->amount - $debt->amount_paid; // Remaining balance for each debt
});
    // Calculate total sales based on the selected period
    $period = $request->input('period', 'daily'); // Default to daily if not set

    switch ($period) {
        case 'daily':
            $totalSales = Order::where('account_id', $accountId)
                ->where('order_status', ' 1 - Complete')
                ->whereDate('created_at', today()->format('Y-m-d'))
                ->sum('total');
            break;
        case 'weekly':
            $totalSales = Order::where('account_id', $accountId)
                ->where('order_status', ' 1 - Complete')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->sum('total');
            break;
        case 'monthly':
            $totalSales = Order::where('account_id', $accountId)
                ->where('order_status', ' 1 - Complete')
                ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
                ->sum('total');
            break;
        case 'yearly':
            $totalSales = Order::where('account_id', $accountId)
                ->where('order_status', ' 1 - Complete')
                ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
                ->sum('total');
            break;
        default:
            $totalSales = 0; // Fallback
            break;
    }

    // Calculate daily sales
    $dailySales = Order::where('account_id', $accountId)
        ->where('order_status', ' 1 - Complete')
        ->whereDate('created_at', today()->format('Y-m-d'))
        ->sum('total');

    // Calculate weekly sales
    $weeklySales = Order::where('account_id', $accountId)
        ->where('order_status', ' 1 - Complete')
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->sum('total');

    // Calculate monthly sales
    $monthlySales = Order::where('account_id', $accountId)
        ->where('order_status', ' 1 - Complete')
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->sum('total');

    // Assuming you have a way to calculate branches
    $branchCount = Branch::where('account_id', $accountId)->count(); // Count all branches

    // Calculate growth rates
    $customerGrowth = $this->calculateGrowthRate(Customer::class, 'created_at', $accountId);
    $debtChange = $this->calculateGrowthRate(Debt::class, 'created_at', $accountId, 'amount'); // Adjust as needed
    $branchChange = 0; // Replace with actual logic for branch change
    $salesGrowth = $this->calculateGrowthRate(Order::class, 'created_at', $accountId, 'total');

    $salesData = Order::where('account_id', $accountId)
        ->where('order_status', ' 1 - Complete')
        ->whereBetween('created_at', [Carbon::now()->subMonths(6), Carbon::now()])
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as total_sales')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Prepare data for the line chart
    $growthRate = $salesData->pluck('total_sales')->toArray();
    $months = $salesData->pluck('month')->toArray();

    // Calculate out-of-stock products
    $outOfStockProducts = Product::where('quantity', '<=', 0)->where('account_id', $accountId)->count();
    $totalProducts = Product::where('account_id', $accountId)->count();
    $inStockProducts = $totalProducts - $outOfStockProducts;

    // Prepare data for the pie chart
    $pieChartData = [
        'labels' => ['In Stock', 'Out of Stock'],
        'data' => [$inStockProducts, $outOfStockProducts],
    ];
    $motivations = [
        'You got this! 💪',
        'Keep pushing! 🚀',
        'Stay focused! 🎯',
        'You are doing great! 🌟',
        'Keep going! 🏃‍♂️',
        'Believe in yourself! 🙌',
        'Stay motivated! 🔥',
        'You are strong! 💪',
        'Keep shining! ✨',
        'Never give up! 🚀',
        'You are a Champion! 😎',
        'Stay positive! 😊',
        'Dream big! 🌈',
        'You can do it! 🙌',
        'Stay awesome! 🦸‍♂️',
        'Go for it! 🚀',
        'Stay courageous! 🦁',
        'Reach for the stars! 🌟',
        'You are unstoppable! 🏆',
        'Stay determined! 💪',
        'Stay inspired! ✨',
        'Keep the faith! 🙏',
        'Stay strong! 💪',
        'You are a warrior! 🛡️',
        'Keep thriving! 🌱',
        'You are amazing! 🎉',
        'Stay resilient! 🧗‍♂️',
        'Keep dreaming! 🌟',
        'Stay fierce! 🐯',
        'You are capable! 💪'
    ];

    $motivation = $motivations[array_rand($motivations)];

    // Get sales growth rates
    $growthData = $this->getSalesGrowthRates($accountId);

    return view('dashboard', [
        'products' => $productsCount,
        'orders' => $ordersCount,
        'purchases' => $purchasesCount,
        'todayPurchases' => $todayPurchases,
        'todayProducts' => $todayProducts,
        'todayQuotations' => $todayQuotations,
        'todayOrders' => $todayOrders,
        'categories' => $categoriesCount,
        'quotations' => $quotationsCount,
        'customers' => $customersCount,
        'debt' => $totalValueOfDebt, // Pass the total value of debt to the view
        'branch' => $branchCount,
        'carts' => $totalSales, // Assuming carts represent total sales
        'total' => $totalSales,
        'daily' => $dailySales,
        'weekly' => $weeklySales,
        'monthly' => $monthlySales,
        'customerGrowth' => $customerGrowth,
        'debtChange' => $debtChange,
        'branchChange' => $branchChange,
        'salesGrowth' => $salesGrowth,
        'growthRate' => $growthRate,
        'months' => $months, // Pass the months for the x-axis of the line chart
        'pieChartData' => $pieChartData,
        'motivation' => $motivation,
        'salesGrowthMonths' => $growthData['months'],
        'salesGrowthRates' => $growthData['growthRates'],
    ]);
}
private function calculateGrowthRate($model, $dateColumn, $accountId, $valueColumn = null)
{
    $now = Carbon::now();
    $previousPeriod = Carbon::now()->subDays(7); // Adjust the period as needed (e.g., weekly, monthly)

    // Calculate the current value for the specified period
    $currentValue = $model::where('account_id', $accountId)
        ->whereBetween($dateColumn, [$previousPeriod, $now])
        ->when($valueColumn, function ($query) use ($valueColumn) {
            return $query->sum($valueColumn); // Sum the monetary value (e.g., sales)
        }, function ($query) {
            return $query->count(); // Count the number of records
        });

    // Calculate the previous value for the previous period
    $previousValue = $model::where('account_id', $accountId)
        ->whereBetween($dateColumn, [$previousPeriod->copy()->subDays(7), $previousPeriod])
        ->when($valueColumn, function ($query) use ($valueColumn) {
            return $query->sum($valueColumn); // Sum the monetary value (e.g., sales)
        }, function ($query) {
            return $query->count(); // Count the number of records
        });

    // Avoid division by zero and handle edge cases
    if ($previousValue == 0) {
        return 0; // No growth if there's no previous value
    }

    // Calculate the growth rate as a percentage
    $growthRate = (($currentValue - $previousValue) / $previousValue) * 100;

    // Cap the growth rate at 100% to avoid unrealistic values
    $growthRate = min($growthRate, 100);

    return number_format($growthRate, 2); // Return the growth rate as a percentage (e.g., 12.34)
}
public function getSalesGrowthRates($accountId)
{
    $months = [];
    $growthRates = [];

    // Loop through the last 12 months
    for ($i = 11; $i >= 0; $i--) {
        $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
        $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();

        // Calculate growth rate for the month
        $growthRate = $this->calculateGrowthRate(Order::class, 'created_at', $accountId, 'total');
        $growthRates[] = $growthRate;

        // Store the month label (e.g., "Jan 2023")
        $months[] = $startOfMonth->format('M Y');
    }

    return [
        'months' => $months,
        'growthRates' => $growthRates,
    ];
}


}