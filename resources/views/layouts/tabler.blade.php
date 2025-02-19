<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#2196f3">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
                                                    /* Loader-specific CSS */
                                                    .page-loader {
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        position: fixed;
                                                        top: 0;
                                                        left: 0;
                                                        width: 100%;
                                                        height: 100%;
                                                        background-color: white;
                                                        z-index: 9999;
                                                    }
                                                    .hidden {
                                                        display: none;
                                                    }
                                                </style>
                                                <!-- Page Loader -->
                                                <div id="page-loader" class="page-loader">
                                                <div class="text-center">
                                                    <div class="mb-3">
                                                        
                                                    </div>
                                                    <div class="text-secondary mb-3">Creating Environment.....</div>
                                                    <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-indeterminate"></div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- Scripts -->
                                               
                                                <script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById("page-loader");
        const content = document.getElementById("main-content");

        // Simulate loading delay
        setTimeout(() => {
            loader.classList.add("hidden"); // Hide loader
            content.classList.remove("hidden"); // Show main content

            // Reinitialize Tabler components
            if (window.Tabler) {
                Tabler.init();
            }
        }, 100); // Adjust delay as needed
    });
</script>

                                              
                                                
    <title>@yield('title')</title>

    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('static/icon.png') }}" rel="icon" />
        
                                            
    <!--Lord icons ---->
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <style>
        /* Default color for light mode */
        lord-icon {
            filter: invert(0); /* Black in light mode */
            vertical-align: middle; /* Align icon with text */
            margin-right: 8px; /* Space between icon and text */
        }

        /* Color for dark mode */
        @media (prefers-color-scheme: dark) {
        lord-icon {
            filter: invert(0); /* Black in dark mode */
        }
    }
    </style>



    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .form-control:focus {
            box-shadow: none;
        }
    </style>

    {{-- - Page Styles - --}}
    @stack('page-styles')
    @livewireStyles
</head>

<body>
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>

    <div class="page">
        <header class="navbar navbar-expand-md d-print-none ">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ url('/') }}">
    <img src="{{ asset('static/logo2.png') }}" alt="Alpha" class="navbar-brand-image" style="width: 50px; height: 50px; object-fit: cover;">
