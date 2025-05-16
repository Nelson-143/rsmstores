@extends('layouts.tabler')

@section('title', 'Business Intelligence Dashboard')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M9 17v-5"></path>
                                    <path d="M12 17v-1"></path>
                                    <path d="M15 17v-3"></path>
                                </svg>
                                Business Intelligence Dashboard
                            </h2>
                            <div class="text-muted mt-1">
                                {{ now()->format('l, F j, Y') }} • Last updated: {{ now()->diffForHumans() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                    Export Reports
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                            <path d="M9 9l1 0"></path>
                                            <path d="M9 13l6 0"></path>
                                            <path d="M9 17l6 0"></path>
                                        </svg>
                                        PDF Report
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                            <path d="M8 11h8v7h-8z"></path>
                                            <path d="M8 15h8"></path>
                                            <path d="M11 11v7"></path>
                                        </svg>
                                        Excel Export
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                                            <path d="M4.5 15h3"></path>
                                            <path d="M6 15v6"></path>
                                            <path d="M18 15v6"></path>
                                            <path d="M17.5 15h3"></path>
                                        </svg>
                                        Print Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Range Selector -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reports.index') }}" method="GET" class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Report Period</label>
                                <select name="report_type" class="form-select" onchange="this.form.submit()">
                                    <option value="daily" {{ $reportType === 'daily' ? 'selected' : '' }}>Daily</option>
                                    <option value="weekly" {{ $reportType === 'weekly' ? 'selected' : '' }}>Weekly</option>
                                    <option value="monthly" {{ $reportType === 'monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="yearly" {{ $reportType === 'yearly' ? 'selected' : '' }}>Yearly</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Custom Date Range</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M21 21l-6 -6"></path>
                                    </svg>
                                    Apply
                                </button>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Quick Actions</label>
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-outline-primary" onclick="setDateRange('today')">Today</button>
                                    <button type="button" class="btn btn-outline-primary" onclick="setDateRange('week')">This Week</button>
                                    <button type="button" class="btn btn-outline-primary" onclick="setDateRange('month')">This Month</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Metrics Cards -->
        <div class="row mb-4">
            <!-- Total Sales -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                                        <path d="M12 3v3m0 12v3"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Gross Sales
                                </div>
                                <div class="text-muted">
                                    {{ number_format($incomeStatement['revenue'], 2) }} {{ auth()->user()->account->currency }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Net Sales (after discounts) -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                        <path d="M12 17v1m0 -8v1"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Net Sales
                                </div>
                                <div class="text-muted">
                                    {{-- {{ number_format($incomeStatement['revenue'] - $incomeStatement['discounts'], 2) }} {{ auth()->user()->account->currency }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Tax Collected -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-yellow text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 5h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3z"></path>
                                        <path d="M8 8h8"></path>
                                        <path d="M8 12h8"></path>
                                        <path d="M8 16h8"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    vat Collected
                                </div>
                                <div class="text-muted">
                                    {{ number_format($incomeStatement['vat'], 2) }} {{ auth()->user()->account->currency }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Net Profit -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-twitter text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Net Profit
                                </div>
                                <div class="text-muted">
                                    {{ number_format($incomeStatement['netIncome'], 2) }} {{ auth()->user()->account->currency }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="row row-deck row-cards">
            <!-- Sales Trends Chart -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sales Performance</h3>
                        <div class="card-actions">
                            <div class="dropdown">
                                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a                                    <a class="dropdown-item" href="#">This quarter</a>
                                    <a class="dropdown-item" href="#">Custom range</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-lg" id="sales-trend-chart"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-muted">Avg. Daily Sales</div>
                                <div class="h3">{{ number_format($incomeStatement['revenue']/30, 2) }} {{ auth()->user()->account->currency }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Best Day</div>
                                <div class="h3">{{ number_format(max($chartData['data'] ?? [0]), 2) }} {{ auth()->user()->account->currency }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Avg. Order Value</div>
                                <div class="h3">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Summary -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Financial Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>Gross Profit Margin</div>
                                <div class="fw-bold">{{ number_format($grossMargin, 2) }}%</div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{ $grossMargin > 30 ? 'success' : ($grossMargin > 20 ? 'warning' : 'danger') }}" style="width: {{ $grossMargin }}%" role="progressbar" aria-valuenow="{{ $grossMargin }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">{{ $grossMargin }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>Expense Ratio</div>
                                <div class="fw-bold">{{ number_format($expenseRatio, 2) }}%</div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{ $expenseRatio < 30 ? 'success' : ($expenseRatio < 50 ? 'warning' : 'danger') }}" style="width: {{ $expenseRatio }}%" role="progressbar" aria-valuenow="{{ $expenseRatio }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">{{ $expenseRatio }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>Net Profit Margin</div>
                                <div class="fw-bold">{{ number_format(($incomeStatement['netIncome']/$incomeStatement['revenue'])*100, 2) }}%</div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{ ($incomeStatement['netIncome']/$incomeStatement['revenue'])*100 > 15 ? 'success' : (($incomeStatement['netIncome']/$incomeStatement['revenue'])*100 > 5 ? 'warning' : 'danger') }}" style="width: {{ ($incomeStatement['netIncome']/$incomeStatement['revenue'])*100 }}%" role="progressbar" aria-valuenow="{{ ($incomeStatement['netIncome']/$incomeStatement['revenue'])*100 }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">{{ ($incomeStatement['netIncome']/$incomeStatement['revenue'])*100 }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="divide-y">
                            <div class="py-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>Total Revenue</div>
                                    <div class="fw-bold">{{ number_format($incomeStatement['revenue'], 2) }} {{ auth()->user()->account->currency }}</div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>Cost of Goods Sold</div>
                                    <div class="fw-bold">{{ number_format($incomeStatement['cogs'], 2) }} {{ auth()->user()->account->currency }}</div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>Operating Expenses</div>
                                    <div class="fw-bold">{{ number_format($incomeStatement['expenses'], 2) }} {{ auth()->user()->account->currency }}</div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>Net Income</div>
                                    <div class="fw-bold text-{{ $incomeStatement['netIncome'] >= 0 ? 'success' : 'danger' }}">{{ number_format($incomeStatement['netIncome'], 2) }} {{ auth()->user()->account->currency }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Health -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Inventory Health</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="h1">{{ $totalAvailableStock }}</div>
                                        <div class="text-muted">Total Products in Stock</div>
                                        <div class="text-muted small">Valued at {{ number_format($totalStockValue, 2) }} {{ auth()->user()->account->currency }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="h1">{{ $lowStockItems }}</div>
                                        <div class="text-muted">Low Stock Items</div>
                                        <div class="text-muted small">Below reorder level</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="h1">{{ $outOfStockItems }}</div>
                                        <div class="text-muted">Out of Stock</div>
                                        <div class="text-muted small">Urgent restock needed</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="h1">{{ $fastMovingItems ?? 0 }}</div>
                                        <div class="text-muted">Fast Moving</div>
                                        <div class="text-muted small">Top selling products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <canvas id="inventory-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cash Flow Overview -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cash Flow Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-lg" id="cash-flow-chart"></div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Cash Inflows</div>
                                                <div class="ms-auto lh-1">
                                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                                        {{ number_format(array_sum($cashFlow['inflows']), 2) }} {{ auth()->user()->account->currency }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm mt-3">
                                                <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="visually-hidden">100% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Cash Outflows</div>
                                                <div class="ms-auto lh-1">
                                                    <span class="text-red d-inline-flex align-items-center lh-1">
                                                        {{ number_format(array_sum($cashFlow['outflows']), 2) }} {{ auth()->user()->account->currency }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm mt-3">
                                                <div class="progress-bar bg-danger" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="visually-hidden">100% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="h1 text-{{ (array_sum($cashFlow['inflows']) - array_sum($cashFlow['outflows'])) >= 0 ? 'success' : 'danger' }}">
                                        {{ number_format(array_sum($cashFlow['inflows']) - array_sum($cashFlow['outflows']), 2) }} {{ auth()->user()->account->currency }}
                                    </div>
                                    <div class="text-muted">Net Cash Flow</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Insights & Recommendations -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tab-insights" class="nav-link active" data-bs-toggle="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 8l-2 4l-2 4l4 2l4 -2l-2 -4z"></path>
                                    </svg>
                                    Business Insights
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-recommendations" class="nav-link" data-bs-toggle="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                    </svg>
                                    Recommendations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-tax" class="nav-link" data-bs-toggle="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 14l6 -6"></path>
                                        <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"></path>
                                        <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"></path>
                                    </svg>
                                    Tax Summary
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-insights">
                                @forelse($actionableInsights as $insight)
                                <div class="alert alert-{{ $insight['status'] }} alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">{{ $insight['message'] }}</h4>
                                    
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @empty
                                <div class="alert alert-secondary">
                                    <div class="empty">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                <path d="M12 8l0 4"></path>
                                                <path d="M12 16l.01 0"></path>
                                            </svg>
                                        </div>
                                        <p class="empty-title">No insights available</p>
                                        <p class="empty-subtitle text-muted">
                                            As you generate more sales and expense data, actionable insights will appear here.
                                        </p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <div class="tab-pane" id="tab-recommendations">
                                @forelse($recommendations as $recommendation)
                                <div class="mb-3">
                                    <div class="card card-active">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-{{ $recommendation->priority === 'high' ? 'danger' : ($recommendation->priority === 'medium' ? 'warning' : 'info') }} text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ $recommendation->title }}
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ $recommendation->recommendation }}
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-secondary">
                                    <div class="empty">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                            </svg>
                                        </div>
                                        <p class="empty-title">No recommendations available</p>
                                        <p class="empty-subtitle text-muted">
                                            Our system will analyze your data and provide personalized recommendations.
                                        </p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Transactions</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>Customer</th>
                                        <th>Gross Amount</th>
                                        <th>Tax</th>
                                        <th>Discount</th>
                                        <th>Net Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentTransactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->created_at->format('M j, Y') }}</td>
                                        <td>#{{ $transaction->id }}</td>
                                        <td>{{ $transaction->customer->name ?? 'Walk-in' }}</td>
                                        <td>{{ number_format($transaction->subtotal, 2) }}</td>
                                        <td>{{ number_format($transaction->tax, 2) }}</td>
                                        <td>{{ number_format($transaction->discount, 2) }}</td>
                                        <td>{{ number_format($transaction->total, 2) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $transaction->status === 'completed' ? 'success' : 'warning' }}">
                                                {{ ucfirst($transaction->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="empty">
                                                <div class="empty-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                        <path d="M9 9l1 0"></path>
                                                        <path d="M9 13l6 0"></path>
                                                        <path d="M9 17l6 0"></path>
                                                    </svg>
                                                </div>
                                                <p class="empty-title">No transactions found</p>
                                                <p class="empty-subtitle text-muted">
                                                    Your recent transactions will appear here
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Charts and Interactivity -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Sales Trend Chart
    document.addEventListener('DOMContentLoaded', function () {
        const salesChart = new ApexCharts(document.querySelector("#sales-trend-chart"), {
            series: [{
                name: "Sales",
                data: @json($chartData['data'] ?? [])
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: true
                },
                toolbar: {
                    show: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            colors: ['#206bc4'],
            xaxis: {
                categories: @json($chartData['labels'] ?? []),
                type: 'datetime'
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                opacity: 0.1,
                type: 'solid'
            },
            markers: {
                size: 5,
                hover: {
                    size: 7
                }
            }
        });
        salesChart.render();

        // Cash Flow Chart
        const cashFlowChart = new ApexCharts(document.querySelector("#cash-flow-chart"), {
            series: [{
                name: 'Inflows',
                data: [@json(array_sum($cashFlow['inflows']))]
            }, {
                name: 'Outflows',
                data: [@json(array_sum($cashFlow['outflows']))]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                },
            },
            colors: ['#2fb344', '#d63939'],
            xaxis: {
                categories: ['Cash Flow']
            },
            legend: {
                position: 'top'
            },
            fill: {
                opacity: 1
            }
        });
        cashFlowChart.render();

        // Inventory Chart
        const inventoryCtx = document.getElementById('inventory-chart').getContext('2d');
        const inventoryChart = new Chart(inventoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['In Stock', 'Low Stock', 'Out of Stock'],
                datasets: [{
                    data: [
                        @json($totalAvailableStock - $lowStockItems - $outOfStockItems),
                        @json($lowStockItems),
                        @json($outOfStockItems)
                    ],
                    backgroundColor: [
                        '#2fb344',
                        '#f59f00',
                        '#d63939'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Date range quick actions
        window.setDateRange = function(range) {
            const now = new Date();
            let startDate, endDate = now.toISOString().split('T')[0];
            
            switch(range) {
                case 'today':
                    startDate = endDate;
                    break;
                case 'week':
                    const day = now.getDay();
                    const diff = now.getDate() - day + (day === 0 ? -6 : 1); // adjust when day is Sunday
                    startDate = new Date(now.setDate(diff)).toISOString().split('T')[0];
                    break;
                case 'month':
                    startDate = new Date(now.getFullYear(), now.getMonth(), 1).toISOString().split('T')[0];
                    break;
            }
            
            document.querySelector('input[name="start_date"]').value = startDate;
            document.querySelector('input[name="end_date"]').value = endDate;
        }
    });
</script>
@endsection
