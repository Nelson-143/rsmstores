<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
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

        // Calculate total sales (sum of all orders)
        $totalSales = Order::where('account_id', $accountId)->sum('total'); // Assuming 'total' is the field for total sales

        // Assuming you have a way to calculate branches
        $branchCount = Branch::where('account_id', $accountId)->count(); // Count all branches

        // Calculate growth rates
        $customerGrowth = $this->calculateGrowthRate(Customer::class, 'created_at', $accountId);
        $debtChange = $this->calculateGrowthRate(Debt::class, 'created_at', $accountId, 'amount'); // Adjust as needed
        $branchChange = 0; // Replace with actual logic for branch change
        $salesGrowth = $this->calculateGrowthRate(Order::class, 'created_at', $accountId, 'total');

        // Calculate business growth rate based on sales
        $salesData = Order::where('account_id', $accountId)
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
            'customerGrowth' => $customerGrowth,
            'debtChange' => $debtChange,
            'branchChange' => $branchChange,
            'salesGrowth' => $salesGrowth,
            'growthRate' => $growthRate,
            'months' => $months, // Pass the months for the x-axis of the line chart
            'pieChartData' => $pieChartData,
        ]);
    }

    private function calculateGrowthRate($model, $dateColumn, $accountId, $valueColumn = null)
    {
        $now = Carbon::now();
        $previousPeriod = Carbon::now()->subDays(7);

        // Calculate the current value for the specified period
        $currentValue = $model::where('account_id', $accountId)
            ->whereBetween($dateColumn, [$previousPeriod, $now])
            ->when($valueColumn, function ($query) use ($valueColumn) {
                return $query->sum($valueColumn);
            }, function ($query) {
                return $query->count();
            });

        // Calculate the previous value for the previous period
        $previousValue = $model::where('account_id', $accountId)
            ->whereBetween($dateColumn, [$previousPeriod->copy()->subDays(7), $previousPeriod])
            ->when($valueColumn, function ($query) use ($valueColumn) {
                return $query->sum($valueColumn);
            }, function ($query) {
                return $query->count();
            });

        // Avoid division by zero
        if ($previousValue == 0) {
            return 0;
        }

        // Calculate the growth rate
        return (($currentValue - $previousValue) / $previousValue) * 100;
    }
}
