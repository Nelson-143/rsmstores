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
                        <h1 class="bringer-page-title" data-appear="fade-up" data-unload="fade-up">Get in Touch</h1>
                        <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">We help businesses of all sizes achieve their goals. We believe every brand, big or small, deserves to shine.</p>
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
                        <h2 data-split-appear="fade-up" data-unload="fade-up">Ready to supercharge your inventory with Roman? 📊✨ Let's join forces! 🤝</h2>
                    </div>
                    <div class="stg-col-4"></div>
                </div>
                <!-- Section Content -->
                <div class="stg-row stg-bottom-gap-l">
                    <div class="stg-col-6 stg-offset-6" data-appear="fade-up" data-delay="200" data-unload="fade-up">
                        <p>
                        At Roman, we believe in the strength of collaboration and shared passion. We're not just inventory software; we're your partners in optimizing your stock management. Whether your inventory is vast or just starting to grow, reach out and let's connect! 📦🚀</p>
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
                                <h5>Phone<span class="bringer-accent">.</span></h5>
                                <h6>+255 738-020-528</h6>
                            </div>
                            <p>Give us a call and chat directly with our friendly team. We're always happy to answer any questions, feel at home.</p>
                        </div>
                    </div>
                    <div class="stg-col-4 stg-tp-col-6 stg-tp-bottom-gap">
                        <!-- Email -->
                        <div class="bringer-block stg-aspect-square stg-vertical-space-between">
                            <a href="mailto:romanstockmanager@outlook.com" class="bringer-grid-item-link"></a>
                            <div>
                                <h5>Email<span class="bringer-accent">.</span></h5>
                                <h6>romanstockmanager@outlook.com</h6>
                            </div>
                            <p>Send us a detailed message. We'll get back to you as soon as possible to discuss your business management needs further.</p>
                        </div>
                    </div>
                    <div class="stg-col-4 stg-tp-col-12">
                        <!-- Social Media -->
                        <div class="bringer-block stg-aspect-square stg-tp-aspect-rectangle stg-vertical-space-between">
                            <div>
                                <h5>Social Media<span class="bringer-accent">.</span></h5>
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
                                    <li>
                                        <a href="#" target="_blank" class="bringer-socials-patreon">
                                            <i></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p>Follow us on social media platforms for a glimpse into our innovative world, industry insights, and business management solutions.</p>
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
                            <h2 data-appear="fade-up" data-unload="fade-up">Visit our Dynamic Hub</h2>
                            <p class="bringer-large-text" data-appear="fade-up" data-delay="100" data-unload="fade-up">Step into our vibrant domain! We love welcoming potential collaborators into our lively space. Schedule a tour and get inspired by our creative energy! 🌟</p>
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
                                <h5>Address<span class="bringer-accent">.</span></h5>
                                <h6>KARIAKOO,Gogo and Narun`gombe,<br>Bona redeast</h6>
                            </div>
                            <p>Drop by our dynamic hub. We'd love to welcome you and share our innovative energy. Let's fuel your vision!</p>
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
                            Let's strategize on advancing your business! 📈💼.
                            </div>
                            <div class="bringer-cta-text">
                                <div class="stg-row stg-valign-middle">
                                    <div class="stg-col-2 stg-offset-2 stg-tp-col-1 stg-tp-offset-3 stg-m-col-1 stg-m-offset-2" data-appear="fade-right">
                                        <i class="bringer-cta-icon"></i>
                                    </div>
                                    <div class="stg-col-8 stg-tp-col-7 stg-m-col-8 stg-m-offset-1" data-appear="fade-left">
                                        <p class="bringer-large-text">
                                        We assist businesses, designers, and creative professionals in showcasing their exceptional work. 🖌️📦</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bringer-cta-counters bringer-grid-3cols bringer-m-grid-3cols" data-stagger-appear="fade-up" data-stagger-delay="100">
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number">420</div>
                                    <div class="bringer-counter-label">Projects Done</div>
                                </div><!-- .bringer-counter -->
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number" data-suffix="K+">8</div>
                                    <div class="bringer-counter-label">Happy Clients</div>
                                </div><!-- .bringer-counter -->
                                <!-- Counter Item -->
                                <div class="bringer-counter bringer-small-counter" data-delay="3000">
                                    <div class="bringer-counter-number" data-suffix="+">12</div>
                                    <div class="bringer-counter-label">Years in Work</div>
                                </div><!-- .bringer-counter -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- .stg-container -->
@endsection