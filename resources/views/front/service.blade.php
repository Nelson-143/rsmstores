<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Our Services|Roman Stock Manager</title>
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- Config -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/config.css') }}">
    <!-- Libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/libs.css') }}">
    <!-- Template Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <!-- Responsive -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon.png') }}" sizes="32x32">
</head>
<body>
    <!-- Header -->
    <header id="bringer-header" class="is-frosted is-sticky" data-appear="fade-down" data-unload="fade-up">
        <!-- Desktop Header -->
        <div class="bringer-header-inner">
            <!-- Header Logo -->
          <!-- Desktop Header -->
          <div class="bringer-header-inner">
            <!-- Header Logo -->
            <div class="bringer-header-lp">
                <a href="./" class="bringer-logo">
                    <img src=" {{ asset('frontend/assets/img/logo.png') }}" alt="bringer." width="150px">
                </a>
            </div>
            <!-- Main Menu -->
            <div class="bringer-header-mp">
                <nav class="bringer-nav">
                <ul class="main-menu" data-stagger-appear="fade-down" data-stagger-delay="75">
                    <a href="{{ route('about_master.route') }}">HOME</a>
                        <li>
                            <a href="#">ABOUT RSM</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('habout.route') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('team.route') }}">Team Member</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <a href="{{ route('service.route') }} ">SERVICES</a>
                        </li>
                        <li>
                        <a href="{{ route('price.route') }}">PRICING</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.route') }} ">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Header Button -->
            <div class="bringer-header-rp">
                <a href="{{ route('login') }}" class="bringer-button">Login</a>
            </div>
            <div class="bringer-header-rp">
                <a href="{{ route('register') }}" class="bringer-button">SignUp</a>
            </div>
        </div>
        </div>
        </div>
        <!-- Mobile Header -->
        <div class="bringer-mobile-header-inner">
            <a href="./" class="bringer-logo">
                <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="bringer." width="88" height="24">
            </a>
            <a href="#" class="bringer-mobile-menu-toggler">
                <i class="bringer-menu-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </i>
            </a>
        </div>
    </header>

    <!-- Page Main -->
    <main id="bringer-main">
        <div class="stg-container">
            <!-- Section: Intro -->
            <section>
                <div class="stg-row stg-large-gap stg-tp-normal-gap stg-tp-column-reverse">
                    <div class="stg-col-6 stg-vertical-space-between" data-unload="fade-left">
                        <div class="stg-tp-bottom-gap">
                            <h1 class="bringer-page-title" data-split-appear="fade-up">Ignite Your Business ⚡with us!!</h1>
                            <p class="bringer-large-text bringer-tp-normal-text" data-appear="fade-right" data-delay="200">At Roman Stock Manager, we believe that efficient inventory management is the foundation for everything you do. It's the guiding light that attracts customers, builds loyalty, and drives growth.</p>
                        </div>
                        <div class="align-right" data-appear="fade-right">
                            <a href="{{ route('price.route') }}" class="bringer-icon-link">
                                <div class="bringer-icon-link-content">
                                    <h6>
                                        Unleash your
                                        <br>
                                        Business's potential
                                    </h6>
                                    <span class="bringer-label">Discover Price List</span>
                                </div>
                                <div class="bringer-icon-wrap">
                                    <i class="bringer-icon bringer-icon-explore"></i>
                                </div>
                            </a><!-- .bringer-icon-link -->
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-bottom-gap-l" data-appear="fade-left" data-unload="fade-right">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/bgg.jpg') }}" alt="Brainding" width="800" height="1200">
                    </div>
                </div>
            </section>

            <!-- Section: Details -->
            <section class="backlight-both">
                <!-- Section Title -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-7">
                        <h2 data-split-appear="fade-up" data-unload="fade-up">Make Big steps 🏃‍♀️ with a simple to use software, Learn more below 👇:</h2>
                    </div>
                    <div class="stg-col-5"></div>
                </div>
                <!-- Details 01 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-m-bottom-gap-l" data-unload="fade-left">
                    <div class="stg-col-3 stg-offset-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/inv.jpg') }}" alt="Branding 01" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-right" data-delay="100">
                        <span class="bringer-label">in romanstockmanager app</span>
                        <h4>Inventory Management 📦</h4>
                        <p>Accurate Tracking: Keep precise records of inventory to avoid stockouts and overstocking.
                            Automated Reordering: Automatically reorder items when stock is low.
                            Real-time Monitoring: Track inventory levels and movements in real-time.
                            Forecasting: Predict future inventory needs to better plan and manage stock.</p>
                    </div>
                </div>
                <!-- Details 02 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-tp-row-reverse stg-m-bottom-gap-l" data-unload="fade-right">
                    <div class="stg-col-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/mee.jpg') }}" alt="Branding 02" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-left" data-delay="100">
                        <span class="bringer-label">in romanstockmanager app</span>
                        <h4>Sales & Invoice Management 💸</h4>
                        <p>Sales Tracking: Manage sales orders and update inventory levels seamlessly.
                            Invoice Automation: Generate and send invoices automatically.
                                Payment Management: Track payments and outstanding invoices.
                            Sales Reports: Access detailed sales reports for performance analysis.</p>
                    </div>
                    <div class="stg-col-3"><!-- Empty Column --></div>
                </div>
                <!-- Details 03 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-m-bottom-gap-l" data-unload="fade-left">
                    <div class="stg-col-3 stg-offset-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/dep.jpg') }}" alt="Branding 03" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-right" data-delay="100">
                        <span class="bringer-label">in romanstockmanager app</span>
                        <h4>Customer Dept Control and Management 🧑‍💼</h4>
                        <p>Customer Database: Maintain comprehensive customer records.
                            Credit Control: Set and monitor customer credit limits.
                            Communication History: Track all interactions with customers.
                            Customer Support: Provide enhanced support with complete customer information.</p>
                    </div>
                </div>
                <!-- Details 04 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-tp-row-reverse stg-m-bottom-gap-l" data-unload="fade-right">
                    <div class="stg-col-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/hall.jpg') }}" alt="Branding 04" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-left" data-delay="100">
                        <span class="bringer-label">in romanstockmanager app</span>
                        <h4>Budget Management 💰</h4>
                        <p>Expense Tracking: Monitor all business expenses.
                            Budget Planning: Create and manage detailed budgets.
                            Financial Reports: Generate reports to assess financial health.
                        Cost Analysis: Identify inefficiencies and optimize spending.</p>
                    </div>
                    <div class="stg-col-3"><!-- Empty Column --></div>
                </div>
                <!-- Details 05 Row -->
                <div class="stg-row stg-valign-middle" data-unload="fade-left">
                    <div class="stg-col-3 stg-offset-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/web.jpg') }}" alt="Branding 05" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-right" data-delay="100">
                        <span class="bringer-label">craft to meet your ideas!🤗</span>
                        <h4>Website Creation 🌐</h4>
                        <p>E-commerce Integration: Set up an online store with inventory sync.
                            Customizable Templates: Create a professional website with ease.
                            SEO and Marketing: Improve website visibility and attract more visitors.</p>
                    </div>
                </div>
            </section>

            <!-- Section: Offer -->
            <section>
                <!-- Services Grid -->
                <div class="bringer-grid-3cols bringer-tp-grid-2cols bringer-tp-stretch-last-item" data-stagger-appear="fade-up" data-stagger-unload="fade-up">
                    <!-- Item 01 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>More than just visuals<span class="bringer-accent">.</span></h5>
                        <p>We build emotional connections that create loyal brand advocates.</p>
                    </div>
                    <!-- Item 02 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>Beyond just a logo design<span class="bringer-accent">.</span></h5>
                        <p>Beyond just designing a logo, we craft a story that captures hearts and minds.</p>
                    </div>
                    <!-- Item 03 -->
                    <div class="bringer-masked-block bringer-grid-more-masked">
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between is-accented bringer-masked-media">
                            <h5>A brand isn't just a name<span class="bringer-accent">.</span></h5>
                            <p class="bringer-large-text">It's a movement. 👉 Let Bringer ignite it.</p>
                        </div>
                        <div class="bringer-masked-content at-bottom-right">
                            <span class="bringer-square-button is-secondary">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </span>
                        </div>
                        <a href="{{ route('contact.route') }}"></a>
                    </div>
                </div>
            </section>

        </div><!-- .stg-container -->

         <!-- Footer -->
         <footer id="bringer-footer" data-appear="fade-up" data-unload="fade-down">
            <!-- Footer Widgets Area -->
            <div class="bringer-footer-widgets">
                <div class="stg-container">
                    <div class="stg-row" data-stagger-appear="fade-left" data-stagger-delay="100">
                        <div class="stg-col-5 stg-tp-col-12 stg-tp-bottom-gap-l">
                            <div class="bringer-info-widget">
                                <a href="./" class="bringer-logo footer-logo">
                                    <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="bringer." width="88" height="24">
                                </a>
                                <div class="bringer-info-description">We are a passionate team of developers and designers who believe in the power of creativity. We help creative people create a strong online presence that shows their work and tells a story.</div>
                                <span class="bringer-label">Follow us:</span>
                                <ul class="bringer-socials-list" data-stagger-appear="fade-up" data-stagger-delay="75">
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-facebook">
                                            <i></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-instagram">
                                            <i></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-x">
                                            <i></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-tiktok">
                                            <i></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-patreon">
                                            <i></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="stg-col-2 stg-tp-col-4 stg-m-col-4">
                            <div class="bringer-widget">
                                <h6>About Us</h6>
                                <div class="bringer-menu-widget">
                                    <ul>
                                        <li><a href="{{ route('habout.route') }}">About Us</a></li>
                                        <li><a href="{{ route('team.route') }}">Our Team</a></li>
                                        <li><a href="{{ route('about_master.route') }} ">Welcome</a></li>
                                        <li><a href="{{ route('contact.route') }}">Get in Touch</a></li>
                                    </ul>
                                </div>
                            </div><!-- .bringer-widget -->
                        </div>
                        <div class="stg-col-2 stg-tp-col-4 stg-m-col-4">
                            <div class="bringer-widget">
                                <h6>Resources</h6>
                                <div class="bringer-menu-widget">
                                    <ul>
                                        <li><a href="{{ route('price.route') }}">Pricing</a></li>
                                        <li><a href="{{ route('contact.route') }}">Contact Us</a></li>
                                        <li><a href="{{ route('service.route') }}">Our Services</a></li>
                                        <li><a href="{{ route('register') }}">Create Account</a></li>
                                    </ul>
                                </div>
                            </div><!-- .bringer-widget -->
                        </div>
                    </div><!-- .stg-row -->
                </div><!-- .stg-container -->
            </div><!-- .bringer-footer-widgets -->

            <!-- Footer Copyright Line -->
            <div class="bringer-footer-line stg-container">
                <div class="align-center">
                    Copyright &copy; 2024|crown&roman cooperation.
                </div>
            </div><!-- bringer-footer-line -->
        </footer>
	</main>

    <!-- Right Click Protection Block -->
    <div class="bringer-rcp-wrap">
        <div class="bringer-rcp-overlay"></div>
        <div class="bringer-rcp-container">
            <h2>#RomanStockManager🚧</h2>
        </div>
    </div>

    <!-- Dynamic Backlight -->
    <div class="bringer-backlight"></div>
 <!-- JS Scripts -->
 <script src="{{ asset('frontend/assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lib/libs.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/contact_form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/st-core.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/classes.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
   
</body>
</html>