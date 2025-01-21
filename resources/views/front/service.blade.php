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
@endsection
        