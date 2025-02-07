@extends('front.themefront')

@section('title')
Our Services|Roman Stock Manager
@endsection

@section('me')
    @parent
@endsection

@section('content')
        <div class="stg-container">
            <!-- Section: Intro -->
            <section>
                <div class="stg-row stg-large-gap stg-tp-normal-gap stg-tp-column-reverse">
                    <div class="stg-col-6 stg-vertical-space-between" data-unload="fade-left">
                        <div class="stg-tp-bottom-gap">
                            <h1 class="bringer-page-title" data-split-appear="fade-up">Transform Your Business Into a Champion 😎</h1>
                            <p class="bringer-large-text bringer-tp-normal-text" data-appear="fade-right" data-delay="200">Dominate your market with Roman Stock Manager's all-in-one business command center. From inventory mastery to financial victory, we're your partner in becoming an unstoppable force in your industry! 🚀</p>
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
                        <h2 data-split-appear="fade-up" data-unload="fade-up">Your Path to Business Excellence 🌟 Discover Our Champion Solutions:</h2>
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
                        <span class="bringer-label">Master Your Inventory</span>
                        <h4>Complete Inventory Command Center 📦</h4>
                        <p>Take control of your stock like never before:
                            ✓ Real-time inventory tracking with smart alerts
                            ✓ Automated reordering system that never sleeps
                            ✓ Intelligent stock predictions using AI
                            ✓ Multi-location inventory management
                            ✓ Barcode scanning for lightning-fast operations</p>
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
                        <span class="bringer-label">Boost Your Revenue</span>
                        <h4>Smart Sales & Invoice Empire 💰</h4>
                        <p>Transform your sales process into a revenue-generating machine:
                            ✓ One-click professional invoicing
                            ✓ Integrated payment tracking system
                            ✓ Real-time sales analytics dashboard
                            ✓ Customer purchase history tracking
                            ✓ Automated payment reminders</p>
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
                        <span class="bringer-label">Financial Mastery</span>
                        <h4>Complete Financial Control Suite 📊</h4>
                        <p>Master your business finances with precision:
                            ✓ Comprehensive financial reporting
                            ✓ Smart debt management system
                            ✓ Cash flow forecasting
                            ✓ Expense tracking and categorization
                            ✓ Profit optimization insights</p>
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
                        <span class="bringer-label">Customer Success</span>
                        <h4>Customer Relationship Mastery 🤝</h4>
                        <p>Build lasting customer relationships:
                            ✓ Complete customer profiles
                            ✓ Purchase history analytics
                            ✓ Smart credit limit management
                            ✓ Automated customer communications
                            ✓ Loyalty program integration</p>
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
                        <span class="bringer-label">Digital Presence</span>
                        <h4>E-commerce Domination 🌐</h4>
                        <p>Expand your reach with powerful online tools:
                            ✓ Integrated e-commerce platform
                            ✓ Real-time inventory sync
                            ✓ Mobile-optimized shopping experience
                            ✓ SEO-optimized product listings
                            ✓ Multi-channel selling capabilities</p>
                    </div>
                </div>
            </section>

            <!-- Section: Offer -->
            <section>
                <!-- Services Grid -->
                <div class="bringer-grid-3cols bringer-tp-grid-2cols bringer-tp-stretch-last-item" data-stagger-appear="fade-up" data-stagger-unload="fade-up">
                    <!-- Item 01 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>24/7 Champion Support 🎯<span class="bringer-accent">.</span></h5>
                        <p>Our victory specialists are always ready to ensure your business success with round-the-clock expert support.</p>
                    </div>
                    <!-- Item 02 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>Continuous Innovation 🚀<span class="bringer-accent">.</span></h5>
                        <p>Stay ahead with regular updates and new features designed to keep you at the forefront of your industry.</p>
                    </div>
                    <!-- Item 03 -->
                    <div class="bringer-masked-block bringer-grid-more-masked">
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between is-accented bringer-masked-media">
                            <h5>Ready to Dominate? 🏆<span class="bringer-accent">.</span></h5>
                            <p class="bringer-large-text">Join the elite businesses using Roman Stock Manager to achieve unprecedented growth! 🌟</p>
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
@endsection
        