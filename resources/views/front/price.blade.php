@extends('front.themefront')

@section('title')
Pricing|Roman Stock Manager
@endsection

@section('me')
    @parent
@endsection

@section('content')
        <div class="stg-container">
            <!-- Section: Page Title -->
            <section class="backlight-bottom">
                <div class="stg-row">
                    <div class="stg-col-6 stg-offset-3 align-center stg-tp-col-10 stg-tp-offset-1">
                        <h1 class="bringer-page-title" data-appear="fade-up" data-unload="fade-up">Champion-Level Solutions 😎</h1>
                        <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Unlock your business potential with packages designed for winners. Choose your path to victory! 🚀</p>
                    </div>
                </div>
            </section>

            <!-- Section: Intro -->
            <section>
                <div class="stg-row stg-large-gap stg-m-normal-gap">
                    <div class="stg-col-6 stg-tp-bottom-gap-l stg-m-bottom-gap" data-appear="fade-right" data-unload="fade-left">
                        <div class="bringer-parallax-media">
                            <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/sal.jpg') }}" alt="Ignite Your Potential" width="1200" height="1200">
                        </div>
                    </div>
                    <div class="stg-col-6 stg-vertical-space-between" data-appear="fade-left" data-unload="fade-right">
                        <div>
                            <h2>Level Up Your Business Game 🔥</h2>
                            <p class="bringer-large-text">Ready to dominate your market? Our champion-tested solutions are designed to transform your business operations into a well-oiled machine.</p>
                            <p>Don't let outdated systems hold you back. Join thousands of successful businesses who've already claimed their competitive edge with Roman Stock Manager. Time to become unstoppable! 💪</p>
                        </div>
                        <div class="tp-align-right">
                            <a href="{{ route('contact.route') }}" class="bringer-icon-link">
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
                </div>
            </section>

            <!-- Section: How We Make -->
            <section class="divider-top">
                <!-- Section Title -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-6 stg-offset-3 align-center">
                        <h2 data-split-appear="fade-up" data-unload="fade-up">Transform Your Business Into a Champion 🏆</h2>
                    </div>
                </div>
                <!-- Services Grid -->
                <div class="bringer-grid-3cols bringer-tp-grid-2cols bringer-tp-stretch-last-item" data-stagger-appear="fade-up" data-delay="100" data-stagger-unload="fade-up">
                    <!-- Item 01 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>Unbeatable Value 💎<span class="bringer-accent">.</span></h5>
                        <p class="bringer-large-text bringer-tp-normal-text">Maximum ROI with our competitive pricing. Watch your investment turn into massive business gains!</p>
                    </div>
                    <!-- Item 02 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>Champion-Level Features 🏅<span class="bringer-accent"></span></h5>
                        <p class="bringer-large-text bringer-tp-normal-text">Every tool you need to dominate your market, packaged for peak performance.</p>
                    </div>
                    <!-- Item 03 -->
                    <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                        <h5>24/7 Victory Support 🎯<span class="bringer-accent">.</span></h5>
                        <p class="bringer-large-text">Expert guidance whenever you need it. We're here to ensure your success!</p>
                    </div>
                </div>
            </section>

            <!-- Section: Prices -->
            <section class="divider-both tp-is-fullwidth tp-is-stretched">
                <!-- Section Title -->
                <div class="stg-row stg-bottom-gap" data-unload="fade-up">
                    <div class="stg-col-8 stg-offset-2 stg-tp-col-6 stg-tp-offset-3">
                        <div class="align-center">
                            <h2 data-split-appear="fade-up">Ready to simplify your Business🚀?</h2>
                        </div>
                    </div>
                </div>
                <div class="stg-row stg-bottom-gap-l" data-unload="fade-up" data-delay="100">
                    <div class="stg-col-6 stg-offset-3 stg-tp-col-6 stg-tp-offset-3">
                        <div class="align-center">
                            <p class="bringer-large-text" data-appear="fade-up" data-delay="100">
                                Browse our service packages 📦 and find the perfect spark ✨ to ignite your vision:
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Price Table Carousel -->
                <div class="swiper bringer-carousel" data-appear="fade-up" data-delay="200" data-tp-count="2" data-unload="fade-up">
                    <div class="swiper-wrapper">
                        <!-- Carousel Item 01 -->
                        <div class="bringer-block bringer-price-table swiper-slide">
                            <h6>Starter Champion 🌟<span class="bringer-accent">.</span></h6>
                            <p>#StartYourVictory</p>
                            <div class="bringer-price-wrapper">
                                <div class="bringer-label">Start winning today</div>
                                <h2>Tsh.25,000/=</h2>
                            </div>
                            <div class="bringer-label bringer-highlight">Begin Your Journey</div>
                            <ul class="bringer-marked-list">
                                <li>Essential Victory Tools 🎯</li>
                                <li>Basic Sales Command Center 💪</li>
                                <li>Basic Support and Maintenance 🔧</li>
                                <li>Starter Performance Analytics 📊</li>
                                <li>Core Support System 🛡️</li>
                                <li>Single Commander Access 👤</li>
                            </ul>
                            <a href="{{ route('subscriptions.index') }}" class="bringer-button is-fullwidth">Start Winning Now!</a>
                        </div><!-- .bringer-carousel-card -->
                                                
                        <!-- Carousel Item 02 -->
                        <div class="bringer-block bringer-price-table swiper-slide">
                            <h6>Business Champion 🏆<span class="bringer-accent">.</span></h6>
                            <p>#DominateYourMarket</p>
                            <div class="bringer-price-wrapper">
                                <div class="bringer-label">Unleash your potential</div>
                                <h2>Tsh.35,000/=</h2>
                            </div>
                            <div class="bringer-label bringer-highlight">Most Popular Choice!</div>
                            <ul class="bringer-marked-list">
                                <li>Advanced Victory Arsenal 🚀</li>
                                <li>Premium Sales Command Center 💰</li>
                                <li>Strategic Customer Management 🤝</li>
                                <li>Champion-Level Analytics 📈</li>
                                <li>Multi-Commander Access (3-5) 👥</li>
                                <li>Priority Support Channel 🎯</li>
                            </ul>
                            <a href="{{ route('subscriptions.index') }}" class="bringer-button is-fullwidth">Claim Your Victory!</a>
                        </div><!-- .bringer-carousel-card -->
                                                
                        <!-- Carousel Item 03 -->
                        <div class="bringer-block bringer-price-table swiper-slide">
                            <h6>Digital Dominator 👑<span class="bringer-accent">.</span></h6>
                            <p>#TotalMarketDomination</p>
                            <div class="bringer-price-wrapper">
                                <div class="bringer-label">Complete digital dominance</div>
                                <h2>Tsh.45,000/=</h2>
                            </div>
                            <div class="bringer-label bringer-highlight">Ultimate Power Package</div>
                            <ul class="bringer-marked-list">
                                <li>Complete Digital Empire Suite 🌐</li>
                                <li>Custom Victory Website 🎨</li>
                                <li>Advanced Market Domination Tools 🚀</li>
                                <li>Ultimate Security Shield 🛡️</li>
                                <li>Full E-commerce Arsenal 🛍️</li>
                                <li>VIP Support Access 👑</li>
                            </ul>
                            <a href="{{ route('subscriptions.index') }}" class="bringer-button is-fullwidth">Dominate Now!</a>
                        </div><!-- .bringer-carousel-card -->
                                                
                        <!-- Carousel Item 04 -->
                       
                                                
                        <!-- Carousel Item 05 -->
                        <div class="bringer-block bringer-price-table swiper-slide">
                            <h6>Simple Plan📦<span class="bringer-accent">.</span></h6>
                            <p>#JoinSimplePlan 🎉</p>
                            <div class="bringer-price-wrapper">
                                <div class="bringer-label">per month</div>
                                <h2>FREE</h2>
                            </div>
                            <div class="bringer-label bringer-highlight">What is included</div>
                            <ul class="bringer-marked-list">
                                <li>Basic Inventory Management 📦</li>
                                <li>Sales & Invoice Management 💸</li>
                                <li>Basic Analytics and Reporting 📊 </li>
                                <li>Basic Support and Maintenance 🔧</li>
                                <li>Low customer Dept manager 🧾</li>
                                <li>1 Account</li>
                            </ul>
                            <a href="{{ route('subscriptions.index') }}" class="bringer-button is-fullwidth">Order Now</a>
                        </div><!-- .bringer-carousel-card -->
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination bringer-dots"></div>
                </div><!-- .bringer-carousel -->
            </section>

            <!-- Section: FAQ -->
            <section>
                <!-- Section Title -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-8 stg-offset-2">
                        <div class="align-center">
                            <h2 data-split-appear="fade-up" data-unload="fade-up">Ready to Join the Champions? 🏆</h2>
                            <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Get answers to your victory path questions:</p>
                        </div>
                    </div>
                </div>
                <!-- FAQ List -->
                <div class="bringer-faq-list">
                    <!-- FAQ Item 01 -->
                    <div class="bringer-toggles-item bringer-block" data-appear="fade-up" data-unload="fade-up">
                        <div class="bringer-toggles-item--title">
                            <span class="bringer-label">General</span>
                            <h4>
                                <sup>01.</sup>
                                What exactly does Roman Stock Manager do?
                            </h4>
                        </div>
                        <div class="bringer-toggles-item--content">
                            <p>Roman Stock Manager streamlines inventory management, automates sales and invoicing, manages customer relationships, tracks expenses and budgets, and helps create integrated e-commerce websites. 📦💼🌐</p>
                        </div>
                    </div>
                    <!-- FAQ Item 02 -->
                    <div class="bringer-toggles-item bringer-block" data-appear="fade-up" data-unload="fade-up">
                        <div class="bringer-toggles-item--title">
                            <span class="bringer-label">General</span>
                            <h4>
                                <sup>02.</sup>
                                I have a small business; is Roman Stock Manager right for me?
                            </h4>
                        </div>
                        <div class="bringer-toggles-item--content">
                            <p>Absolutely! Roman Stock Manager is designed to support businesses of all sizes. It simplifies inventory management, automates sales and invoicing, manages customer relationships, tracks expenses, and helps with budgeting, making it perfect for small businesses. </p>
                        </div>
                    </div>
                    <!-- FAQ Item 03 -->
                    <div class="bringer-toggles-item bringer-block" data-appear="fade-up" data-unload="fade-up">
                        <div class="bringer-toggles-item--title">
                            <span class="bringer-label">General</span>
                            <h4>
                                <sup>03.</sup>
                                What kind of results can I expect from working with Roman Stock Manager?
                            </h4>
                        </div>
                        <div class="bringer-toggles-item--content">
                            <span class="bringer-highlight">We are enhancing Growth:</span>
                            <ul class="bringer-marked-list">
                                <li>Improved Inventory Accuracy: Minimize stockouts and overstocking</li>
                                <li>Increased Efficiency: Streamlined sales, invoicing, and order management.</li>
                                <li>Financial Control: Effective budget management and expense tracking.</li>
                                <li>Business Growth: Insightful reporting and forecasting for informed decisions.</li>
                                <li>Online Presence: Integrated e-commerce solutions for expanded reach.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- FAQ Item 04 -->
                    <div class="bringer-toggles-item bringer-block" data-appear="fade-up" data-unload="fade-up">
                        <div class="bringer-toggles-item--title">
                            <span class="bringer-label">General</span>
                            <h4>
                                <sup>04.</sup>
                                How does Roman Stock Manager help with budget management?
                            </h4>
                        </div>
                        <div class="bringer-toggles-item--content">
                            <p>Roman Stock Manager assists with budget management by tracking all business expenses, creating detailed budgets, and providing real-time monitoring of spending. It generates financial reports to assess your business's financial health and identifies areas for cost optimization. This comprehensive approach ensures you stay within budget and make informed financial decisions. 💰</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: CTA Form -->
            <section class="backlight-top is-fullwidth">
                <div class="stg-row stg-valign-middle stg-cta-with-image stg-tp-column-reverse">
                    <div class="stg-col-5" data-unload="fade-left">
                        <div class="bringer-offset-image" data-bg-src="{{ asset('frontend/assets/img/home/curr.jpg') }}" data-appear="fade-up" data-threshold="0.25"></div>
                        <form action="mail.php" method="post" class="bringer-contact-form bringer-block" data-fill-error="Please, fill out the contact form." data-appear="fade-right" data-threshold="0.25">
                            <div class="bringer-form-content">
                                <!-- Field: Name -->
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" placeholder="Your Name" required>
                                <!-- Field: Email -->
                                <label for="email">Your Email</label>
                                <input type="email" id="email" name="email" placeholder="email@example.com" required>    
                                <!-- Field: Message -->
                                <label for="message">Your Message</label>
                                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                                <!-- Form Button -->
                                <button type="submit" value="Send Message">Get a FREE Quote</button>
                                <div class="bringer-contact-form__response"></div>
                            </div>
                            <span class="bringer-form-spinner"></span>
                        </form>
                    </div>
                    <div class="stg-col-6 stg-offset-1" data-unload="fade-right">
                        <div class="bringer-cta-form-content">
                            <div class="bringer-cta-form-title" data-split-appear="fade-up" data-split-delay="100" data-split-by="line">
                            Ready to Claim Your Market Victory? 🚀
                            </div>
                            <div class="bringer-cta-text">
                                <div class="stg-row stg-valign-middle">
                                    <div class="stg-col-2 stg-offset-2 stg-tp-col-1 stg-tp-offset-3 stg-m-col-1 stg-m-offset-2" data-appear="fade-right">
                                        <i class="bringer-cta-icon"></i>
                                    </div>
                                    <div class="stg-col-8 stg-tp-col-7 stg-m-col-8 stg-m-offset-1" data-appear="fade-left">
                                        <p class="bringer-large-text">We assist businesses, designers, and creative professionals in showcasing their exceptional work. 🖌️📦</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bringer-cta-counters bringer-grid-3cols bringer-m-grid-3cols" data-stagger-appear="fade-up" data-stagger-delay="100">
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number">10</div>
                                    <div class="bringer-counter-label">software in one</div>
                                </div><!-- .bringer-counter -->
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number" data-suffix="K+">8</div>
                                    <div class="bringer-counter-label">Happy Clients</div>
                                </div><!-- .bringer-counter -->
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number" data-suffix="+">1</div>
                                    <div class="bringer-counter-label">Years in the Game</div>
                                </div><!-- .bringer-counter -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- .stg-container -->
@endsection
