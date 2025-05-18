@extends('front.themefront')

@section('title')
Contact Us|Roman Stock Manager 
@endsection

@section('me')
    @parent
@endsection

@section('content')
        <div class="stg-container">
            <!-- Section: Page Title -->
            <section class="backlight-bottom">
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-6 stg-offset-3 align-center">
                        <h1 class="bringer-page-title" data-appear="fade-up" data-unload="fade-up">Your Victory Starts Here 🏆</h1>
                        <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Don't let another day of inventory chaos hold you back. Our champion team is ready to transform your business today! ⚡</p>
                    </div>
                </div>
                <div class="bringer-parallax-media" data-parallax-speed="20" data-appear="fade-up" data-delay="200" data-unload="fade-up">
                    <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/ref.jpg') }}" alt="Get in Touch" width="1920" height="960">
                </div><!-- .bringer-parallax-media -->
            </section>

            <!-- Section: About Us -->
            <section>
                <!-- Section Title -->
                <div class="stg-row stg-bottom-gap">
                    <div class="stg-col-8">
                        <h2 data-split-appear="fade-up" data-unload="fade-up">Ready to Join the Business Champions? Time is Money! 💰</h2>
                    </div>
                    <div class="stg-col-4"></div>
                </div>
                <!-- Section Content -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-6 stg-offset-6" data-appear="fade-up" data-delay="200" data-unload="fade-up">
                        <p>Every minute counts in business! While you're reading this, your competitors might be getting ahead. Don't wait - take the first step towards inventory mastery now. Our champion support team is standing by to rocket-launch your business success! 🚀</p>
                    </div>
                </div>
                <!-- Grid Galery -->
                <div class="bringer-grid-3cols bringer-parallax-media bringer-m-grid-3cols stg-m-small-gap" data-stagger-appear="fade-up" data-delay="200" data-stagger-unload="fade-up">
                    <a href="{{ asset('frontend/assets/img/inner-pages/spp.jpg') }}" class="bringer-lightbox-link" data-size="960x960">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/spp.jpg') }}" alt="Bringer" width="960" height="960">
                    </a>
                    <a href="{{ asset('frontend/assets/img/inner-pages/qnn.jpg') }}" class="bringer-lightbox-link" data-size="960x960">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/qnn.jpg') }}" alt="Bringer" width="960" height="960">
                    </a>
                    <a href="{{ asset('frontend/assets/img/inner-pages/rt.jpg') }}" class="bringer-lightbox-link" data-size="960x960">
                        <img class="bringer-lazy" src="{{ asset('frontend/assets/img/null.png') }}" data-src="{{ asset('frontend/assets/img/inner-pages/rt.jpg') }}" alt="Bringer" width="960" height="960">
                    </a>
                </div>
            </section>

            <!-- Section: Let's Talk -->
            <section class="backlight-top divider-bottom">
                <!-- Section Title -->
                <div class="stg-row bringer-section-title">
                    <div class="stg-col-8 stg-offset-2">
                        <div class="align-center">
                            <h2 data-appear="fade-up" data-unload="fade-up">Let's 🗣 talk!</h2>
                            <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Here's how you can connect to Roman Stock Manager team:</p>
                        </div>
                    </div>
                </div>
                <!-- Contacts Grid -->
                <div class="stg-row" data-stagger-appear="fade-up" data-delay="200" data-stagger-unload="fade-up">
                    <div class="stg-col-4 stg-tp-col-6 stg-tp-bottom-gap">
                        <!-- Phone -->
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                            <a href="tel:+255 738-020-528" class="bringer-grid-item-link"></a>
                            <div>
                                <h5>Instant Champion Support 📞<span class="bringer-accent">.</span></h5>
                                <h6>+255 71514 4962</h6>
                            </div>
                            <p>Get immediate answers! Our victory specialists are ready to guide you to business success. One call could change your business forever! ⚡</p>
                        </div>
                    </div>
                    <div class="stg-col-4 stg-tp-col-6 stg-tp-bottom-gap">
                        <!-- Email -->
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                            <a href="mailto:romanstockmanager@outlook.com" class="bringer-grid-item-link"></a>
                            <div>
                                <h5>Start Your Success Story 📧<span class="bringer-accent">.</span></h5>
                                <h6>romanstockmanager@outlook.com</h6>
                            </div>
                            <p>Take the first step to victory! Share your business challenges with us now, and we'll show you the path to becoming a market champion! 🏆</p>
                        </div>
                    </div>
                    <div class="stg-col-4 stg-tp-col-12">
                        <!-- Social Media -->
                        <div class="bringer-block stg-aspect-square stg-tp-aspect-rectangle stg-vertical-space-between">
                            <div>
                                <h5>Join Our Champions' Network 🌟<span class="bringer-accent">.</span></h5>
                                <ul class="bringer-socials-list stg-small-gap" data-stagger-appear="fade-up" data-stagger-delay="75">
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
                                   
                                </ul>
                            </div>
                            <p>Connect with fellow business champions! See live success stories, get exclusive tips, and stay ahead of the game with our winning community! 🚀</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map -->
            <section>
                <!-- Section Title -->
                <div class="stg-row bringer-section-title">
                    <div class="stg-col-8 stg-offset-2">
                        <div class="align-center">
                            <h2 data-appear="fade-up" data-unload="fade-up">Your Success Hub Awaits 🏢</h2>
                            <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Visit the headquarters where champions are made! Come experience the energy of success and see how we're transforming businesses every day! 💫</p>
                        </div>
                    </div>
                </div>
                <!-- Contacts Grid -->
                <div class="stg-row">
                    <div class="stg-col-4 stg-tp-col-6 stg-m-bottom-gap" data-appear="fade-right" data-delay="100" data-unload="fade-left">
                        <!-- Phone -->
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                            <a href="https://maps.app.goo.gl/WbTG6EKuF9dE1Xuy8" class="bringer-grid-item-link"></a>
                            <div>
                                <h5>Victory Headquarters 📍<span class="bringer-accent">.</span></h5>
                                <h6>KARIAKOO, Gogo and Narun`gombe,<br>Bona redeast</h6>
                            </div>
                            <p>Step into the future of business success! Visit our command center and let's craft your victory strategy together! 🎯</p>
                        </div>
                    </div>
                    <div class="stg-col-8 stg-tp-col-6" data-appear="fade-left" data-delay="200" data-unload="fade-right">
                        <iframe class="bringer-google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.58424554139!2d39.2714055726446!3d-6.820312778098908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4ba8f10a9c4f%3A0xa4516a5c6b7d8bb7!2sGogo%20Street%20%26%20Narung&#39;ombeStreet%2C%20Dar%20es%20Salaam!5e0!3m2!1sen!2stz!4v1719122406006!5m2!1sen!2stz" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>

            <!-- Section: CTA Form -->
            <section class="backlight-top is-fullwidth">
                <div class="stg-row stg-valign-middle stg-cta-with-image stg-tp-column-reverse">
                    <div class="stg-col-5" data-unload="fade-left">
                        <div class="bringer-offset-image" data-bg-src="{{ asset('frontend/assets/img/curr.jpg') }}" data-appear="fade-up" data-threshold="0.25"></div>
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
                            Don't Wait - Your Competition Isn't! 🏃‍♂️💨
                            </div>
                            <div class="bringer-cta-text">
                                <div class="stg-row stg-valign-middle">
                                    <div class="stg-col-8 stg-tp-col-7 stg-m-col-8 stg-m-offset-1" data-appear="fade-left">
                                        <p class="bringer-large-text">Every day without Roman Stock Manager is a day of missed opportunities. Let's turn your business into a success story today! 🌟</p>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- .stg-container -->
@endsection