@extends('layouts.tabler')

@section('title', 'Business Reports')

@section('me')
    @parent
@endsection

@section('report')

<div class="container-xl">
    <!-- Business Overview Section -->
    <div class="row row-cards mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Business Overview</h2><br>
                    <p class="text-muted"> /A glance summary of your business performance 🚀.</p>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <div class="text-center">
                        <h5>Total Sales</h5>
                        <p class="h3 text-success">Tsh {{--<!--{{ number_format($totalSales, 2) }}-->--}}</p>
                    </div>
                    <div class="text-center">
                        <h5>Total Expenses</h5>
                        <p class="h3 text-danger">Tsh {{--<!--{{ number_format($totalExpenses, 2) }}-->--}}</p>
                    </div>
                    <div class="text-center">
                        <h5>Profit</h5>
                        <p class="h3 text-primary">Tsh {{--<!--{{ number_format($profit, 2) }}-->--}}</p>
                    </div>
                    <div class="text-center">
                        <h5>Reports Generated</h5>
                        <p class="h3">{{--{{ $reportCount }}--}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visual Trends Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trends and Insights</h3>
                    <div class="card-actions">
                        <select class="form-select form-select-sm" id="report-type-select">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly" selected>Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="reportChart" height="100"></canvas>
                    <p class="text-muted text-center mt-3">
                        The chart shows sales, expenses, and profit trends over time. Use the dropdown to change the time frame.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Accounting Reports Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Accounting Reports</h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accounting-reports">
                        <!-- Income Statement -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#income-statement">
                                    Income Statement
                                </button>
                            </h2>
                            <div id="income-statement" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount (Tsh)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Revenue</td><td>{{--<!--{{ number_format($incomeStatement['revenue'], 2) }}-->--}}</td></tr>
                                            <tr><td>COGS</td><td>{{--<!--{{ number_format($incomeStatement['cogs'], 2) }}-->--}}</td></tr>
                                            <tr><td>Gross Profit</td><td>{{--<!--{{ number_format($incomeStatement['grossProfit'], 2) }}-->--}}</td></tr>
                                            <tr><td>Operating Expenses</td><td>{{--<!--{{ number_format($incomeStatement['expenses'], 2) }}-->--}}</td></tr>
                                            <tr><td>Net Income</td><td>{{--<!--{{ number_format($incomeStatement['netIncome'], 2) }}-->--}}</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Other Reports -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#balance-sheet">
                                    Balance Sheet
                                </button>
                            </h2>
                            <div id="balance-sheet" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <!-- Balance sheet content -->
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cash-flow">
                                    Cash Flow
                                </button>
                            </h2>
                            <div id="cash-flow" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <!-- Cash flow content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">AI-Driven Recommendations</h3>
                </div>
                <div class="card-body">
                    @forelse($recommendations as $recommendation)
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <span>{{--{{ $recommendation->recommendation }}--}}</span>
                            <a href="#" class="btn btn-sm btn-outline-success">More Details</a>
                        </div>
                    @empty
                        <p class="text-center text-muted">No recommendations available at this time.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detailed Reports</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sales (Tsh)</th>
                                    <th>Expenses (Tsh)</th>
                                    <th>Profit (Tsh)</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                    <tr>
                                        <td>{{ $report->created_at->format('Y-m-d') }}</td>
                                        <td>{{--{{ number_format($report->data['sales'], 2) }}--}}</td>
                                        <td>{{--{{ number_format($report->data['expenses'], 2) }}--}}</td>
                                        <td>{{--{{ number_format($report->data['profit'], 2) }}--}}</td>
                                        <td>{{--{{ ucfirst($report->type) }}--}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No reports available.</td>
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

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart initialization logic
</script>

@endsection