</a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">

                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
                               data-bs-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
                               data-bs-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                            </a>


                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- the notification panel -->
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                     <lord-icon
                    src="https://cdn.lordicon.com/lznlxwtc.json"
                    trigger="hover"
                    colors="primary:black"
                     style="width:20px;height:20px">
                    </lord-icon>
                  <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Last updates</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-secondary text-truncate mt-n1">
                              Change deprecated html tags to text decoration classes (#29604)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-secondary text-truncate mt-n1">
                              justify-content:between ⇒ justify-content:space-between (#29734)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 3</a>
                            <div class="d-block text-secondary text-truncate mt-n1">
                              Update change-version.js (#29736)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-secondary text-truncate mt-n1">
                              Regenerate package-lock.json (#29730)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
    <span class="avatar avatar-rounded shadow-none" style="background-image: url('{{ Auth::user()->photo ? asset('storage/profile/' . Auth::user()->photo) : asset('assets/img/illustrations/profiles/admin.jpg') }}'); background-size: cover; background-position: center; border-radius: 50%; width: 40px; height: 40px; display: inline-block;">
    </span>
    <div class="d-none d-xl-block ps-2">
        <div>{{ Auth::user()->name }}</div>
        <div class="mt-1 small text-muted">Admin</div>
    </div>
</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon dropdown-item-icon icon-tabler icon-tabler-settings" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                </svg>
                                Account
                            </a>
                            <a href="{{ route('price.route') }}" class="dropdown-item">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-up"><path stroke="none" d="M0 0h24v24H0z" 
                            fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M12.5 17h-6.5v-14h-2" /><path d="M6 5l14 1l-.854 5.977m-2.646 1.023h-10.5" />
                            <path d="M19 22v-6" /><path d="M22 19l-3 -3l-3 3" /></svg>
                                 Subscriptions
                            </a>
                        
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon dropdown-item-icon icon-tabler icon-tabler-logout" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                        <path d="M9 12h12l-3 -3" />
                                        <path d="M18 15l3 -3" />
                                    </svg>
                                    Logout
                                </button>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </header>

        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ request()->is('dashboard*') ? 'active' : null }}">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Dashboard') }}
                                    </span>
                                </a>
                            </li>


                            <li class="nav-item {{ request()->is('products*') ? 'active' : null }}">
                                <a class="nav-link" href="{{ route('products.index') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-packages" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z" />
                                            <path d="M2 13.5v5.5l5 3" />
                                            <path d="M7 16.545l5 -3.03" />
                                            <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z" />
                                            <path d="M12 19l5 3" />
                                            <path d="M17 16.5l5 -3" />
                                            <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5" />
                                            <path d="M7 5.03v5.455" />
                                            <path d="M12 8l5 -3" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Products') }}
                                    </span>
                                </a>
                            </li>


                            <li class="nav-item dropdown {{ request()->is('orders*') ? 'active' : null }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-package-export" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12v9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M15 18h7" />
                                            <path d="M19 15l3 3l-3 3" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Orders') }}
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('orders.index') }}">
                                                {{ __('All') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('orders.complete') }}">
                                                {{ __('Completed') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('orders.pending') }}">
                                                {{ __('Pending') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('due.index') }}">
                                                {{ __('Due') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item dropdown {{ request()->is('purchases*') ? 'active' : null }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-package-import" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12v9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M22 18h-7" />
                                            <path d="M18 15l-3 3l3 3" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Purchases') }}
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('purchases.index') }}">
                                                {{ __('All') }}
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('purchases.approvedPurchases') }}">
                                                {{ __('Approval') }}
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('purchases.purchaseReport') }}">
                                                {{ __('Daily Purchase Report') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li
                                class="nav-item dropdown {{ request()->is('suppliers*', 'customers*','debts*','expences*','stock*','budgets*','gamification*','quotations*') ? 'active' : null }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-layers-subtract" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8 4m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 16v2a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h2" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Pages') }}
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">

                                        <a class="dropdown-item" href="{{ route('quotations.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/rguiapej.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Quotations') }}
                                                     </a>

                                            <a class="dropdown-item" href="{{ route('suppliers.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/pbrgppbb.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Suppliers') }}
                                                     </a>
                                            <a class="dropdown-item" href="{{ route('customers.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/iazmohzf.json"
                                                        trigger="hover"
                                                            colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Customers') }}
                                                     </a>
                                            <a class="dropdown-item" href="{{ route('debts.index') }}">
                                            <lord-icon
                                                src="https://cdn.lordicon.com/xuyycdjx.json"
                                                trigger="morph"
                                                colors="primary:black"
                                                state="morph-card"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Debts') }}
                                                     </a>
                                           
                                                    <a class="dropdown-item" href="{{ route('expenses.index') }}">
                                                    <lord-icon
                                                      src="https://cdn.lordicon.com/gjjvytyq.json"
                                                    trigger="hover"
                                                    colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Expences') }}
                                                     </a>
                                                     <a class="dropdown-item" href="{{ route('budgets.index') }}">
                                                    <lord-icon
                                                    src="https://cdn.lordicon.com/ncitidvz.json"
                                                    trigger="hover"
                                                    colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Budgets') }}
                                                     </a>
                                                     
                                                   <a class="dropdown-item" href="{{ route('stock.transfer') }}">
                                                  <lord-icon
                                                       src="https://cdn.lordicon.com/qnpnzlkk.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Stock Transfer') }}
                                                     </a>

                                                     <a class="dropdown-item" href="{{ route('gamification.board') }}">
                                            <lord-icon
                                            src="https://cdn.lordicon.com/jyjslctx.json"
                                            trigger="morph"
                                            state="morph-pie-chart"
                                            colors="primary:black"
                                                          style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('RsmPlay') }}
                                                     </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                                            <!-- Reports -->
                    <!--@canany(['superadmin', 'admin'], auth()->user())--->
                    <!--@endcanany--->
                    <li class="nav-item {{ request()->is('reports*') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('reports.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-pie">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" />
                                    <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Reports') }}
                            </span>
                        </a>
                    </li>
                  

                     <!----FinAssist---->
                     
                    
                    <li class="nav-item {{ request()->is('finassist*') ? 'active' : null }}">
                                <a class="nav-link" href="{{ route('finassist') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                                        fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round" 
                                         stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bolt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 3l0 7l6 0l-8 11l0 -7l-6 0l8 -11" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('FinAssist') }}
                                    </span>
                                </a>
                            </li>
                    
                        <!---settings--->
                            <li
                                class="nav-item dropdown {{ request()->is('users*', 'categories*', 'units*' , 'team*') ? 'active' : null }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-settings" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ __('Settings') }}
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
{{--                                            --}}{{-- <a class="dropdown-item" href="{{ route('users.index') }}">--}}
{{--                                                    {{ __('Users') }}--}}
{{--                                                </a> --}}
                                            <a class="dropdown-item" href="{{ route('categories.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/jnikqyih.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Categories') }}
                                                     </a>
                                            <a class="dropdown-item" href="{{ route('units.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/jgnvfzqg.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Units') }}
                                                     </a>
                                                    
                                            <a class="dropdown-item" href="{{ route('admin.team.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/hrjifpbq.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Your Team') }}
                                                     </a>
                                                    

                                                     <a class="dropdown-item" href="{{ route('branches.index') }}">
                                            <lord-icon
                                                      src="https://cdn.lordicon.com/mjcariee.json"
                                                        trigger="hover"
                                                        colors="primary:black"
                                                      style="width:20px;height:20px">
                                                         </lord-icon>
                                                          {{ __('Set Branch') }}
                                                     </a>
                                        </div>
                                    
                                    </div>
                                </div>
                            </li>
                   
                       <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
    <form action="" method="get" autocomplete="off" novalidate>
        <div class="input-icon">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </span>
            <input type="text" name="search" id="search" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var search = $(this).val().toLowerCase();
            $('.page-wrapper *').each(function() {
                if ($(this).text().toLowerCase().indexOf(search) !== -1) {
                    $(this).addClass('highlight');
                } else {
                    $(this).removeClass('highlight');
                }
            });
        });
    });
