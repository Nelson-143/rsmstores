<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
<title> Welcome|Roman Stock Manager</title>

    <!-- Google Fonts -->
    <!-- Config -->
    <link type="text/css" rel="stylesheet" href=" {{ asset('frontend/assets/css/config.css') }}">
    <!-- Libraries -->
    <link type="text/css" rel="stylesheet" href=" {{ asset('frontend/assets/css/libs.css') }}">
    <!-- Template Styles -->
    <link type="text/css" rel="stylesheet" href=" {{ asset('frontend/assets/css/style.css') }}">
    <!-- Responsive -->
    <link type="text/css" rel="stylesheet" href=" {{ asset('frontend/assets/css/responsive.css') }}">

    <!-- Favicon -->
    <link rel="icon" href=" {{ asset('frontend/assets/img/favicon.png') }}">
</head>
<body>
    <!-- Header -->
    <header id="bringer-header" class="is-frosted is-sticky" data-appear="fade-down" data-unload="fade-up">
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
        <!-- Mobile Header -->
        <div class="bringer-mobile-header-inner">
            <a href="./" class="bringer-logo">
                <img src=" {{ asset('frontend/assets/img/logo.png') }}" alt="bringer." width="200px">
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
            <!-- Hero Section -->
            <section>
                <div class="bringer-hero-block bringer-hero-type01">
                    <!-- Main Line -->
                    <div class="stg-row stg-bottom-gap-l stg-m-bottom-gap-l">
                        <div class="stg-col-9 stg-tp-col-8 stg-m-col-12">
                            <!-- Title -->
                            <h1 class="bringer-page-title" data-split-appear="fade-up" data-split-unload="fade-up">#RomanStockManager. Enhancing your business growth</h1>
                        </div>
                        <div class="stg-col-3 stg-tp-col-4 stg-m-col-12">
                            <!-- Social Proof -->
                            <div class="bringer-hero-social-proof">
                                <div data-stagger-appear="fade-up" data-stagger-delay="100" data-stagger-unload="fade-up">
                                    <img src=" {{ asset('frontend/assets/img/home/vii.jpg') }}" alt="Client 01">
                                    <img src=" {{ asset('frontend/assets/img/home/abr.png') }}" alt="Client 02">
                                    <img src=" {{ asset('frontend/assets/img/home/bona.png') }}" alt="Client 03">
                                    <a href="testimonials.html">1K+</a>
                                </div>
                                <p data-appear="fade-up" data-unload="fade-up" data-delay="200">Crown&Roman Cooperation.</p>
                            </div>
                        </div>
                    </div><!-- .stg-row -->

                    <!-- Masked Media Container -->
                    <div class="bringer-hero-media-wrap bringer-masked-bottom-right bringer-masked-block stg-bottom-gap-l" data-appear="zoom-out" data-unload="zoom-out">
                        <!-- Masked Media -->
                        <div class="bringer-masked-media bringer-masked-media bringer-parallax-media">
                            <img src=" {{ asset('frontend/assets/img/home/girl.jpg') }}" alt="Unleash Your Creativity">
                        </div>
                        <!-- Content -->
                        <div class="bringer-masked-content at-bottom-right">
                            <a href="#page01" class="bringer-square-button" data-appear="fade-left">
                                <span class="bringer-icon bringer-icon-arrow-down"></span>
                            </a>
                        </div>
                    </div>

                    <!-- Additional Information Line -->
                    <div class="stg-row stg-valign-bottom">
                        <div class="stg-col-3 stg-tp-col-3 stg-m-col-6" data-appear="fade-up" data-delay="200" data-unload="fade-up">
                            <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                <div class="bringer-counter-number">10</div>
                                <div class="bringer-counter-label">Softwares in one Package 🎁</div>
                            </div><!-- .bringer-counter -->
                        </div>
                        <div class="stg-col-3 stg-tp-col-3 stg-m-col-6" data-appear="fade-up" data-delay="300" data-unload="fade-up">
                            <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                <div class="bringer-counter-number" data-suffix="+">2</div>
                                <div class="bringer-counter-label">Years in the 🚀Game. </div>
                            </div><!-- .bringer-counter -->
                        </div>
                        <div class="stg-col-6 stg-tp-col-6 stg-m-col-12 stg-m-top-gap" data-appear="fade-up" data-delay="400" data-unload="fade-up">
                            <p class="bringer-large-text">Don't let outdated inventory management hold your business back. Upgrade to Roman Stock Manager today and take control of your inventory with confidence with a free mind. </p>
                        </div>
                    </div><!-- .stg-row -->
                </div><!-- .bringer-hero-block -->
            </section>
          
            <!-- Section: Steps -->
            <section class="backlight-top" id="page01">
                <div class="stg-bottom-gap-l">
                    <h2 data-appear="fade-up" data-unload="fade-up">Update your business with Us , Why??</h2>
                </div>
                <!-- Step 01 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-m-bottom-gap-l" data-unload="fade-left">
                    <div class="stg-col-3 stg-offset-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src=" {{ asset('frontend/assets/img/null.jpg') }}" data-src=" {{ asset('frontend/assets/img/home/ph.jpg') }}" alt="Step 01" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-right" data-delay="100">
                        <span class="bringer-label">Why roman stock manager !</span>
                        <h4> Real-Time Inventory Tracking</h4>
                        <p><span class="bringer-highlight">01:</span> With Roman Stock Manager, you get real-time inventory tracking. This means you always know what's in stock, what needs reordering, and what products are moving slowly.</p>
                        <p><span class="bringer-highlight">02:</span> Real-time updates reduce the risk of overstocking or running out of stock, ensuring optimal inventory levels at all times.</p>
                    </div>
                </div>
                <!-- Step 02 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-tp-row-reverse stg-m-bottom-gap-l" data-unload="fade-right">
                    <div class="stg-col-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src=" {{ asset('frontend/assets/img/null.jpg') }}" data-src=" {{ asset('frontend/assets/img/home/gr.jpg') }}" alt="Step 02" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-left" data-delay="100">
                        <span class="bringer-label">why roman stock manager !</span>
                        <h4> Enhance Accuracy , Reduced Costs &amp; manage debts easily</h4>
                        <p><span class="bringer-highlight">01:</span> Accuracy is crucial in inventory management. Roman Stock Manager utilizes barcode scanning and automated data entry to ensure precise inventory records..</p>
                        <p><span class="bringer-highlight">02:</span>  Reduce costly mistakes and save money by optimizing your stock levels and have full control of your depts clients.</p>
                    </div>
                    <div class="stg-col-3"><!-- Empty Column --></div>
                </div>
                <!-- Step 03 Row -->
                <div class="stg-row stg-bottom-gap stg-valign-middle stg-m-bottom-gap-l" data-unload="fade-left">
                    <div class="stg-col-3 stg-offset-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src=" {{ asset('frontend/assets/img/null.jpg') }}" data-src=" {{ asset('frontend/assets/img/home/ics.jpg') }}" alt="Step 03" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-right" data-delay="100">
                        <span class="bringer-label">why roman stock manager !</span>
                        <h4>Security &amp; Privacy with Roman Stock Manager</h4>
                        <p><span class="bringer-highlight">01:</span>In today’s digital age, security and privacy are paramount concerns for businesses, especially when it comes to managing sensitive inventory and customer data.</p>
                        <p><span class="bringer-highlight">02:</span> The Roman Stock Manager takes these concerns seriously, implementing robust security measures and privacy protections to ensure that your business data is safe and compliant with industry standards.</p>
                    </div>
                </div>
                <!-- Step 04 Row -->
                <div class="stg-row stg-valign-middle stg-tp-row-reverse" data-unload="fade-right">
                    <div class="stg-col-3 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src=" {{ asset('frontend/assets/img/null.jpg') }}" data-src=" {{ asset('frontend/assets/img/home/hom.jpg') }}" alt="Step 04" width="960" height="960">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-6" data-appear="fade-left" data-delay="100">
                        <span class="bringer-label"></span>
                        <h4>Easy to use software &amp; Accessible anyplace any time</h4>
                        <p><span class="bringer-highlight">01:</span>Roman stock manager provides you with an intuitive ,easy to use and the best user interface and also accesible to any smart device. Join us and you also have a seamless control of your business.</p>
                    </div>
                    <div class="stg-col-3"><!-- Empty Column --></div>
                </div>
            </section>

            <!-- Section: About Us -->
            <section class="backlight-bottom divider-top">
                <div class="stg-row stg-large-gap stg-valign-middle stg-tp-column-reverse">
                    <div class="stg-col-6" data-appear="fade-right" data-unload="fade-left">
                        <h3>Rsm revolutionizes your business into the tech world. 🌐🚀</h3>
                        <p class="bringer-large-text">Rsm , is not only a solution to your business but a total transformation from normal to a super business.  </p>
                        <p>With our creative and passionated team you can also unlish your business website within a short time.</p>
                        <div class="align-right">
                            <a href="{{ route('habout.route') }}" class="bringer-arrow-link">Learn More About Us</a>
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-bottom-gap-l stg-m-bottom-gap" data-unload="fade-right" data-appear="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src=" {{ asset('frontend/assets/img/null.jpg') }}" data-src=" {{ asset('frontend/assets/img/home/s.jpg') }}" alt="About Us" width="960" height="960">
                        </div>
                    </div>
                </div><!-- .stg-row -->
            </section>

          
            <!-- Section: Our Services -->
            <section class="backlight-top">
                <!-- Section Title -->
                <div class="stg-row bringer-section-title">
                    <div class="stg-col-8 stg-offset-2">
                        <div class="align-center">
                            <h2 data-appear="fade-up" data-unload="fade-up">Our Services</h2>
                            <p class="bringer-large-text" data-appear="fade-up" data-unload="fade-up" data-delay="100">Rsm offers you a creative and tech advanced services that takes your business to the Next level and reach your goals,You won`t imagine all these services in one software just chooce your plan:</p>
                        </div>
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
                <div class="align-center stg-top-gap" data-appear="fade-up" data-unload="zoom-out" data-delay="100">
                    <a href="{{ route('service.route') }}" class="bringer-button">Explore All Services</a>
                </div>
            </section>

            <!-- Section: CTA -->
            <section data-padding="bottom">
                <div class="bringer-masked-cta bringer-masked-block" data-unload="fade-down">
                    <form action="mail-short.php" method="post" data-fill-error="Please, fill out the form." class="bringer-contact-form is-short bringer-masked-media" data-appear="fade-up">
                        <div class="bringer-form-content bringer-cta-form">
                            <div class="bringer-cta-form-content" data-appear="fade-up" data-delay="100">
                                <div class="bringer-cta-title">Ready to simplify your business?</div>
                                <input type="email" id="subscribe_email" name="subscribe_email" placeholder="email@example.com" required>
                            </div>
                            <div class="bringer-cta-form-button" data-appear="fade-up" data-delay="200">
                                <button type="submit">
                                    <span class="bringer-icon bringer-icon-arrow-submit"></span>
                                </button>
                            </div>
                            <div class="bringer-contact-form__response"></div>
                        </div>
                        <span class="bringer-form-spinner"></span>
                    </form>
                    <div class="bringer-masked-cta-content bringer-masked-content at-top-right">
                        <p class="bringer-large-text" data-appear="fade-down">Let's craft a visual identity that ignites passion and loyalty. ✨</p>
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
    <script src=" {{ asset('frontend/assets/js/lib/jquery.min.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/lib/libs.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/contact_form.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/st-core.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/classes.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/main.js') }}"></script>
</body>
</html>
