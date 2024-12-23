<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>About us | Roman Stock Manager</title>

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
            <!-- Section: Page Title -->
            <section class="backlight-bottom">
                <div class="stg-row">
                    <div class="stg-col-6 stg-offset-3 align-center stg-tp-col-10 stg-tp-offset-1">
                        <h1 class="bringer-page-title" data-appear="fade-up" data-unload="fade-up">About Us</h1>
                        <p class="bringer-large-text" data-split-appear="fade-up" data-split-unload="fade-up" data-delay="100">We are a passionate team of Roman Stock Manager ,we are ready to take your Business to the next level💪. Join us and increase your Business Growth⚡.</p>
                    </div>
                </div>
            </section>

            <!-- Section: About Us -->
            <section class="divider-bottom">
                <div class="bringer-parallax-media stg-bottom-gap-l" data-appear="fade-up" data-delay="200" data-unload="fade-up">
                    <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/vee.png') }}" alt="About Bringer" width="1920" height="960">
                </div>
                <div class="stg-row stg-large-gap stg-tp-normal-gap">
                    <div class="stg-col-6 stg-vertical-space-between stg-tp-bottom-gap-l" data-unload="fade-left">
                        <h2 data-split-appear="fade-up">Improve operational efficiency 📊, and drive growth and profitability 📈💰.</h2>
                        <div class="align-right" data-appear="fade-right">
                            <a href="{{ route('team.route') }}" class="bringer-icon-link">
                                <div class="bringer-icon-link-content">
                                    <h6>
                                        Unleash your
                                        <br>
                                        Business's potential us
                                    </h6>
                                    <span class="bringer-label">Explore our work</span>
                                </div>
                                <div class="bringer-icon-wrap">
                                    <i class="bringer-icon bringer-icon-explore"></i>
                                </div>
                            </a><!-- .bringer-icon-link -->
                        </div>
                    </div>
                    <div class="stg-col-6" data-appear="fade-left" data-unload="fade-right" data-delay="100">
                        <p class="bringer-large-text">We help creative agencies, designers, and other creative people to connect with potential clients.</p>
                        <p>We're not just creatives; we're brand-whisperers, storytellers, and digital alchemists. We take your vision, infuse it with our spark, and craft unforgettable experiences that ignite imaginations and leave audiences begging for more. At Bringer, we don't just build brands, we build movements.</p>
                        <p>We are a team of passionate and experienced designers, developers, and marketers who specialize in helping businesses of all sizes achieve their goals. We believe that creativity is the key to success, and we are committed to helping our clients unleash their full potential.</p>
                        <p>We believe in the power of creativity. We help creative professionals create a strong online presence that showcases their work and tells their story.</p>
                    </div>
                </div>
            </section>

            <!-- Section: Team -->
            <section>
                <!-- Section Title -->
                <div class="stg-row bringer-section-title">
                    <div class="stg-col-8 stg-offset-2 stg-tp-col-10 stg-tp-offset-1">
                        <div class="align-center">
                            <h2 data-appear="fade-up" data-unload="fade-up">Meet the Team</h2>
                            <p class="bringer-large-text" data-split-appear="fade-up" data-split-unload="fade-up" data-delay="100">We are a team of passionate and experienced designers, developers, and marketers who specialize in helping businesses achieve their goals.</p>
                        </div>
                    </div>
                </div>
                <!-- Team Carousel -->
                <div class="swiper bringer-carousel" data-appear="fade-up" data-delay="200" data-tp-centered="0" data-unload="fade-up">
                    <div class="swiper-wrapper">
                        <!-- Carousel Item -->
                        <div class="bringer-block bringer-carousel-card swiper-slide">
                            <div class="bringer-carousel-card-image">
                                <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/team/well.jpg') }}" alt="Elizabeth Riley" width="600" height="900">
                            </div>
                            <div class="bringer-carousel-card-footer">
                                <div class="bringer-carousel-card-title">
                                    <span class="bringer-meta">Director</span>
                                    <h6>Welason Nelson</h6>
                                </div>
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('team.route') }}"></a>                        </div><!-- .bringer-carousel-card -->
                        <!-- Carousel Item -->
                        <div class="bringer-block bringer-carousel-card swiper-slide">
                            <div class="bringer-carousel-card-image">
                                <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/team/brr.jpg') }}" alt="John Belrose" width="600" height="900">
                            </div>
                            <div class="bringer-carousel-card-footer">
                                <div class="bringer-carousel-card-title">
                                    <span class="bringer-meta">Manager</span>
                                    <h6>Brown Enock</h6>
                                </div>
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('team.route') }}"></a>
                        </div><!-- .bringer-carousel-card -->
                        <!-- Carousel Item -->
                        <div class="bringer-block bringer-carousel-card swiper-slide">
                            <div class="bringer-carousel-card-image">
                                <img class="bringer-lazy" src="{{ asset('frontend/assetsimg/null.png/') }}" data-src="{{ asset('frontend/assets/img/team/prr.jpg') }}" alt="Sonya Altena" width="600" height="900">                            </div>
                            <div class="bringer-carousel-card-footer">
                                <div class="bringer-carousel-card-title">
                                    <span class="bringer-meta">Customer Relationship Manager</span>
                                    <h6>Prisca </h6>
                                </div>
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('team.route') }}"></a>
                        </div><!-- .bringer-carousel-card -->
                        <!-- Carousel Item -->
                        <div class="bringer-block bringer-carousel-card swiper-slide">
                            <div class="bringer-carousel-card-image">
                                <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/team/vii.jpg') }}" alt="Nikolas Rome" width="600" height="900">
                            </div>
                            <div class="bringer-carousel-card-footer">
                                <div class="bringer-carousel-card-title">
                                    <span class="bringer-meta">Marketing Manager</span>
                                    <h6>Lake Victoria</h6>
                                </div>
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('team.route') }}"></a>
                        </div><!-- .bringer-carousel-card -->
                        <!-- Carousel Item -->
                        <div class="bringer-block bringer-carousel-card swiper-slide">
                            <div class="bringer-carousel-card-image">
                                <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/team/wii.jpg') }}" alt="Candy Tittensor" width="600" height="900">
                            </div>
                            <div class="bringer-carousel-card-footer">
                                <div class="bringer-carousel-card-title">
                                    <span class="bringer-meta">Consumer Consultant</span>
                                    <h6>Kashinde Winner</h6>
                                </div>
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('team.route') }}"></a>
                        </div><!-- .bringer-carousel-card -->
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination bringer-dots"></div>
                </div><!-- .bringer-carousel -->
            </section>

            <!-- Section: Our Story -->
            <section class="backlight-top">
                <div class="stg-row stg-large-gap stg-m-normal-gap">
                    <div class="stg-col-6 stg-tp-bottom-gap-l stg-m-bottom-gap" data-appear="fade-right" data-unload="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/home/ddd.jpg') }}" alt="Our Story" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-vertical-space-between" data-appear="fade-left" data-unload="fade-right">
                        <div>
                            <h2>Always Stay ahead of the game with Rsm</h2>
                            <p class="bringer-large-text">ultimately driving growth and success in today’s competitive market</p>
                            <p>In a world where efficiency and accuracy are paramount, Roman Stock Manager is your trusted partner in business. Experience the benefits of real-time tracking, enhanced accuracy, comprehensive reporting, and improved customer satisfaction.</p>
                        </div>
                        <a href="{{ route('contact.route') }} " class="bringer-icon-link">
                            <div class="bringer-icon-wrap">
                                <i class="bringer-icon bringer-icon-explore"></i>
                            </div>
                            <div class="bringer-icon-link-content">
                                <h6>
                                    Join the
                                    <br>
                                    Movement
                                </h6>
                                <span class="bringer-label">Tell your story</span>
                            </div>
                        </a><!-- .bringer-icon-link -->
                    </div>
                </div>
            </section>

            <!-- Section: Services -->
            <section class="backlight-bottom divider-top">
                <!-- Section Intro -->
                <div class="stg-row stg-large-gap stg-bottom-gap-l">
                    <div class="stg-col-6 stg-tp-col-8 stg-tp-bottom-gap-l" data-unload="fade-left">
                        <h2 data-split-appear="fade-up">Unleashing the full spectrum of magic with your business website🌍</h2>
                    </div>
                    <div class="stg-col-6 stg-tp-col-9 stg-tp-offset-3" data-unload="fade-right">
                        <p class="bringer-large-text" data-split-appear="fade-up" data-delay="100"> Revolutionizing Business Operations with Comprehensive Inventory Solutions and Robust Website.</p>
                        <p data-appear="fade-up" data-delay="200">Roman Stock Manager revolutionizes business operations by not only providing cutting-edge inventory management solutions but also by creating robust, user-friendly websites tailored to enhance your online presence and streamline e-commerce operations. Our integrated approach ensures that your business runs efficiently, from precise inventory tracking to seamless online transactions, giving you the competitive edge needed in today's market.</p>
                    </div>
                </div>
               

                <!-- Services List -->
                <div class="bringer-detailed-list-wrap" data-appear="fade-up" data-unload="fade-up" data-delay="200">
                    <ul class="bringer-detailed-list">
                        <li>
                            <div class="bringer-detailed-list-title">
                                <h4>Inventory management<span class="bringer-accent">.</span></h4>
                            </div>
                            <div class="bringer-detailed-list-description">
                                <p>We weave visual stories and craft strategic messaging that resonate at heartstrings, build unwavering trust, and turn customers into fervent brand champions. Imagine seeing your logo come alive, not just a symbol but a rallying cry, an unwavering beacon in a sea of sameness. That's the power of branding we unleash.</p>
                            </div>
                            <div class="bringer-detailed-list-button">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('service.route') }}"></a>
                        </li>
                        <li>
                            <div class="bringer-detailed-list-title">
                                <h4>Sales &amp;Invoice management <span class="bringer-accent">.</span></h4>
                            </div>
                            <div class="bringer-detailed-list-description">
                                <p>We design data-driven campaigns that crackle with energy, ignite engagement like wildfire, and turn clicks into conversions. Picture social media abuzz with your brand, blog posts sparking curiosity, and targeted ads finding their perfect match. We're the storm that propels your brand to ever-higher heights.</p>
                            </div>
                            <div class="bringer-detailed-list-button">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('service.route') }}"></a>
                        </li>
                        <li>
                            <div class="bringer-detailed-list-title">
                                <h4>Customer Dept control and management <span class="bringer-accent">.</span></h4>
                            </div>
                            <div class="bringer-detailed-list-description">
                                <p>We craft visual masterpieces that sing your brand's story in vibrant colors and captivating shapes. From logos that lodge in minds to infographics that make complex ideas sing, we inject emotional punch and crystal-clear clarity into every pixel. Let your visuals become the unforgettable face of your brand.</p>
                            </div>
                            <div class="bringer-detailed-list-button">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('service.route') }}"></a>
                        </li>
                        <li>
                            <div class="bringer-detailed-list-title">
                                <h4>Budjet management<span class="bringer-accent">.</span></h4>
                            </div>
                            <div class="bringer-detailed-list-description">
                                <p>We sculpt user-friendly websites that convert visitors into loyal devotees, seamlessly blending stunning aesthetics with intuitive navigation and flawless experiences for every screen. Imagine your website as a warm, inviting space where potential customers linger, explore, and ultimately succumb to its charms. We craft that digital haven.</p>
                            </div>
                            <div class="bringer-detailed-list-button">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('service.route') }}"></a>
                        </li>
                        <li>
                            <div class="bringer-detailed-list-title">
                                <h4>Website Creation<span class="bringer-accent">.</span></h4>
                            </div>
                            <div class="bringer-detailed-list-description">
                                <p>We weave compelling narratives into blog posts, website copy, and social media content that resonate with your audience like a well-loved symphony. Picture search engines whispering your brand's name, and customers sharing your story with eager ears. We craft the voice that makes your brand sing.</p>
                            </div>
                            <div class="bringer-detailed-list-button">
                                <span class="bringer-icon bringer-icon-explore"></span>
                            </div>
                            <a href="{{ route('service.route') }}"></a>
                        </li>
                    </ul>
                </div>
                <div class="align-center stg-top-gap-l" data-appear="fade-up" data-unload="fade-up">
                    <a href="{{ route('service.route') }}" class="bringer-button">Explore All Services</a>
                </div>
            </section>

            <!-- Section: Our Passion -->
            <section>
                <div class="align-center stg-bottom-gap-l">
                    <h2 data-split-appear="fade-up" data-unload="fade-up">The fire that fuels our passion.</h2>
                    <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">At Roman Stock Manager, we believe in the power of:</p>
                </div>

                <div class="bringer-grid-2cols" data-stagger-appear="zoom-in" data-delay="150" data-unload="fade-up">
                    <!-- Icon Box Icon -->
                    <div class="bringer-icon-box bringer-block">
                        <h4>Creativity<span class="bringer-accent">.</span></h4>
                        <p class="bringer-large-text">We dare to dream big and push boundaries, never settling for the ordinary.</p>
                        <div class="bringer-box-icon">
                            <i class="bringer-icon bringer-icon-creativity"></i>
                        </div>
                    </div><!-- .bringer-block -->
                    <!-- Icon Box Icon -->
                    <div class="bringer-icon-box bringer-block">
                        <h4>Collaboration<span class="bringer-accent">.</span></h4>
                        <p class="bringer-large-text">We thrive on diverse perspectives and believe in the magic of working together.</p>
                        <div class="bringer-box-icon">
                            <i class="bringer-icon bringer-icon-collab"></i>
                        </div>
                    </div><!-- .bringer-block -->
                    <!-- Icon Box Icon -->
                    <div class="bringer-icon-box bringer-block">
                        <h4>Impact<span class="bringer-accent">.</span></h4>
                        <p class="bringer-large-text">We're driven by a desire to make a difference, to create brands that move mountains.</p>
                        <div class="bringer-box-icon">
                            <i class="bringer-icon bringer-icon-impact"></i>
                        </div>
                    </div><!-- .bringer-block -->
                    <!-- Icon Box Icon -->
                    <div class="bringer-icon-box bringer-block">
                        <h4>Innovation<span class="bringer-accent">.</span></h4>
                        <p class="bringer-large-text">We stay ahead of the curve, embracing new technologies &amp; trends to keep your brand on top.</p>
                        <div class="bringer-box-icon">
                            <i class="bringer-icon bringer-icon-innovation"></i>
                        </div>
                    </div><!-- .bringer-block -->
                </div><!-- .bringer-grid -->
            </section>

            <!-- Section: Grid CTA -->
            <section class="backlight-top">
                <div class="bringer-bento-grid bringer-grid-cta">
                    <div class="is-large bringer-masked-block" data-appear="fade-right" data-unload="fade-left">
                        <div class="bringer-grid-cta-media bringer-masked-media" data-bg-src="{{ asset('frontend/assets/img/home/sto.jpg') }}">
                            <div class="bringer-grid-cta-heading">Take your Inventory to the next level 💪</div>
                        </div>
                        <div class="bringer-masked-content at-bottom-right">
                            <p class="bringer-large-text" data-appear="fade-right" data-delay="100">Connect🔗to our Team!! &rarr;</p>
                        </div>
                    </div>
                    <div class="is-medium bringer-block" data-appear="fade-down" data-unload="fade-right">
                        <h3>Become Unstopable with our supercharge ⚡ system.</h3>
                    </div>
                    <div class="is-small" data-appear="zoom-out" data-delay="100" data-unload="zoom-out">
                        <a href="{{ route('contact.route') }}" class="bringer-square-button">
                            <span class="bringer-icon bringer-icon-explore"></span>
                        </a>
                    </div>
                    <div class="is-small" data-appear="zoom-out" data-delay="200" data-unload="zoom-out">
                        <img src="{{ asset('frontend/assets/img/home/cds.jpg') }}" alt="Let's Chat" width="960" height="960">
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