</script>

<style>
    .highlight {
        background-color: yellow;
    }
</style>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <div>
                @yield('content')
                @yield('finassist')
                @yield('Debts')
                @yield('rsmplay')
                @yield('stocktrans')
                @yield('Damage')
                @yield('matumizi')
                @yield('budget')
                @yield('report')
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <!-- <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                        class="link-secondary" rel="noopener">Documentation</a></li> -->
                                <!-- <li class="list-inline-item"><a href="" class="link-secondary">License</a> -->
                                <!-- </li> -->
                                <!-- <li class="list-inline-item"><a href="https://github.com/tabler/tabler"
                                        target="_blank" class="link-secondary" rel="noopener">Source code</a></li> -->
                                <!-- <li class="list-inline-item"> -->
                                    <!-- <a href="https://github.com/sponsors/codecalm" target="_blank" -->
                                        <!-- class="link-secondary" rel="noopener"> -->
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon text-pink icon-filled icon-inline" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg> -->
                                        <!-- Sponsor -->
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; {{ now()->year }}
                                    <a href="." class="link-secondary">RomanStockManager</a>.
                                </li>
                                <!-- <li class="list-inline-item"> -->
                                    <!-- <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0
                                    </a> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<!--page loader starts --->
                                             
                                               

                                            <!--end of loader snip---
    <!-- Libs JS -->
    @stack('page-libraries')
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
    {{-- - Page Scripts - --}}
    @stack('page-scripts')

    @livewireScripts
</body>
</html>
