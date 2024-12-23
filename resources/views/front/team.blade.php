<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Team|Roman Stock Manager</title>

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
            <section>
                <!-- Block: Page Title -->
                <div class="bringer-bento-grid stg-bottom-gap-l">
                    <div class="is-large" data-appear="fade-right" data-unload="fade-left">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/nell.jpg') }}" alt="Cookie Dough" width="1200" height="1200">
                    </div>
                    <div class="is-medium bringer-block stg-vertical-space-between" data-appear="fade-down" data-delat="100" data-unload="fade-right">
                        <h1>Roman✨</h1>
                        <p class="bringer-large-text">Welason Nelson:
                        "As the Director at Roman Stock Manager, I'm committed to steering our company towards innovation and excellence in inventory management solutions. Our goal is to empower businesses with cutting-edge tools that optimize efficiency and drive growth."</p>
                    </div>
                    <div class="is-small bringer-block" data-appear="fade-up" data-delat="100" data-unload="fade-left">
                        <ul class="bringer-meta-list">
                            <p>I'm Brown Enock, the Manager at Roman Stock Manager. My role is to ensure seamless operations and client satisfaction. We're dedicated to providing robust inventory software that meets your specific needs, helping you achieve operational excellence.</p>
                        </ul>
                    </div>
                    <div class="is-small" data-appear="fade-left" data-delat="200" data-unload="fade-right">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/brr.png') }}" alt="Cookie Dough" width="960" height="960">
                    </div>
                </div>

                <!-- Block: The Challenge -->
                <div class="stg-row stg-bottom-gap-l stg-tp-column-reverse">
                    <div class="stg-col-8 bringer-block stg-vertical-space-between" data-appear="fade-right" data-unload="fade-left">
                        <h2>#BusinessManagement Made Easy</h2>
                        <div>
                            <p>Welcome! I'm Prisca, your Customer Relationship Manager at Roman Stock Manager, where we excel in making business management easy. Our commitment is to foster strong partnerships with our clients, ensuring that every interaction with our software enhances your operational efficiency and business success. Whether you're exploring our features for the first time or seeking ongoing support, I'm here to provide personalized guidance and solutions. Let's streamline your inventory management journey and achieve your business goals together! </p>
                        </div>
                    </div>
                    <div class="stg-col-4 stg-tp-bottom-gap" data-appear="fade-left" data-unload="fade-right">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/prr.jpg') }}" alt="Cookie Dough" width="960" height="960">
                    </div>
                </div>

                <!-- Block: Our Approach -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-4 stg-tp-bottom-gap" data-appear="fade-right" data-unload="fade-left">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/vii.jpg') }}" alt="Cookie Dough" width="960" height="960">
                    </div>
                    <div class="stg-col-8 bringer-block stg-vertical-space-between" data-appear="fade-left" data-unload="fade-right">
                        <h2>Free mind ,no more stress!!</h2>
                        <div>
                            <p>Hello there! I'm Victoria, the Marketing Manager at Roman Stock Manager, where we champion a 'Free Mind, No More Stress!' approach to inventory management. Our team is dedicated to showcasing how our innovative software simplifies your business operations and eliminates the complexities that cause unnecessary stress. We're here to empower you with the tools and insights needed to achieve clarity and efficiency in managing your inventory. Let's collaborate to elevate your business to new heights, stress-free!</p>
                        </div>
                    </div>
                </div>

                <!-- Block: The Solution -->
                <div class="bringer-bento-grid stg-bottom-gap-l">
                    <div class="is-large stg-vertical-space-between bringer-block stg-large-gap" data-bg-src="{{ asset('frontend/assets/img/portfolio/wii.jpg') }}" data-appear="fade-right" data-unload="fade-left">
                        <h2> Just Rsm 🏆</h2>
                    </div>
                    <div class="is-medium bringer-block stg-valign-middle" data-appear="fade-left" data-delay="100" data-unload="fade-right">
                        <ul class="bringer-marked-list">
                            <li>Inventory Accuracy: Ensuring accurate inventory counts and reducing discrepancies between physical stock and recorded quantities</li>
                            <li>Forecasting and Demand Planning: Predicting demand trends and planning inventory levels accordingly to minimize stockouts and reduce carrying costs</li>
                            <li>Reduction of Manual Errors: Minimizing human errors in data entry and inventory management processes through automation. </li>
                        </ul>
                    </div>
                    <div class="is-small" data-appear="fade-up" data-delay="100" data-unload="fade-left">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/boo.jpg') }}" alt="Cookie Dough" width="960" height="960">
                    </div>
                    <div class="is-small" data-appear="fade-up" data-delay="200" data-unload="fade-right">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/portfolio/aoo.jpg') }}" alt="Cookie Dough" width="960" height="960">
                    </div>
                </div>

                <!-- Block: Results & Impact -->                <div class="stg-row">
                    <div class="stg-col-8 bringer-block stg-vertical-space-between stg-tp-bottom-gap" data-appear="fade-right" data-unload="fade-left">
                        <h2>Experience Growth 🌱 </h2>
                        <div>
                            <p>Hello, I'm Kashinde, your Consumer Consultant at Roman Stock Manager. I specialize in guiding businesses through the intricacies of inventory management, sales budget systems, and user experience (UX). At Roman, we prioritize your growth by ensuring our software is not only efficient but also secure. Our comprehensive approach to inventory management allows you to streamline operations, optimize sales strategies, and maintain a clear budgetary overview. I'm here to support you every step of the way, ensuring your experience with Roman Stock Manager is productive and rewarding. Let's embark on this journey to enhance your business's efficiency and profitability together!</p>
                        </div>
                    </div>
                    <div class="stg-col-4" data-appear="fade-left" data-unload="fade-right">
                        <img class="bringer-lazy" src="{{ asset('frontend/assetsimg/null.png/') }}" data-src="{{ asset('frontend/assets/img/portfolio/oww.jpg') }}" alt="Cookie Dough" width="960" height="960">                    </div>                </div>
            </section>

            <!-- Section: Next Post -->
            <section class="divider-top" data-appear="fade-up">
                <div class="align-center" data-unload="zoom-in">
                    <a href="{{ route('contact.route') }}" class="bringer-icon-link bringer-next-post">
                        <div class="bringer-icon-link-content">
                            <h6>Made Easy for you.</h6>
                            <h2>Connect🔗With Us</h2>
                        </div>
                        <div class="bringer-icon-wrap">
                              <i class="bringer-icon bringer-icon-explore"></i>
                        </div>
                    </a><!-- .bringer-icon-link -->
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