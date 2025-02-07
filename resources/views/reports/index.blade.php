@extends('layouts.tabler')

@section('title', 'Business Reports🚀')

@section('me')
    @parent
@endsection

@section('report')
<div class="container-xl">
    <!-- Business Overview Section -->
    <div class="row row-cards mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-light">
                    <h2>Business Overview</h2>
                    <p class="text-muted">A glance summary of your business performance 🚀.</p>
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">
                    <div class="text-center">
                        <h5>Total Sales</h5>
                        <p class="h3 text-success">{{ isset($totalSales) ? number_format($totalSales, 2) : 'Tsh 0.00' }}</p>
                    </div>
                    <div class="text-center">
                        <h5>Total Expenses</h5>
                        <p class="h3 text-danger">{{ isset($totalExpenses) ? number_format($totalExpenses, 2) : 'Tsh 0.00' }}</p>
                    </div>
                    <div class="text-center">
                        <h5>Profit</h5>
                        <p class="h3 text-primary">{{ isset($profit) ? number_format($profit, 2) : 'Tsh 0.00' }}</p>
                    </div>
                    <div class="text-center">
                        <h5>Reports Generated</h5>
                        <p class="h3">{{ isset($reportCount) ? $reportCount : '0' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visual Trends Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
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
                <div class="card-body text-center">
                    <canvas id="reportChart" height="100"></canvas>
                    @if (!isset($chartData) || empty($chartData))
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chart-pie-2 text-muted mx-auto">
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M22 11.73V9a4 4 0 0 0-4-4H8.82a4 4 0 0 0-4 4v11a4 4 0 0 0 4 4H14a4 4 0 0 0 4-4V7.39a2 2 0 0 1 2-2"></path>
                            <path d="M16 17v4a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-4"></path>
                            <path d="M14 3a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4"></path>
                        </svg>
                        <p class="text-muted mt-3">No data available yet. Start generating reports to see trends here.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Accounting Reports Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount (Tsh)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Revenue</td><td>{{ isset($incomeStatement['revenue']) ? number_format($incomeStatement['revenue'], 2) : 'Tsh 0.00' }}</td></tr>
                                            <tr><td>COGS</td><td>{{ isset($incomeStatement['cogs']) ? number_format($incomeStatement['cogs'], 2) : 'Tsh 0.00' }}</td></tr>
                                            <tr><td>Gross Profit</td><td>{{ isset($incomeStatement['grossProfit']) ? number_format($incomeStatement['grossProfit'], 2) : 'Tsh 0.00' }}</td></tr>
                                            <tr><td>Operating Expenses</td><td>{{ isset($incomeStatement['expenses']) ? number_format($incomeStatement['expenses'], 2) : 'Tsh 0.00' }}</td></tr>
                                            <tr><td>Net Income</td><td>{{ isset($incomeStatement['netIncome']) ? number_format($incomeStatement['netIncome'], 2) : 'Tsh 0.00' }}</td></tr>
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
                                    <p class="text-muted text-center">No balance sheet data available at this time.</p>
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
                                    <p class="text-muted text-center">No cash flow data available at this time.</p>
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
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h3 class="card-title">AI-Driven Recommendations</h3>
                </div>
                <div class="card-body">
                    @forelse($recommendations as $recommendation)
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <span>{{ $recommendation->recommendation }}</span>
                            <a href="#" class="btn btn-sm btn-outline-success">More Details</a>
                        </div>
                    @empty
                        <div class="alert alert-secondary text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-lightbulb text-muted mx-auto">
                                <path d="M12 3v4"></path>
                                <path d="M12 13v8"></path>
                                <path d="M12 7.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                            </svg>
                            <p class="mt-2">No recommendations available at this time. Generate more data for insights!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
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
                                        <td>{{ isset($report->data['sales']) ? number_format($report->data['sales'], 2) : 'Tsh 0.00' }}</td>
                                        <td>{{ isset($report->data['expenses']) ? number_format($report->data['expenses'], 2) : 'Tsh 0.00' }}</td>
                                        <td>{{ isset($report->data['profit']) ? number_format($report->data['profit'], 2) : 'Tsh 0.00' }}</td>
                                        <td>{{ ucfirst($report->type) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-file-text text-muted mx-auto">
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path d="M17 21h-10a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h7.41"></path>
                                                <path d="M9 14L12 17l3-3"></path>
                                            </svg>
                                            <p class="mt-2">No detailed reports available. Start generating reports to see data here.</p>
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

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart initialization logic
    const ctx = document.getElementById('reportChart').getContext('2d');
    const reportChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {{ isset($chartLabels) ? json_encode($chartLabels) : '["No Data"]' }},
            datasets: [{
                label: 'Sales, Expenses, Profit',
                data: {{ isset($chartData) ? json_encode($chartData) : '[0]' }},
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection