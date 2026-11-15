@unless (request()->routeIs('contact'))
    <!-- Call to action -->
    <section class="fo-cta-wrap">
        <div class="container px-0">
            <div class="fo-cta fo-reveal">
                <div class="row align-items-center">
                    <div class="col-lg-7 position-relative" style="z-index:1">
                        <h2>Need help choosing an internet package?</h2>
                        <p>Call our hotline and get connected. We're available 9:00 am – 6:00 pm.</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="fo-cta-actions">
                            <a href="tel:+8801958666999" class="fo-btn fo-btn-light"><i class="fa-solid fa-phone"></i> +88-01958-666999</a>
                            <a href="{{ route('contact') }}" class="fo-btn fo-btn-ghost">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endunless

<footer class="fo-footer">
    <div class="fo-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{ route('home') }}" class="fo-footer-brand">
                        <span class="fo-logo-tile"><img src="{{ asset('website-assets/img/logo.png') }}" alt="Felna Online logo"></span>
                        <strong><span class="fo-f">Felna</span> <span>Online</span></strong>
                    </a>
                    <ul class="fo-footer-contact">
                        <li><i class="fa-solid fa-location-dot"></i><span>House # 33 (4th Floor), Road # 4, Dhanmondi, Dhaka-1205</span></li>
                        <li><i class="fa-solid fa-phone"></i><a href="tel:+8801958666999">+88-01958-666999</a></li>
                        <li><i class="fa-regular fa-envelope"></i><a href="mailto:support@felnaonline.com">support@felnaonline.com</a></li>
                    </ul>
                    <div class="fo-social">
                        <a href="https://www.facebook.com/FelnaOnline" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://x.com/iglwebltd" target="_blank" rel="noopener" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://bd.linkedin.com/company/igl-web-ltd" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <div class="fo-footer-fb">
                        <iframe title="Felna Online on Facebook" loading="lazy"
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFelnaOnline&tabs&width=340&height=130&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true"
                            scrolling="no" allow="encrypted-media"></iframe>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h3>About IGL Group</h3>
                    <ul class="fo-footer-links">
                        <li><a href="{{ route('about-us') }}">About IGL Network</a></li>
                        <li><a href="https://iglweb.com/web/igl-about-us.php" target="_blank" rel="noopener">About IGL Web Ltd.</a></li>
                        <li><a href="https://iglweb.com/web/igl-mission-vision-goal.php" target="_blank" rel="noopener">Mission, Vision &amp; Goal</a></li>
                        <li><a href="https://iglweb.com/web/igl-board-of-director.php" target="_blank" rel="noopener">Board of Directors</a></li>
                        <li><a href="https://rambd.com/login.php" target="_blank" rel="noopener">Board of Advisers</a></li>
                        <li><a href="https://iglweb.com/web/igl-board-of-staff.php" target="_blank" rel="noopener">Officers &amp; Staff</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h3>Sister Concerns</h3>
                    <ul class="fo-footer-links">
                        <li><a href="https://iglweb.com" target="_blank" rel="noopener">IGL Web<sup>TM</sup> Ltd.</a></li>
                        <li><a href="https://iglhost.com" target="_blank" rel="noopener">IGL Host<sup>TM</sup> LLC</a></li>
                        <li><a href="https://unicodeconverter.info/" target="_blank" rel="noopener">Unicode Converter</a></li>
                        <li><a href="https://rambd.com/login.php" target="_blank" rel="noopener">RamBD Ltd.</a></li>
                        <li><a href="https://studentvisabd.com/" target="_blank" rel="noopener">Student Visa BD</a></li>
                        <li><a href="https://i-news24.com/" target="_blank" rel="noopener">iNews24 Ltd.</a></li>
                        <li><a href="https://felnatech.com/" target="_blank" rel="noopener">Felna Tech</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h3>Our Solutions</h3>
                    <ul class="fo-footer-links">
                        <li><a href="https://iglweb.com/web/software-pos.php" target="_blank" rel="noopener">POS Software</a></li>
                        <li><a href="https://iglweb.com/web/software-accounting.php" target="_blank" rel="noopener">Accounting Software</a></li>
                        <li><a href="https://iglweb.com/web/software-office-management-solution.php" target="_blank" rel="noopener">Office Management</a></li>
                        <li><a href="https://iglweb.com/web/software-cheque-writer.php" target="_blank" rel="noopener">Bank Cheque Writing</a></li>
                        <li><a href="https://iglweb.com/web/software-client-care-solution-online.php" target="_blank" rel="noopener">Customer Care Solution</a></li>
                        <li><a href="https://iglweb.com" target="_blank" rel="noopener">School/College Management</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h3>Important Links</h3>
                    <ul class="fo-footer-links">
                        <li><a href="https://iglweb.com" target="_blank" rel="noopener">Software Company</a></li>
                        <li><a href="https://unicodeconverter.info/" target="_blank" rel="noopener">Bangla Converter</a></li>
                        <li><a href="https://studentvisabd.com/" target="_blank" rel="noopener">Student Visa BD</a></li>
                        <li><a href="https://i-news24.com" target="_blank" rel="noopener">iNews24</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="fo-footer-bottom">
        <div class="container">
            <span>© {{ date('Y') }} IGL Network. All rights reserved.</span>
            <span>
                <a href="https://iglweb.com/web/domainchecker.php" target="_blank" rel="noopener">Domain Registration</a>,
                <a href="https://iglweb.com/web/hosting-regular-shared.php" target="_blank" rel="noopener">Web Hosting</a> and
                <a href="https://iglweb.com/web/training-web-design.php" target="_blank" rel="noopener">Web Design</a> by
                <a href="https://iglweb.com" target="_blank" rel="noopener">IGL Web Ltd</a>
            </span>
        </div>
    </div>
</footer>

<button type="button" class="fo-to-top" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
