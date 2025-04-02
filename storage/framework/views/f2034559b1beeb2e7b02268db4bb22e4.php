<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Header Stats -->
    <div class="row mb-4">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <span class="bg-light rounded-circle p-3">
                            <i class="la la-<?php echo e($metric == 'total' ? 'users' : ($metric == 'active' ? 'user-check' : ($metric == 'new_today' ? 'user-plus' : ($metric == 'banned' ? 'user-slash' : ($metric == 'admins' ? 'user-tie' : 'user-clock'))))); ?> fa-2x text-primary"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 font-weight-bold"><?php echo e($value); ?></h3>
                    <p class="text-muted text-uppercase small"><?php echo e(str_replace('_', ' ', $metric)); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- System Health Panel -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="la la-server"></i> System Health
                        </div>
                        <a href="<?php echo e(route('admin.clear.cache')); ?>" class="btn btn-sm btn-light">
                            <i class="la la-broom"></i> Clear Cache
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- System Metrics -->
                        <?php $__currentLoopData = $system; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light p-3 mr-3">
                                    <i class="la la-<?php echo e($metric == 'cache_size' ? 'database' : ($metric == 'php_version' ? 'code' : ($metric == 'load_avg' ? 'tachometer-alt' : 'clock'))); ?> text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="text-uppercase text-muted small mb-0"><?php echo e(str_replace('_', ' ', $metric)); ?></h6>
                                    <h5 class="mb-0">
                                        <?php if($metric == 'load_avg' && ($value == 'N/A' || $value == '')): ?>
                                            <span class="text-muted">Not available</span>
                                        <?php elseif($metric == 'uptime' && ($value == 'N/A' || $value == '')): ?>
                                            <span class="text-muted">Not available</span>
                                        <?php else: ?>
                                            <?php echo e($value); ?>

                                        <?php endif; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <!-- Additional System Metrics -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="border-bottom pb-2">Extended Health Metrics</h5>
                        </div>
                        
                        <?php
                            // Fetch additional system health data
                            $healthData = app('App\Http\Controllers\Admin\DashboardController')->getSystemHealth();
                        ?>
                        
                        <?php $__currentLoopData = $healthData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-uppercase text-muted small"><?php echo e(str_replace('_', ' ', $metric)); ?></h6>
                                        <i class="la la-<?php echo e($metric == 'cpu_load' ? 'microchip' : ($metric == 'memory_usage' ? 'memory' : ($metric == 'disk_space' ? 'hdd' : ($metric == 'active_connections' ? 'plug' : 'calendar')))); ?> text-primary"></i>
                                    </div>
                                    <h5 class="mb-0"><?php echo e($value); ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Security & User Metrics Row -->
    <div class="row mb-4">
        <!-- Security Alerts Panel -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <i class="la la-shield-alt"></i> Security Alerts
                </div>
                <div class="card-body">
                    <?php if(isset($security['suspicious_ips']) && count($security['suspicious_ips']) > 0): ?>
                        <div class="alert alert-danger border-0 shadow-sm">
                            <h5><i class="la la-exclamation-triangle"></i> Suspicious Activity Detected!</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless">
                                    <thead>
                                        <tr>
                                            <th>IP Address</th>
                                            <th>Attempts</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $security['suspicious_ips']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><code><?php echo e($ip->ip_address); ?></code></td>
                                            <td><span class="badge badge-pill badge-danger"><?php echo e($ip->attempts); ?></span></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.ban.ip', $ip->ip_address)); ?>" class="btn btn-xs btn-danger">
                                                    <i class="la la-ban"></i> Ban IP
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-success border-0 shadow-sm">
                            <h5><i class="la la-check-circle"></i> No Suspicious Activity Detected</h5>
                            <p class="mb-0">Your system is currently not showing any unusual login patterns.</p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h1 class="display-4 mb-0 <?php echo e(isset($security['failed_logins']) && $security['failed_logins'] > 10 ? 'text-danger' : 'text-success'); ?>">
                                        <?php echo e(isset($security['failed_logins']) ? $security['failed_logins'] : '0'); ?>

                                    </h1>
                                    <p class="text-muted small">Failed Logins (24h)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h1 class="display-4 mb-0 <?php echo e(isset($security['suspicious_ips']) && count($security['suspicious_ips']) > 0 ? 'text-danger' : 'text-success'); ?>">
                                        <?php echo e(isset($security['suspicious_ips']) ? count($security['suspicious_ips']) : '0'); ?>

                                    </h1>
                                    <p class="text-muted small">Suspicious IPs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h1 class="display-4 mb-0">
                                        <?php echo e(isset($security['banned_ips']) ? $security['banned_ips'] : '0'); ?>

                                    </h1>
                                    <p class="text-muted small">Banned IPs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- User Growth Chart -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <i class="la la-chart-line"></i> User Growth (Last 7 Days)
                </div>
                <div class="card-body">
                    <?php
                        // Generate user growth data for the chart
                        $dates = [];
                        $userData = [];
                        
                        for($i = 6; $i >= 0; $i--) {
                            $date = \Carbon\Carbon::now()->subDays($i)->format('M d');
                            $dates[] = $date;
                            
                            // Get actual user count or generate sample data if none
                            $count = \App\Models\User::whereDate('created_at', \Carbon\Carbon::now()->subDays($i)->toDateString())->count();
                            $userData[] = $count;
                        }
                    ?>
                    
                    <canvas id="userGrowthChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <!-- Failed Login Chart -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-warning text-white">
                    <i class="la la-exclamation-triangle"></i> Failed Login Attempts (Last 24 Hours)
                </div>
                <div class="card-body">
                    <?php
                        // Generate hourly failed login data
                        $hours = [];
                        $loginData = [];
                        
                        for($i = 23; $i >= 0; $i--) {
                            $hour = $i == 0 ? 'Now' : $i . 'h ago';
                            $hours[] = $hour;
                            
                            // Get actual data or generate sample
                            $count = DB::table('failed_login_attempts')
                                ->where('created_at', '>=', now()->subHours($i + 1))
                                ->where('created_at', '<', now()->subHours($i))
                                ->count();
                                
                            $loginData[] = $count;
                        }
                    ?>
                    
                    <canvas id="securityChart" height="250"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Database Size Chart -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <i class="la la-database"></i> Database Storage
                </div>
                <div class="card-body">
                    <?php
                        // Prepare database size data
                        $dbTables = [];
                        $dbSizes = [];
                        
                        if(isset($database['size']) && !empty($database['size'])) {
                            foreach(array_slice($database['size'], 0, 5) as $table) {
                                $dbTables[] = $table->table;
                                $dbSizes[] = $table->size_mb;
                            }
                        } else {
                            // Sample data if no database information is available
                            $dbTables = ['users', 'sessions', 'activity_log', 'failed_logins', 'settings'];
                            $dbSizes = [2.5, 1.8, 3.2, 0.7, 0.3];
                        }
                    ?>
                    
                    <canvas id="databaseChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Panel -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="la la-history"></i> Recent Activity
                        </div>
                        <div>
                            <input type="text" id="activity-search" class="form-control form-control-sm" placeholder="Search activities...">
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover" id="activity-table">
                            <thead class="thead-light">
                                <tr>
                                    <th><i class="la la-clock"></i> Time</th>
                                    <th><i class="la la-user"></i> User</th>
                                    <th><i class="la la-globe"></i> IP</th>
                                    <th><i class="la la-cog"></i> Action</th>
                                    <th><i class="la la-info-circle"></i> Details</th>
                                    <th><i class="la la-cogs"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $activityLogs = DB::table('activity_log')->latest()->take(15)->get();
                                ?>
                                
                                <?php if(count($activityLogs) > 0): ?>
                                    <?php $__currentLoopData = $activityLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e(isset($log->event) && $log->event == 'failed_login' ? 'table-danger' : ''); ?>">
                                        <td>
                                            <span data-toggle="tooltip" title="<?php echo e(date('Y-m-d H:i:s', strtotime($log->created_at))); ?>">
                                                <?php echo e(\Carbon\Carbon::parse($log->created_at)->diffForHumans()); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if(property_exists($log, 'user_id') && $log->user_id): ?>
                                                <span class="badge badge-info">
                                                    <?php echo e(\App\Models\User::find($log->user_id)->name ?? 'Deleted User'); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary">Guest</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(isset($log->properties) && property_exists($log->properties, 'ip_address')): ?>
                                                <code><?php echo e($log->properties->ip_address); ?></code>
                                            <?php else: ?>
                                                <span class="text-muted">—</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php echo e(isset($log->event) && $log->event == 'failed_login' ? 'danger' : (isset($log->event) && $log->event == 'login' ? 'success' : 'primary')); ?>">
                                                <?php echo e($log->event ?? 'activity'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" title="<?php echo e($log->description ?? ''); ?>">
                                                <?php echo e(\Illuminate\Support\Str::limit($log->description ?? 'No description', 50)); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <?php if(property_exists($log, 'user_id') && $log->user_id): ?>
                                                    <a href="<?php echo e(route('admin.block.user', $log->user_id)); ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Block User">
                                                        <i class="la la-user-slash"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($log->properties) && property_exists($log->properties, 'ip_address')): ?>
                                                    <a href="<?php echo e(route('admin.ban.ip', $log->properties->ip_address)); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Ban IP">
                                                        <i class="la la-ban"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <i class="la la-info-circle text-muted"></i> No activity logs found
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-primary">View All Activity</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after_styles'); ?>
<style>
    .metric-card {
        padding: 1.5rem;
        transition: all 0.3s;
    }
    
    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.03);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after_scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Activity table search
        $("#activity-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#activity-table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    // User Growth Chart
    new Chart(document.getElementById('userGrowthChart'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'New Users',
                data: <?php echo json_encode($userData); ?>,
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: '#28a745',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Daily New User Registrations'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Database Size Chart
    new Chart(document.getElementById('databaseChart'), {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($dbTables); ?>,
            datasets: [{
                data: <?php echo json_encode($dbSizes); ?>,
                backgroundColor: [
                    '#4dc9f6', '#f67019', '#f53794', '#537bc4', '#acc236', 
                    '#166a8f', '#00a950', '#58595b', '#8549ba', '#8549ba'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Database Table Sizes (MB)'
                }
            }
        }
    });
    
    // Security Chart - Failed Login Attempts
    new Chart(document.getElementById('securityChart'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($hours); ?>,
            datasets: [{
                label: 'Failed Login Attempts',
                data: <?php echo json_encode($loginData); ?>,
                backgroundColor: 'rgba(220, 53, 69, 0.5)',
                borderColor: '#dc3545',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Hourly Failed Login Attempts (Last 24h)'
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/vendor/backpack/ui/dashboard.blade.php ENDPATH**/ ?>