@extends('layouts.tabler')

@section('title')
    Reports 
@endsection

@section('me')
    @parent
@endsection

@section('report')

<div class="container-xl">
    <div class="row row-cards">
        <!-- Metrics Overview -->
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="text-muted mb-1">Total Sales</div>
                    <div class="h1">Tsh </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="text-muted mb-1">Total Expenses</div>
                    <div class="h1 text-danger">Tsh </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="text-muted mb-1">Profit</div>
                    <div class="h1 text-success">Tsh</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="text-muted mb-1">Reports Generated</div>
                    <div class="h1"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Report Trends</h3>
                    <div class="card-actions">
                        <select class="form-select form-select-sm" id="report-type-select">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="reportChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- the accounting report--->
     <div class="nav-wrapper">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="#income-statement" data-bs-toggle="tab" class="nav-link active">Income Statement</a>
        </li>
        <li class="nav-item">
            <a href="#balance-sheet" data-bs-toggle="tab" class="nav-link">Balance Sheet</a>
        </li>
        <li class="nav-item">
            <a href="#cash-flow" data-bs-toggle="tab" class="nav-link">Cash Flow</a>
        </li>
        <li class="nav-item">
            <a href="#tax-report" data-bs-toggle="tab" class="nav-link">Tax Report</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div id="income-statement" class="tab-pane active">
        <h4>Income Statement</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Revenue</td>
                    <td>Tsh </td>
                </tr>
                <tr>
                    <td>COGS</td>
                    <td>Tsh </td>
                </tr>
                <tr>
                    <td>Gross Profit</td>
                    <td>Tsh </td>
                </tr>
                <tr>
                    <td>Operating Expenses</td>
                    <td>Tsh</td>
                </tr>
                <tr>
                    <td>Net Income</td>
                    <td>Tsh </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="balance-sheet" class="tab-pane">
        <h4>Balance Sheet</h4>
        <!-- Similar structure for balance sheet -->
    </div>

    <div id="cash-flow" class="tab-pane">
        <h4>Cash Flow</h4>
        <!-- Similar structure for cash flow -->
    </div>

    <div id="tax-report" class="tab-pane">
        <h4>Tax Report</h4>
        <!-- Similar structure for tax report -->
    </div>
</div>
    <!-- Recommendations Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recommendations</h3>
                </div>
                <div class="card-body">
                    @forelse($recommendations as $recommendation)
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <span>{{ $recommendation->recommendation }}</span>
                            <form method="POST" action="{{ route('recommendations.read', $recommendation->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success">Mark as Read</button>
                            </form>
                        </div>
                    @empty
                        <p>No recommendations at this time.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Report Table -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detailed Report</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sales</th>
                                    <th>Expenses</th>
                                    <th>Profit</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                    <tr>
                                        <td>{{ $report->created_at->format('Y-m-d') }}</td>
                                        <td>Tsh {{ number_format($report->data['sales'], 2) }}</td>
                                        <td>Tsh {{ number_format($report->data['expenses'], 2) }}</td>
                                        <td>Tsh {{ number_format($report->data['profit'], 2) }}</td>
                                        <td>{{ ucfirst($report->type) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No reports available.</td>
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

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('reportChart').getContext('2d');
        const reportChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Sales',
                    data: @json($chartData['sales']),
                    borderColor: '#4caf50',
                    fill: false
                }, {
                    label: 'Expenses',
                    data: @json($chartData['expenses']),
                    borderColor: '#f44336',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { title: { display: true, text: 'Date' } },
                    y: { title: { display: true, text: 'Amount (Tsh)' } }
                }
            }
        });

        // Handle report type switch
        document.getElementById('report-type-select').addEventListener('change', function (e) {
            const type = e.target.value;
            window.location.href = `?type=${type}`;
        });
    });
</script>
@endsection

