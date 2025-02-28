@extends('front.themefront')

@section('title')
About us | Roman Stock Manager 
@endsection

@section('me')
    @parent
@endsection

@section('content')
       
<div class="stg-container">
            <!-- Section: Page Title -->
            <section class="backlight-bottom">
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-8 stg-tp-bottom-gap" data-appear="fade-right" data-unload="fade-left">
                        <h2>Roman Stock Manager - Your Business Champion 😎</h2>
                    </div>
                    <div class="stg-col-4 stg-tp-col-8 stg-tp-offset-4 tp-align-right stg-m-col-9 stg-m-offset-3" data-appear="fade-left" data-unload="fade-right">
                        <p>Discover how Roman Stock Manager transforms ordinary businesses into market champions with our revolutionary <span class="bringer-highlight">"Champion's Inventory System"</span> 🚀</p>
                    </div>
                </div>

                <!-- Slider -->
                <div class="bringer-slider-wrapper bringer-masked-block stg-bottom-gap" data-appear="fade-up" data-delay="100" data-unload="fade-up">
                    <div class="swiper bringer-slider bringer-masked-media" data-autoplay="2000" data-duration="800" data-effect="slide">
                        <div class="swiper-wrapper">
                            <!-- Slider Item -->
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/inner-pages/view4.jpg') }}" alt="Positive Beverage" width="1920" height="1080">
                            </div>
                            <!-- Slider Item -->
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/inner-pages/view5.jpeg') }}" alt="Positive Beverage" width="1920" height="1080">
                            </div>
                            <!-- Slider Item -->
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/inner-pages/view6.jpeg') }}" alt="Positive Beverage" width="1920" height="1080">
                            </div>
                             <!-- Slider Item -->
                             <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/inner-pages/view8.jpg') }}" alt="Positive Beverage" width="1920" height="1080">
                            </div>
                        </div>
                    </div><!-- .bringer-slider -->
                    <!-- Masked Navigation -->
                    <div class="bringer-slider-nav bringer-masked-content at-bottom-right">
                        <a href="#" class="bringer-slider-prev">
                            <span class="bringer-icon bringer-icon-chevron-left"></span>
                        </a>
                        <a href="#" class="bringer-slider-next">
                            <span class="bringer-icon bringer-icon-chevron-right"></span>
                        </a>
                    </div>
                </div>

                <!-- Meta -->
                <div class="bringer-hero-info-line" data-stagger-appear="fade-up" data-delay="200" data-unload="fade-up">
                    <div class="bringer-meta">
                         <span>Perfect for Every Business Champion 🌟</span>
                    </div>
                    <div class="bringer-meta">
                         <span>From Startups to Enterprises 📈</span>
                    </div>
                    <div class="bringer-meta">
                         <span>Your Success is Our Mission 🎯</span>
                    </div>
                </div>
            </section>

            <!-- Section: The Challenge -->
            <section>
                <div class="stg-row">
                    <div class="stg-col-6 stg-tp-bottom-gap-l" data-unload="fade-left">
                        <div class="bringer-sticky-block">
                            <h2 data-appear="fade-right">About Rsm</h2>
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-10 stg-tp-offset-2 stg-m-col-11 stg-m-offset-1" data-unload="fade-right">
                        <div class="stg-bottom-gap-section stg-tp-bottom-gap-l" data-appear="fade-up">
                            <h4>The Business Challenge 💪</h4>
                            <p>In today's fast-paced market, businesses struggle with inventory chaos, missed sales opportunities, and financial confusion. Traditional methods just don't cut it anymore.</p>
                            <p>Without proper inventory management, companies face stockouts, oversupply, and cash flow problems. It's time to transform these challenges into victories!</p>
                        </div>
                        <div data-appear="fade-up">
                            <h4>The Champion's Solution 🏅</h4>
                            <p class="bringer-large-text">Roman Stock Manager isn't just software - it's your business's winning strategy. We've created a complete system that turns inventory management from a headache into your competitive advantage.</p>
                            <p>Our solution combines real-time tracking, smart analytics, and user-friendly design to give you the champion's edge in today's market.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Gallery -->
            <section data-tp-padding="none">
                <div class="bringer-grid-3cols" data-stagger-appear="fade-up" data-stagger-unload="fade-left">
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos09.jpg') }}" alt="Positive Beverage" data-speed="0.9" data-m-speed="1" width="800" height="1200">
                    </div>
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos02.jpg') }}" alt="Positive Beverage" width="800" height="1200">
                    </div>
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos08.jpg') }}" alt="Positive Beverage" data-speed="1.1" data-m-speed="1" width="800" height="1200">
                    </div>
                </div>
            </section>
            
            <!-- Section: Solution -->
            <section>
                <div class="stg-row">
                    <div class="stg-col-6 stg-tp-bottom-gap-l" data-appear="fade-right" data-unload="fade-left">
                        <h2>The Solution</h2>
                    </div>
                    <div class="stg-col-6 stg-tp-col-10 stg-tp-offset-2 stg-m-col-11 stg-m-offset-1" data-appear="fade-left" data-unload="fade-right">
                        <p class="bringer-large-text">Experience the power of championship-level inventory management 🚀</p>
                        <ul class="bringer-marked-list">
                            <li><span class="bringer-highlight">Smart Inventory Control:</span> Real-time tracking, automated reordering, and instant stock insights keep you ahead of the game. Never miss a sale due to stockouts again!</li>
                            <li><span class="bringer-highlight">Financial Mastery:</span> Take control of your finances with integrated accounting, debt management, and profit tracking. Watch your bottom line soar!</li>
                            <li><span class="bringer-highlight">Champion's Dashboard:</span> Get instant insights with our intuitive interface. Make winning decisions with real-time data at your fingertips.</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <section data-padding="none" data-unload="zoom-out">
                <div class="bringer-expand-on-scroll">
                    <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/view2.png') }}" alt="Positive Beverage" width="1920" height="960">
                </div><!-- .bringer-expand-on-scroll -->
            </section>
            
            <!-- Section: Results & Impact -->
            <section>
                <div class="stg-row">
                    <div class="stg-col-6 stg-tp-bottom-gap" data-appear="fade-up" data-unload="fade-left">
                        <div class="bringer-sticky-block">
                            <h2>Results &amp; Impact</h2>
                        </div>
                    </div>
                    <div class="stg-col-6 stg-tp-col-10 stg-tp-offset-2 stg-m-col-11 stg-m-offset-1" data-appear="fade-up" data-delay="100" data-unload="fade-right">
                        <p class="bringer-large-text">Join the ranks of business champions who've transformed their operations with RSM 🏆</p>
                        <ul class="bringer-marked-list">
                            <li><span class="bringer-highlight">1S00% Efficiency Boost:</span> Our clients report dramatic improvements in inventory turnover and operational efficiency.</li>
                            <li><span class="bringer-highlight">Zero Stock Emergencies:</span> Say goodbye to stockouts and overstock situations with our smart prediction system.</li>
                            <li><span class="bringer-highlight">95% Time Saved:</span> Automate tedious tasks and focus on growing your business empire.</li>
                            <li><span class="bringer-highlight">Champion's Community:</span> Join thousands of successful businesses using RSM to dominate their markets.</li>
                        </ul>
                        <p>Roman Stock Manager is more than software - it's your partner in business excellence. Transform your business operations and join the ranks of market champions with RSM's comprehensive solution.</p>
                    </div>
                </div>
            </section>

            <!-- Section: Next Post -->
            <section class="divider-top" data-appear="fade-up">
                <div class="align-center" data-unload="zoom-in">
                    <a href="{{ route('contact.route') }}" class="bringer-icon-link bringer-next-post">
                        <div class="bringer-icon-link-content">
                            <h6>JOIN THE CHAMPIONS</h6>
                            <h2>Start Your Victory<br>Journey Today 🚀</h2>
                        </div>
                        <div class="bringer-icon-wrap">
                            <i class="bringer-icon bringer-icon-explore"></i>
                        </div>
                    </a><!-- .bringer-icon-link -->
                </div>
            </section>
        </div><!-- .stg-container -->
@endsection
       