<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Invoice</title>
    <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/invoice/css/bootstrap.min.css')); ?>">
    <link type="text/css" rel="stylesheet"
        href="<?php echo e(asset('assets/invoice/fonts/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/invoice/css/style.css')); ?>">
    <style>
        /* Small print styles */
        .small-print {
            font-size: 12px !important;
            padding: 10px !important;
        }

        .small-print .invoice-inner-9 {
            width: 100% !important;
            max-width: 400px !important; /* Adjust width for small print */
            margin: 0 auto !important;
        }

        .small-print .invoice-top,
        .small-print .invoice-info,
        .small-print .order-summary {
            padding: 5px !important;
        }

        .small-print .invoice-table th,
        .small-print .invoice-table td {
            padding: 5px !important;
            font-size: 12px !important;
        }

        .small-print .invoice-btn-section {
            display: none; /* Hide buttons in small print */
        }
    </style>
</head>

<body>
    <div class="invoice-16 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner-9" id="invoice_wrapper">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="logo">
                                        <h1><?php echo e(Str::title(auth()->user()->store_name)); ?></h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="invoice">
                                        <h1>
                                            Invoice # <span><?php echo e($order->invoice_no); ?></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-info">
                            <div class="row">
                                <div class="col-sm-6 mb-50">
                                    <div class="invoice-number">
                                        <h4 class="inv-title-1">
                                            Invoice date:
                                        </h4>
                                        <p class="invo-addr-1">
                                            <?php echo e($order->order_date); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-50">
                                    <h4 class="inv-title-1">Customer</h4>
                                    <p class="inv-from-1"><?php echo e($order->customer->name); ?></p>
                                    <p class="inv-from-1"><?php echo e($order->customer->phone); ?></p>
                                    <p class="inv-from-1"><?php echo e($order->customer->email); ?></p>
                                    <p class="inv-from-2"><?php echo e($order->customer->address); ?></p>
                                </div>
                                <?php
                                    $user = auth()->user();
                                ?>
                                <div class="col-sm-6 text-end mb-50">
                                    <h4 class="inv-title-1">Store</h4>
                                    <p class="inv-from-1"><?php echo e(Str::title($user->store_name)); ?></p>
                                    <p class="inv-from-1"><?php echo e($user->store_phone); ?></p>
                                    <p class="inv-from-1"><?php echo e($user->store_email); ?></p>
                                    <p class="inv-from-2"><?php echo e($user->store_address); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="order-summary">
                            <div class="table-outer ">
                                <table class="default-table invoice-table">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Item</th>
                                            <th class="align-middle text-center">Price</th>
                                            <th class="align-middle text-center">Quantity</th>
                                            <th class="align-middle text-center">Subtotal</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <?php echo e($item->product->name); ?>

                                                </td>
                                                <td class="align-middle text-center">
                                                    Tsh.<?php echo e(($item->unitcost)); ?>

                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php echo e($item->quantity); ?>

                                                </td>
                                                <td class="align-middle text-center">
                                                <?php echo e(auth()->user()->account->currency); ?><?php echo e(($item->total)); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td colspan="3" class="text-end">
                                                <strong>
                                                    Subtotal
                                                </strong>
                                            </td>
                                            <td class="align-middle text-center">
                                                <strong>
                                                <?php echo e(auth()->user()->account->currency); ?><?php echo e(($order->sub_total)); ?>

                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">
                                                <strong>Tax</strong>
                                            </td>
                                            <td class="align-middle text-center">
                                                <strong>
                                                <?php echo e(auth()->user()->account->currency); ?><?php echo e(($order->vat)); ?>

                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="align-middle text-center">
                                                <strong>
                                                <?php echo e(auth()->user()->account->currency); ?><?php echo e(($order->total)); ?>

                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i>
                            Print Invoice
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download">
                            <i class="fa fa-download"></i>
                            Download Invoice
                        </a>
                        <a id="small_print_btn" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i>
                            Small Print
                        </a>
                    </div>

                    
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-lg btn-print">
                            <i class="fa fa-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/invoice/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/invoice/js/jspdf.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/invoice/js/html2canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/invoice/js/app.js')); ?>"></script>
    <script>
        // Add event listener for the "Small Print" button
        document.getElementById('small_print_btn').addEventListener('click', function () {
            const invoiceWrapper = document.getElementById('invoice_wrapper');
            invoiceWrapper.classList.toggle('small-print');

            // Print the invoice after applying small print styles
            window.print();

            // Remove the small print class after printing
            setTimeout(() => {
                invoiceWrapper.classList.remove('small-print');
            }, 500);
        });
    </script>
</body>

</html>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/orders/print-invoice.blade.php ENDPATH**/ ?>