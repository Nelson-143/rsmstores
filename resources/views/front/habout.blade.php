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
                        <h2>Roman Stock Manager</h2>
                    </div>
                    <div class="stg-col-4 stg-tp-col-8 stg-tp-offset-4 tp-align-right stg-m-col-9 stg-m-offset-3" data-appear="fade-left" data-unload="fade-right">
                        <p>Dive into the story of how Bringer helped Positive Beverage transform into a vibrant movement of one empowering <span class="bringer-highlight">"Sparkle Your Way"</span> sip at a time.</p>
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
                         <span>Worry Out,any kind of Busisness</span>
                    </div>
                    <div class="bringer-meta">
                         <span>Small , Medium or Big </span>
                    </div>
                    <div class="bringer-meta">
                         <span>We are here for you</span>
                    </div>
                </div><!-- .bringer-hero-info-line -->
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
                            <h4>The Challenge</h4>
                            <p>Positive Beverage wasn't just another sparkling water brand. It was a fizzy paradox: zero sugar, zero caffeine, yet bursting with vitamins, calcium, and electrolytes – a health halo in a fizzy, fun-loving guise.</p>
                            <p>But in a crowded market of generic bubbles and sugary syrups, Positive Beverage struggled to find its voice. They needed a brand identity that reflected their unique blend of health and joy, capturing the hearts of those seeking a guilt-free way to sparkle brighter.</p>
                        </div>
                        <div data-appear="fade-up">
                            <h4>Our Approach</h4>
                            <p class="bringer-large-text">We knew Positive Beverage wasn't just a drink; it was a lifestyle. We delved deep into the hearts of health-conscious millennials, fitness enthusiasts, and those seeking mindful moments of joy in their busy lives.</p>
                            <p>Our key takeaway? They desired more than just hydration; they craved vibrant experiences, positive vibes, and a brand that mirrored their commitment to healthy living without sacrificing fun.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Gallery -->
            <section data-tp-padding="none">
                <div class="bringer-grid-3cols" data-stagger-appear="fade-up" data-stagger-unload="fade-left">
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos01.jpg') }}" alt="Positive Beverage" data-speed="0.9" data-m-speed="1" width="800" height="1200">
                    </div>
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos02.jpg') }}" alt="Positive Beverage" width="800" height="1200">
                    </div>
                    <div>
                        <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/pos03.jpg') }}" alt="Positive Beverage" data-speed="1.1" data-m-speed="1" width="800" height="1200">
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
                        <p class="bringer-large-text">We crafted the "Sparkle Your Way" brand identity, a fizzy fiesta of optimism and well-being.</p>
                        <ul class="bringer-marked-list">
                            <li><span class="bringer-highlight">Sunny Logo & Palette:</span> We designed a logo featuring a playful sunburst, positive energy and reflecting the brand's commitment to natural ingredients. The colors mirrored this sunny disposition, with bursts of citrus hues and calming aquas, evoking feelings of refreshment and positivity.</li>
                            <li><span class="bringer-highlight">Empowering Slogan:</span> "Sparkle Your Way" became more than a tagline; it was a mantra. It empowered consumers to embrace their individual paths to well-being, celebrating every healthy choice with a fizzy burst of positivity.</li>
                            <li><span class="bringer-highlight">Social Media Playground:</span> We transformed Positive Beverage's social media into a joyful haven of healthy hacks, inspiring recipes, and user-generated content around "Sparkle Your Way" moments. From workout selfies with Positive Beverage in hand to sunshine picnics featuring vibrant fruit infusions, we built a community of sparkling smiles and positive vibes.</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <section data-padding="none" data-unload="zoom-out">
                <div class="bringer-expand-on-scroll">
                    <img class="bringer-lazy" src="img/null.png" data-src="{{ asset('frontend/assets/img/inner-pages/view2.jpg') }}" alt="Positive Beverage" width="1920" height="960">
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
                        <p class="bringer-large-text">The "Sparkle Your Way" brand identity fizzed its way to success, achieving remarkable results:</p>
                        <ul class="bringer-marked-list">
                            <li><span class="bringer-highlight">Doubling of brand awareness:</span> Positive Beverage went from a niche brand to a household name, resonating with health-conscious individuals and families seeking a positive, joyful hydration experience.</li>
                            <li><span class="bringer-highlight">Significant sales growth:</span> Sales soared, fueled by new market penetration and brand loyalty among the bubbly #SparkleTribe.</li>
                            <li><span class="bringer-highlight">Award-winning creativity:</span> The branding campaign garnered accolades for its uplifting tone and innovative approach, positioning Positive Beverage as a leader in the healthy beverage revolution.</li>
                            <li><span class="bringer-highlight">Sparking a movement:</span> Beyond sales, "Sparkle Your Way" resonated on a cultural level, inspiring positivity and mindful hydration choices. From yoga studios offering Positive Beverage breaks to corporate wellness programs highlighting "Sparkle Your Way" moments, the brand became a symbol of living life to the fullest, one healthy bubble at a time</li>
                        </ul>
                        <p>Positive story is a testament to the power of positive vibes and a playful approach to well-being. By crafting a brand identity that sparkled with joy and empowered individuals to "Sparkle Your Way," we helped them transform from a niche beverage into a movement, celebrating every sip of a healthy.</p>
                    </div>
                </div>
            </section>

            <!-- Section: Next Post -->
            <section class="divider-top" data-appear="fade-up">
                <div class="align-center" data-unload="zoom-in">
                    <a href="{{ route('contact.route') }}" class="bringer-icon-link bringer-next-post">
                        <div class="bringer-icon-link-content">
                            <h6>TALK TO OUR TEAM</h6>
                            <h2>Connect🔗With<br>Us</h2>
                        </div>
                        <div class="bringer-icon-wrap">
                            <i class="bringer-icon bringer-icon-explore"></i>
                        </div>
                    </a><!-- .bringer-icon-link -->
                </div>
            </section>
        </div><!-- .stg-container -->
@endsection
       