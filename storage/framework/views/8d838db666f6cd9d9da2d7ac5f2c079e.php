<?php $__env->startSection('title', 'Business Reports 🚀'); ?>

<?php $__env->startSection('me'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('me'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('report'); ?>
<div class="container-xl">
    <!-- Business Overview Section -->
    <div class="row row-cards mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-light">
                    <h2><?php echo e(__('Business Overview')); ?></h2>
                    <p class="text-muted"><?php echo e(__('A glance summary of your business')); ?>🚀.</p>
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">
                    <div class="text-center">
                        <h5><?php echo e(__('Total Sales')); ?></h5>
                        <p class="h3 text-success"><?php echo e(isset($carts) ? number_format($carts, 2) : 'Tsh 0.00'); ?></p>
                    </div>
                    <div class="text-center">
                        <h5><?php echo e(__('Total Expenses')); ?></h5>
                        <p class="h3 text-danger"><?php echo e(isset($totalExpenses) ? number_format($totalExpenses, 2) : 'Tsh 0.00'); ?></p>
                    </div>
                    <div class="text-center">
                        <h5><?php echo e(__('Profit')); ?></h5>
                        <p class="h3 text-primary"><?php echo e(isset($profit) ? number_format($profit, 2) : 'Tsh 0.00'); ?></p>
                    </div>

                  
                </div>
                <!-- display -->
                <div class="card-body d-flex justify-content-around align-items-center">
                <div class="text-center">
                    <h5><?php echo e(__('Total Available Stock')); ?></h5>
                    <p class="h3 text-success"><?php echo e(isset($totalAvailableStock) ? number_format($totalAvailableStock, 2) : '0'); ?></p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-packages"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z" /><path d="M2 13.5v5.5l5 3" /><path d="M7 16.545l5 -3.03" /><path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z" /><path d="M12 19l5 3" /><path d="M17 16.5l5 -3" /><path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5" /><path d="M7 5.03v5.455" /><path d="M12 8l5 -3" /></svg>

                </div>
                <div class="text-center">
                    <h5><?php echo e(__('Low Stock Items')); ?></h5>
                    <p class="h3 text-warning"><?php echo e(isset($lowStockItems) ? number_format($lowStockItems, 2) : '0'); ?></p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag-exclamation"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-6.426a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.258 1.678" /><path d="M9 11v-5a3 3 0 0 1 6 0v5" /><path d="M19 16v3" /><path d="M19 22v.01" /></svg>
                </div>
                <div class="text-center">
                    <h5><?php echo e(__('Out of Stock Items')); ?></h5>
                    <p class="h3 text-danger"><?php echo e(isset($outOfStockItems) ? number_format($outOfStockItems, 2) : '0'); ?></p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 21h-4.426a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.506 3.287" /><path d="M9 11v-5a3 3 0 0 1 6 0v5" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                </div>
                <div class="text-center">
                    <h5><?php echo e(__('Total Stock Value')); ?></h5>
                    <p class="h3 text-primary"><?php echo e(isset($totalStockValue) ? number_format($totalStockValue, 2) : 'Tsh 0.00'); ?></p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-businessplan"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0" /><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M5 15v1m0 -8v1" /></svg>
                </div>
            </div>
            </div>
        </div>
        
    </div>

    <!-- Date Range Selector -->
    <!-- <div class="row mb-4">
        <div class="col-md-12">
            <label for="dateRange" class="form-label">Select Date Range:</label>
            <input type="text" id="dateRange" class="form-control" placeholder="Select date range">
        </div>
    </div> -->

    <!-- Visual Trends Section -->
    <div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h3 class="card-title"><?php echo e(__('Trends and Insights')); ?></h3>
                <div class="card-actions">
                    <form id="report-type-form">
                        <select class="form-select form-select-sm" id="report-type-select" name="report_type">
                            <option value="daily" <?php echo e($reportType === 'daily' ? 'selected' : ''); ?>><?php echo e(__('Daily')); ?></option>
                            <option value="weekly" <?php echo e($reportType === 'weekly' ? 'selected' : ''); ?>><?php echo e(__('Weekly')); ?></option>
                            <option value="monthly" <?php echo e($reportType === 'monthly' ? 'selected' : ''); ?>><?php echo e(__('Monthly')); ?></option>
                            <option value="yearly" <?php echo e($reportType === 'yearly' ? 'selected' : ''); ?>><?php echo e(__('Yearly')); ?></option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body text-center">
                <canvas id="reportChart" height="100"></canvas>
                <?php if(!isset($chartData) || empty($chartData)): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chart-pie-2 text-muted mx-auto">
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M22 11.73V9a4 4 0 0 0-4-4H8.82a4 4 0 0 0-4 4v11a4 4 0 0 0 4 4H14a4 4 0 0 0 4-4V7.39a2 2 0 0 1 2-2"></path>
                        <path d="M16 17v4a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-4"></path>
                        <path d="M14 3a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4"></path>
                    </svg>
                    <p class="text-muted mt-3">No data available yet. Start generating reports to see trends here.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    <!-- Key Performance Indicators Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h3 class="card-title"><?php echo e(__('Key Performance Indicators ')); ?>(KPIs)</h3>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <div class="text-center">
                        <h5><?php echo e(__('Gross Margin')); ?></h5>
                        <p class="h3 text-success"><?php echo e(isset($grossMargin) ? number_format($grossMargin, 2) . '%' : '0%'); ?></p>
                    </div>
                    <div class="text-center">
                        <h5><?php echo e(__('Expense Ratio')); ?></h5>
                        <p class="h3 text-danger"><?php echo e(isset($expenseRatio) ? number_format($expenseRatio, 2) . '%' : '0%'); ?></p>
                    </div>
                    <div class="text-center">
                        <h5><?php echo e(__('Year-to-Date Performance')); ?></h5>
                        <p class="h3 text-primary"><?php echo e(isset($ytdPerformance) ? number_format($ytdPerformance, 2) : 'Tsh 0.00'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Accounting Reports Section -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="card-title"><?php echo e(__('Accounting Reports')); ?></h3>
            </div>
            <div class="card-body">
                <div class="accordion" id="accounting-reports">
                    <!-- Income Statement -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#income-statement">
                                <?php echo e(__('Income Statement')); ?>

                            </button>
                        </h2>
                        <div id="income-statement" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <th> <?php echo e(__('Amount')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span data-bs-toggle="tooltip" title="Total income from sales."><?php echo e(__('Revenue')); ?></span></td>
                                            <td><?php echo e(number_format($incomeStatement['revenue'], 2)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span data-bs-toggle="tooltip" title="Cost of goods sold."><?php echo e(__('COGS')); ?></span></td>
                                            <td><?php echo e(number_format($incomeStatement['cogs'], 2)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span data-bs-toggle="tooltip" title="Revenue minus COGS."><?php echo e(__('Gross Profit')); ?></span></td>
                                            <td><?php echo e(number_format($incomeStatement['grossProfit'], 2)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span data-bs-toggle="tooltip" title="Operating expenses like salaries, rent, etc."><?php echo e(__('Operating Expenses')); ?></span></td>
                                            <td><?php echo e(number_format($incomeStatement['expenses'], 2)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span data-bs-toggle="tooltip" title="Gross profit minus operating expenses."><?php echo e(__('Net Income')); ?></span></td>
                                            <td><?php echo e(number_format($incomeStatement['netIncome'], 2)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- Cash Flow -->
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cash-flow">
                                <?php echo e(__('Cash Flow')); ?>

                            </button>
                        </h2>
                        <div id="cash-flow" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Category')); ?></th>
                                            <th><?php echo e(__('Amount')); ?> ( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong><?php echo e(__('Inflows')); ?></strong></td>
                                            <td></td>
                                        </tr>
                                        <?php $__currentLoopData = $cashFlow['inflows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inflow => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(ucfirst($inflow)); ?></td>
                                                <td><?php echo e(number_format($amount, 2)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><strong><?php echo e(__('Total Inflows')); ?></strong></td>
                                            <td><?php echo e(number_format(array_sum($cashFlow['inflows']), 2)); ?></td>
                                        </tr>

                                        <tr>
                                            <td><strong><?php echo e(__('Outflows')); ?></strong></td>
                                            <td></td>
                                        </tr>
                                        <?php $__currentLoopData = $cashFlow['outflows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outflow => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(ucfirst($outflow)); ?></td>
                                                <td><?php echo e(number_format($amount, 2)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><strong><?php echo e(__('Total Outflows')); ?></strong></td>
                                            <td><?php echo e(number_format(array_sum($cashFlow['outflows']), 2)); ?></td>
                                        </tr>

                                        <tr>
                                            <td><strong><?php echo e(__('Net Cash Flow')); ?></strong></td>
                                            <td><?php echo e(number_format(array_sum($cashFlow['inflows']) - array_sum($cashFlow['outflows']), 2)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Balance Sheet -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#balance-sheet">
                                <?php echo e(__('Balance Sheet')); ?>

                            </button>
                        </h2>
                        <div id="balance-sheet" class="accordion-collapse collapse">
                           <!-- Balance Sheet Section -->
<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#balance-sheet">
            <?php echo e(__('Balance Sheet Calculator')); ?>

        </button>
    </h2>
    <div id="balance-sheet" class="accordion-collapse collapse">
        <div class="accordion-body">
            <!-- Form for Adding Assets and Liabilities -->
            <form id="balanceSheetForm" method="POST" action="<?php echo e(route('reports.calculateBalanceSheet')); ?>">
    <?php echo csrf_field(); ?>
    <!-- Form fields for assets and liabilities -->
    <div class="mb-3">
        <h5><?php echo e(__('Assets')); ?></h5>
        <div id="assets-container">
            <?php if(isset($balanceSheet['assets']) && count($balanceSheet['assets']) > 0): ?>
                <?php $__currentLoopData = $balanceSheet['assets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="asset-item mb-2">
                        <input type="text" class="form-control mb-2" name="assets[<?php echo e($loop->index); ?>][name]" placeholder="Asset Name" value="<?php echo e($name); ?>" required>
                        <input type="number" class="form-control" name="assets[<?php echo e($loop->index); ?>][amount]" placeholder="Amount (Tsh)" value="<?php echo e($amount); ?>" required>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="asset-item mb-2">
                    <input type="text" class="form-control mb-2" name="assets[0][name]" placeholder="Asset Name" required>
                    <input type="number" class="form-control" name="assets[0][amount]" placeholder="Amount (Tsh)" required>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" class="btn btn-sm btn-success" onclick="addAssetField()">+ <?php echo e(__('Add Asset')); ?></button>
    </div>

    <div class="mb-3">
        <h5><?php echo e(__('Liabilities')); ?></h5>
        <div id="liabilities-container">
            <?php if(isset($balanceSheet['liabilities']) && count($balanceSheet['liabilities']) > 0): ?>
                <?php $__currentLoopData = $balanceSheet['liabilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="liability-item mb-2">
                        <input type="text" class="form-control mb-2" name="liabilities[<?php echo e($loop->index); ?>][name]" placeholder="Liability Name" value="<?php echo e($name); ?>" required>
                        <input type="number" class="form-control" name="liabilities[<?php echo e($loop->index); ?>][amount]" placeholder="Amount (Tsh)" value="<?php echo e($amount); ?>" required>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="liability-item mb-2">
                    <input type="text" class="form-control mb-2" name="liabilities[0][name]" placeholder="Liability Name" required>
                    <input type="number" class="form-control" name="liabilities[0][amount]" placeholder="Amount (Tsh)" required>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" class="btn btn-sm btn-success" onclick="addLiabilityField()">+ <?php echo e(__('Add Liability')); ?></button>
    </div>

    <button type="submit" class="btn btn-primary"><?php echo e(__('Calculate')); ?></button>
</form>

            <!-- Balance Sheet Table -->
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th><?php echo e(__('Category')); ?></th>
                        <th> <?php echo e(__('Amount')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong><?php echo e(__('Assets')); ?></strong></td>
                        <td></td>
                    </tr>
                    <?php if(isset($balanceSheet['assets']) && count($balanceSheet['assets']) > 0): ?>
                        <?php $__currentLoopData = $balanceSheet['assets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucfirst($asset)); ?></td>
                                <td><?php echo e(number_format($amount, 2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <tr>
                        <td><strong><?php echo e(__('Total Assets')); ?></strong></td>
                        <td><?php echo e(isset($balanceSheet['totalAssets']) ? number_format($balanceSheet['totalAssets'], 2) : '0.00'); ?></td>
                    </tr>

                    <tr>
                        <td><strong><?php echo e(__('Liabilities')); ?></strong></td>
                        <td></td>
                    </tr>
                    <?php if(isset($balanceSheet['liabilities']) && count($balanceSheet['liabilities']) > 0): ?>
                        <?php $__currentLoopData = $balanceSheet['liabilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liability => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucfirst($liability)); ?></td>
                                <td><?php echo e(number_format($amount, 2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <tr>
                        <td><strong><?php echo e(__('Total Liabilities')); ?></strong></td>
                        <td><?php echo e(isset($balanceSheet['totalLiabilities']) ? number_format($balanceSheet['totalLiabilities'], 2) : '0.00'); ?></td>
                    </tr>

                    <tr>
                        <td><strong><?php echo e(__('Equity')); ?></strong></td>
                        <td><?php echo e(isset($balanceSheet['equity']) ? number_format($balanceSheet['equity'], 2) : '0.00'); ?></td>
                    </tr>
                </tbody>
            </table>
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
                <h3 class="card-title"><?php echo e(__('AI-Driven Recommendations')); ?></h3>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="alert alert-info d-flex justify-content-between align-items-center">
                        <span><?php echo e($recommendation->recommendation); ?></span>
                       
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-secondary text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-lightbulb text-muted mx-auto">
                            <path d="M12 3v4"></path>
                            <path d="M12 13v8"></path>
                            <path d="M12 7.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                        </svg>
                        <p class="mt-2">No recommendations available at this time. Generate more data for insights!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Actionable Insights Section -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="card-title"><?php echo e(__('Actionable Insights')); ?></h3>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $actionableInsights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="alert alert-<?php echo e($insight['status']); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <span><strong><?php echo e($insight['message']); ?></strong></span>
    </div>
    <div class="mt-2">
        <p class="mb-0"><?php echo e($insight['details']); ?></p>
    </div>
</div>
        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-secondary text-center">
                        <p>No actionable insights available at this time.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
   

   

    <!-- Detailed Reports Section -->
    <div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="card-title"><?php echo e(__('Last 5 Days Detailed Reports')); ?></h3>
            </div>
            <div class="card-body">
                <!-- Last 5 Days' Reports Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th> <?php echo e(__('Sales')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th> <?php echo e(__('Expenses')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th> <?php echo e(__('Profit')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th><?php echo e(__('Products Sold')); ?>d</th>
                                <th><?php echo e(__('Type')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($report->created_at->format('Y-m-d')); ?></td>
                                    <td><?php echo e(isset($report->data['sales']) ? number_format($report->data['sales'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['expenses']) ? number_format($report->data['expenses'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['profit']) ? number_format($report->data['profit'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['products_sold']) ? $report->data['products_sold'] : 0); ?></td>
                                    <td><?php echo e(ucfirst($report->type)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-file-text text-muted mx-auto">
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h7.41"></path>
                                            <path d="M9 14L12 17l3-3"></path>
                                        </svg>
                                        <p class="mt-2">No detailed reports available for the last 5 days.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Date Search Form and Reports Table (Existing Code) -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="card-title"><?php echo e(__('Search Reports by Date')); ?></h3>
            </div>
            <div class="card-body">
                <!-- Date Search Form -->
                <form action="<?php echo e(route('reports.index')); ?>" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="date" class="form-label"><?php echo e(__('Select Date')); ?></label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo e(request('date')); ?>">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
                        </div>
                    </div>
                </form>

                <!-- Reports Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th> <?php echo e(__('Sales')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th> <?php echo e(__('Expenses')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th> <?php echo e(__('Profit')); ?>( <?php echo e(auth()->user()->account->currency); ?>)</th>
                                <th><?php echo e(__('Products Sold')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($report->created_at->format('Y-m-d')); ?></td>
                                    <td><?php echo e(isset($report->data['sales']) ? number_format($report->data['sales'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['expenses']) ? number_format($report->data['expenses'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['profit']) ? number_format($report->data['profit'], 2) : 'Tsh 0.00'); ?></td>
                                    <td><?php echo e(isset($report->data['products_sold']) ? $report->data['products_sold'] : 0); ?></td>
                                    <td><?php echo e(ucfirst($report->type)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-file-text text-muted mx-auto">
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h7.41"></path>
                                            <path d="M9 14L12 17l3-3"></path>
                                        </svg>
                                        <p class="mt-2">No detailed reports available for the selected date.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Chart.js Initialization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('reportChart').getContext('2d');
        const reportChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($chartLabels ?? [], 15, 512) ?>,
                datasets: [{
                    label: 'Sales',
                    data: <?php echo json_encode($chartData ?? [], 15, 512) ?>,
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

        // Handle report type change
        const reportTypeSelect = document.getElementById('report-type-select');
        reportTypeSelect.addEventListener('change', function () {
            const form = document.getElementById('report-type-form');
            form.submit();
        });
    });

    
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('yearlyComparisonChart').getContext('2d');
        const yearlyComparisonChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($yearlyLabels ?? [], 15, 512) ?>,
                datasets: [{
                    label: 'Sales',
                    data: <?php echo json_encode($yearlySales ?? [], 15, 512) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
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
    });

    function addBalanceSheetItem() {
        const assetName = document.getElementById('assetName').value;
        const assetAmount = parseFloat(document.getElementById('assetAmount').value);
        const liabilityName = document.getElementById('liabilityName').value;
        const liabilityAmount = parseFloat(document.getElementById('liabilityAmount').value);

        // Add logic to save the data (e.g., send to server via AJAX)
        console.log('Asset:', assetName, assetAmount);
        console.log('Liability:', liabilityName, liabilityAmount);

        // Close the modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('balanceSheetModal'));
        modal.hide();
    }

    function addBalanceSheetItem() {
        const assetName = document.getElementById('assetName').value;
        const assetAmount = parseFloat(document.getElementById('assetAmount').value);
        const liabilityName = document.getElementById('liabilityName').value;
        const liabilityAmount = parseFloat(document.getElementById('liabilityAmount').value);

        // Add logic to save the data (e.g., send to server via AJAX)
        console.log('Asset:', assetName, assetAmount);
        console.log('Liability:', liabilityName, liabilityAmount);

        // Close the modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('balanceSheetModal'));
        modal.hide();
    }

    let assetIndex = <?php echo e(isset($balanceSheet['assets']) ? count($balanceSheet['assets']) : 1); ?>;
    let liabilityIndex = <?php echo e(isset($balanceSheet['liabilities']) ? count($balanceSheet['liabilities']) : 1); ?>;

    function addAssetField() {
        const container = document.getElementById('assets-container');
        const newField = `
            <div class="asset-item mb-2">
                <input type="text" class="form-control mb-2" name="assets[${assetIndex}][name]" placeholder="Asset Name" required>
                <input type="number" class="form-control" name="assets[${assetIndex}][amount]" placeholder="Amount (Tsh)" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newField);
        assetIndex++;
    }

    function addLiabilityField() {
        const container = document.getElementById('liabilities-container');
        const newField = `
            <div class="liability-item mb-2">
                <input type="text" class="form-control mb-2" name="liabilities[${liabilityIndex}][name]" placeholder="Liability Name" required>
                <input type="number" class="form-control" name="liabilities[${liabilityIndex}][amount]" placeholder="Amount (Tsh)" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newField);
        liabilityIndex++;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/reports/index.blade.php ENDPATH**/ ?>