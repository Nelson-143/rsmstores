<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#2196f3">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Roman Stock Manager</title>
        
        <meta name="msapplication-TileColor" content="#0054a6"/>
        <meta name="theme-color" content="#0054a6"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="MobileOptimized" content="320"/>
        <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon"/>
        <meta name="description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!"/>
        <meta name="canonical" content="https://tabler.io/demo/sign-in.html">
        <meta name="twitter:image:src" content="https://tabler.io/demo/static/og.png">
        <meta name="twitter:site" content="@tabler_ui">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
        <meta name="twitter:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
        <meta property="og:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
        <!-- CSS files -->
        <link href="<?php echo e(asset('dist/css/tabler.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('dist/css/tabler-flags.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('dist/css/tabler-payments.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('dist/css/tabler-vendors.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('dist/css/demo.min.css')); ?>" rel="stylesheet"/>
        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
        <?php echo $__env->yieldPushContent('page-styles'); ?>
    </head>
    <body class="d-flex flex-column">
        <script src="<?php echo e(asset('dist/js/demo-theme.min.js')); ?>"></script>

        <div class="page page-center">
            <div class="container container-tight py-4">
              <div class="text-center mb-4">
    <a href="<?php echo e(url('/')); ?>" class="navbar-brand navbar-brand-autodark">
        <img src="<?php echo e(asset('static/logo2.png')); ?>" style="width: 200px; height: auto;" alt="Tabler" class="navbar-brand-image">
    </a>
</div>

                <?php echo $__env->make('components.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(session('status')): ?>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <h3 class="mb-1">Success</h3>
                        <p><?php echo e(session('status')); ?></p>

                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="<?php echo e(asset('dist/js/tabler.min.js')); ?>" defer></script>
        <script src="<?php echo e(asset('dist/js/demo.min.js')); ?>" defer></script>
        <?php echo $__env->yieldPushContent('page-scripts'); ?>
    </body>
</html>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/layouts/auth.blade.php ENDPATH**/ ?>