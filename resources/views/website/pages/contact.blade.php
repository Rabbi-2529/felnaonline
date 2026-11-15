@extends('website.master')
@section('title', 'Contact Us')
@section('meta_description', 'Contact Felna Online, internet service provider in Dhaka. Hotline 01958-666999, email support@felnaonline.com. Office: House # 33 (4th Floor), Road # 4, Dhanmondi, Dhaka-1205.')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Contact Us',
        'subtitle' => 'Questions about a package or your connection? We are here to help.',
    ])

    <section class="fo-section fo-section-bare">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 fo-reveal">
                    <div class="fo-info-card">
                        <span class="fo-stat-icon"><i class="fa-solid fa-phone"></i></span>
                        <div>
                            <h3>Call us</h3>
                            <a href="tel:+8801958666999">+88-01958-666999</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fo-reveal">
                    <div class="fo-info-card">
                        <span class="fo-stat-icon"><i class="fa-regular fa-envelope"></i></span>
                        <div>
                            <h3>Email</h3>
                            <a href="mailto:support@felnaonline.com">support@felnaonline.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fo-reveal">
                    <div class="fo-info-card">
                        <span class="fo-stat-icon"><i class="fa-solid fa-location-dot"></i></span>
                        <div>
                            <h3>Office</h3>
                            <p>House # 33 (4th Floor), Road # 4, Dhanmondi, Dhaka-1205</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fo-reveal">
                    <div class="fo-info-card">
                        <span class="fo-stat-icon"><i class="fa-regular fa-clock"></i></span>
                        <div>
                            <h3>Office hours</h3>
                            <p>9:00 am – 6:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fo-section">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 fo-reveal">
                    <div class="fo-card h-100">
                        <span class="fo-eyebrow">Send a message</span>
                        <h2 class="fo-title" style="font-size:clamp(1.6rem,2.6vw,2.1rem)">If you have any query, please contact us</h2>
                        <form class="fo-form fo-mt">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Your name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Full name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Your email</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="How can we help?">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="message">Message</label>
                                    <textarea class="form-control" id="message" placeholder="Write your message here"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="fo-btn fo-btn-primary" type="submit">Send message <i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 fo-reveal">
                    <div class="fo-map">
                        <iframe title="Felna Online on Google Maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7304.107578089834!2d90.37631629264992!3d23.745461214694796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9c77c473a95%3A0x51459bd1475f68d3!2sFelna%20Online%20Ltd!5e0!3m2!1sen!2sbd!4v1741587053394!5m2!1sen!2sbd"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
