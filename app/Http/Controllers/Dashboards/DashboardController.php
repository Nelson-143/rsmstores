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
use App\Models\Branch; // If you need to calculate branches
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Existing logic for counts
        $ordersCount = Order::where("user_id", auth()->id())->count();
        $productsCount = Product::where("user_id", auth()->id())->count();
        $purchasesCount = Purchase::where("user_id", auth()->id())->count();
        $todayPurchases = Purchase::whereDate('date', today()->format('Y-m-d'))->count();
        $todayProducts = Product::whereDate('created_at', today()->format('Y-m-d'))->count();
        $todayQuotations = Quotation::whereDate('created_at', today()->format('Y-m-d'))->count();
        $todayOrders = Order::whereDate('created_at', today()->format('Y-m-d'))->count();
        $categoriesCount = Category::where("user_id", auth()->id())->count();
        $quotationsCount = Quotation::where("user_id", auth()->id())->count();

        // New logic for customers, debt, branch, carts, and growth rates
        $customersCount = Customer::where("user_id", auth()->id())->count(); // Count customers

       $debts = Debt::where("customer_id", auth()->id())->get();
$totalValueOfDebt = $debts->sum(function ($debt) {
    return $debt->amount - $debt->amount_paid; // Remaining balance for each debt
});
        // Calculate total sales (sum of all orders)
        $totalSales = Order::where("user_id", auth()->id())->sum('total'); // Assuming 'total' is the field for total sales

        // Assuming you have a way to calculate branches
        $branchCount = Branch::count(); // Count all branches
        $previousBranchCount = 100; // Replace this with the actual previous branch count
        $branchChange = $previousBranchCount > 0 ? (($branchCount - $previousBranchCount) / $previousBranchCount) * 100 : 0;
        // Calculate growth rates
        $customerGrowth = $this->calculateGrowthRate(Customer::class, 'created_at');
        $debtChange = $this->calculateGrowthRate(Debt::class, 'created_at', 'amount'); // Adjust as needed
        $branchChange = 0; // Replace with actual logic for branch change
        $salesGrowth = $this->calculateGrowthRate(Order::class, 'created_at', 'total');

        // Calculate business growth rate based on sales
        $salesData = Order::where('user_id', auth()->id())
            ->whereBetween('created_at', [Carbon::now()->subMonths(6), Carbon::now()])
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as total_sales')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare data for the line chart
        $growthRate = $salesData->pluck('total_sales')->toArray();
        $months = $salesData->pluck('month')->toArray();

        // Calculate out-of-stock products
        $outOfStockProducts = Product::where('quantity', '<=', 0)->count();
        $totalProducts = Product::count();
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

    private function calculateGrowthRate($model, $dateColumn, $valueColumn = null)
    {
        $now = Carbon::now();
        $previousPeriod = Carbon::now()->subDays(7);

        // Calculate the current value for the specified period
        $currentValue = $model::whereBetween($dateColumn, [$previousPeriod, $now])
            ->when($valueColumn, function ($query) use ($valueColumn) {
                return $query->sum($valueColumn);
            }, function ($query) {
                return $query->count();
            });

        // Calculate the previous value for the previous period
        $previousValue = $model::whereBetween($dateColumn, [$previousPeriod->copy()->subDays(7), $previousPeriod])
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