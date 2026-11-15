@extends('website.master')

@section('title', 'Felna Online')
@php
    $homeSpeeds = $allHomePackages->map(fn ($p) => preg_match('/([\d.]+)/', (string) $p->bandwidth, $m) ? (float) $m[1] : null)->filter();
    $homeMinPrice = $allHomePackages->min('price');
    $homeMeta = 'Felna Online is an internet service provider in Dhaka. Home internet';
    if ($homeSpeeds->count()) {
        $homeMeta .= ' up to ' . rtrim(rtrim(number_format($homeSpeeds->max(), 1), '0'), '.') . ' Mbps';
    }
    if (is_numeric($homeMinPrice)) {
        $homeMeta .= ' from ' . number_format((float) $homeMinPrice) . ' TK';
    }
    $homeMeta .= ', plus corporate internet for offices. Call our hotline 01958-666999 to get connected.';
@endphp
@section('meta_description', $homeMeta)

@section('body')
    @php
        $iconFor = function ($title) {
            $t = strtolower((string) $title);
            $map = [
                'fa-bolt' => ['speed', 'fast'],
                'fa-signal' => ['reliab', 'perform', 'uptime', 'stable'],
                'fa-map-location-dot' => ['coverage', 'area'],
                'fa-headset' => ['support', '24/7', 'help'],
                'fa-wallet' => ['afford', 'plan', 'price', 'budget', 'cost'],
                'fa-shield-halved' => ['secur', 'protect', 'safe'],
            ];
            foreach ($map as $icon => $words) {
                foreach ($words as $w) {
                    if (str_contains($t, $w)) {
                        return $icon;
                    }
                }
            }
            return 'fa-circle-check';
        };

        $speedOf = function ($package) {
            return preg_match('/([\d.]+)/', (string) $package->bandwidth, $m) ? (float) $m[1] : 0;
        };
        $maxSpeed = $allHomePackages->map($speedOf)->max() ?: null;
        $minPrice = $allHomePackages->min('price');
        $heroBadges = $features->take(3);
    @endphp

    <!-- Hero -->
    <section class="fo-section fo-section-bare">
        <div class="container">
            <div class="fo-hero">
                @php $slides = $sliders->count() ? $sliders : collect([null]); @endphp
                <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
                    <div class="carousel-inner">
                        @foreach ($slides as $index => $slider)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="fo-hero-slide {{ $slider ? '' : 'fo-hero-fallback' }}">
                                    @if ($slider)
                                        <img class="fo-hero-media" src="{{ asset($slider->image) }}" alt=""
                                            {{ $index == 0 ? 'fetchpriority=high' : 'loading=lazy' }}>
                                        <div class="fo-hero-overlay"></div>
                                    @endif
                                    <div class="fo-hero-content">
                                        <span class="fo-hero-eyebrow">
                                            <span class="fo-dot"><i class="fa-solid fa-wifi"></i></span>
                                            {{ $slider->title ?? 'Felna Online Internet' }}
                                        </span>
                                        <h1 class="fo-hero-title">{{ $slider->subtitle ?? 'Fast, reliable internet for home and business' }}</h1>
                                        <div class="fo-hero-actions">
                                            <a href="{{ route('home-package') }}" class="fo-btn fo-btn-primary"><i class="fa-solid fa-wifi"></i> See internet packages</a>
                                            <a href="tel:+8801958666999" class="fo-btn fo-btn-ghost"><i class="fa-solid fa-headset"></i> Hotline 01958-666999</a>
                                        </div>
                                        @if ($heroBadges->count())
                                            <div class="fo-hero-badges">
                                                @foreach ($heroBadges as $badge)
                                                    <span><i class="fa-solid {{ $iconFor($badge->title) }}"></i>{{ $badge->title }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($sliders->count() > 1)
                    <div class="fo-hero-controls d-none d-lg-flex">
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous slide"><i class="fa-solid fa-arrow-left"></i></button>
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next slide"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                @endif

                @if ($allHomePackages->count())
                    <div class="fo-hero-side">
                        <div class="fo-speed-card">
                            <div class="fo-speed-top">
                                <strong><span class="fo-live"></span> Home internet</strong>
                                <span class="fo-chip"><i class="fa-solid fa-location-dot"></i> Dhaka</span>
                            </div>

                            @if ($maxSpeed)
                                <div class="fo-gauge" aria-hidden="true">
                                    <svg viewBox="0 0 220 125">
                                        <defs>
                                            <linearGradient id="foGaugeGrad" x1="0" y1="0" x2="1" y2="0">
                                                <stop offset="0%" stop-color="#00a651" />
                                                <stop offset="70%" stop-color="#2fc06f" />
                                                <stop offset="100%" stop-color="#ed1c24" />
                                            </linearGradient>
                                        </defs>
                                        @for ($i = 0; $i <= 10; $i++)
                                            @php
                                                $a = M_PI - $i * M_PI / 10;
                                            @endphp
                                            <line class="fo-gauge-tick"
                                                x1="{{ round(110 + 64 * cos($a), 2) }}" y1="{{ round(110 - 64 * sin($a), 2) }}"
                                                x2="{{ round(110 + ($i % 5 == 0 ? 74 : 70) * cos($a), 2) }}" y2="{{ round(110 - ($i % 5 == 0 ? 74 : 70) * sin($a), 2) }}" />
                                        @endfor
                                        <path class="fo-gauge-track" d="M 20 110 A 90 90 0 0 1 200 110" />
                                        <path class="fo-gauge-fill" d="M 20 110 A 90 90 0 0 1 200 110" />
                                    </svg>
                                    <div class="fo-gauge-value">
                                        <small>Speed up to</small>
                                        <strong>{{ rtrim(rtrim(number_format($maxSpeed, 1), '0'), '.') }}</strong><span>Mbps</span>
                                    </div>
                                </div>
                            @endif

                            <div class="fo-speed-meta">
                                <div>
                                    <small>Starting from</small>
                                    <strong>{{ is_numeric($minPrice) ? number_format((float) $minPrice) : $minPrice }} TK</strong>
                                </div>
                                <div>
                                    <small>Packages</small>
                                    <strong>{{ $allHomePackages->count() }} plans</strong>
                                </div>
                            </div>

                            @php
                                $planLabel = function ($p) {
                                    $price = is_numeric($p->price) ? number_format((float) $p->price) : $p->price;
                                    return ['speed' => $p->bandwidth, 'price' => $price . ' TK'];
                                };
                                $firstPlan = $allHomePackages->first();
                            @endphp
                            <span class="fo-picker-label" id="heroPlanLabel">Choose your package</span>
                            <div class="dropdown fo-picker">
                                <button type="button" class="fo-picker-btn" id="heroPlanBtn" data-bs-toggle="dropdown"
                                    aria-expanded="false" aria-labelledby="heroPlanLabel heroPlanBtn">
                                    <span class="fo-picker-icon"><i class="fa-solid fa-wifi"></i></span>
                                    <span class="fo-picker-text">
                                        <strong data-picker-name>{{ $firstPlan->name }}</strong>
                                        <small data-picker-meta>{{ $planLabel($firstPlan)['speed'] }} · {{ $planLabel($firstPlan)['price'] }}</small>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fo-picker-caret" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu fo-picker-menu" aria-labelledby="heroPlanBtn">
                                    @foreach ($allHomePackages as $p)
                                        @php
                                            $lbl = $planLabel($p);
                                            preg_match('/^\s*([\d.,]+)\s*(.*)$/', (string) $p->bandwidth, $sm);
                                        @endphp
                                        <li>
                                            <button type="button" class="dropdown-item fo-picker-item {{ $loop->first ? 'active' : '' }}"
                                                data-href="{{ route('home-package') }}#order-{{ $p->id }}"
                                                data-name="{{ $p->name }}" data-meta="{{ $lbl['speed'] }} · {{ $lbl['price'] }}"
                                                aria-current="{{ $loop->first ? 'true' : 'false' }}">
                                                <span class="fo-picker-speed">
                                                    @if (!empty($sm))
                                                        {{ $sm[1] }}<small>{{ trim($sm[2]) ?: 'Mbps' }}</small>
                                                    @else
                                                        <i class="fa-solid fa-wifi"></i>
                                                    @endif
                                                </span>
                                                <span class="fo-picker-item-text">
                                                    <strong>{{ $p->name }}</strong>
                                                    <small>{{ $lbl['price'] }}</small>
                                                </span>
                                                <i class="fa-solid fa-circle-check fo-picker-check" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a id="heroPlanGo" href="{{ route('home-package') }}#order-{{ $firstPlan->id }}" class="fo-btn fo-btn-primary fo-btn-block">
                                Order this package <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <a href="{{ route('corporate-package') }}" class="fo-link-arrow justify-content-center">Need office internet? Corporate plans <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="fo-section fo-section-bare">
        <div class="container">
            <div class="fo-stats">
                <div class="fo-stat fo-reveal">
                    <span class="fo-stat-icon"><i class="fa-solid fa-users"></i></span>
                    <div>
                        <div class="fo-stat-num" data-count="85">85</div>
                        <div class="fo-stat-label">Happy Clients</div>
                    </div>
                </div>
                <div class="fo-stat fo-reveal">
                    <span class="fo-stat-icon"><i class="fa-solid fa-circle-check"></i></span>
                    <div>
                        <div class="fo-stat-num" data-count="90">90</div>
                        <div class="fo-stat-label">Projects Completed</div>
                    </div>
                </div>
                <div class="fo-stat fo-reveal">
                    <span class="fo-stat-icon"><i class="fa-solid fa-user-gear"></i></span>
                    <div>
                        <div class="fo-stat-num" data-count="78">78</div>
                        <div class="fo-stat-label">Dedicated Staff</div>
                    </div>
                </div>
                <div class="fo-stat fo-reveal">
                    <span class="fo-stat-icon"><i class="fa-solid fa-award"></i></span>
                    <div>
                        <div class="fo-stat-num" data-count="14">14</div>
                        <div class="fo-stat-label">Awards Achieved</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages preview -->
    @if ($homePackages->count())
        <section class="fo-section">
            <div class="container">
                <div class="fo-head-row fo-reveal">
                    <div class="fo-section-head">
                        <span class="fo-eyebrow">Internet packages</span>
                        <h2 class="fo-title">Pick the speed that fits your home</h2>
                        <p class="fo-lead">Simple packages with BDIX, FTP and streaming benefits included.</p>
                    </div>
                    <div class="fo-switch">
                        <a href="{{ route('home-package') }}" class="active">Home</a>
                        <a href="{{ route('corporate-package') }}">Corporate</a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($homePackages as $package)
                        <div class="col-12 col-sm-6 col-xl-3 fo-reveal">
                            @include('website.includes.plan-card', [
                                'package' => $package,
                                'tag' => 'Home',
                                'orderUrl' => route('home-package') . '#order-' . $package->id,
                            ])
                        </div>
                    @endforeach
                </div>
                <div class="text-center fo-mt">
                    <a href="{{ route('home-package') }}" class="fo-btn fo-btn-outline">See all home packages <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
    @endif

    <!-- How to get connected -->
    <section class="fo-section">
        <div class="container">
            <div class="fo-section-head fo-reveal">
                <span class="fo-eyebrow">Get connected</span>
                <h2 class="fo-title">New connection in 3 easy steps</h2>
            </div>
            <div class="fo-steps">
                <div class="fo-step fo-reveal">
                    <div class="fo-step-top">
                        <span class="fo-step-icon"><i class="fa-solid fa-gauge-high"></i></span>
                        <span class="fo-step-num">01</span>
                    </div>
                    <h3>Choose a package</h3>
                    <p>Pick a home or corporate package that fits your speed and budget.</p>
                </div>
                <div class="fo-step fo-reveal">
                    <div class="fo-step-top">
                        <span class="fo-step-icon"><i class="fa-solid fa-file-pen"></i></span>
                        <span class="fo-step-num">02</span>
                    </div>
                    <h3>Place your order</h3>
                    <p>Fill in the short order form with your name, mobile number and address.</p>
                </div>
                <div class="fo-step fo-reveal">
                    <div class="fo-step-top">
                        <span class="fo-step-icon"><i class="fa-solid fa-tower-broadcast"></i></span>
                        <span class="fo-step-num">03</span>
                    </div>
                    <h3>Get connected</h3>
                    <p>Our team calls you to confirm and sets up your internet connection.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why choose us + features -->
    <section class="fo-section">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-5 fo-reveal">
                    <span class="fo-eyebrow">Why choose us</span>
                    <h2 class="fo-title">Why people choose Felna Online</h2>
                    <p class="fo-lead fo-mb">Reliable connectivity, honest pricing and a support team that picks up the phone.</p>
                    @foreach ($whyChooseUs as $reason)
                        <div class="fo-reason">
                            @if ($reason->title)
                                <h3>{{ $reason->title }}</h3>
                            @endif
                            <p>{{ \Illuminate\Support\Str::limit($reason->description, 150) }}</p>
                            <a class="fo-link-arrow" href="{{ route('why-choice-us-des', ['id' => $reason->id]) }}">Read more <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        @foreach ($features as $feature)
                            <div class="col-12 col-md-6 fo-reveal">
                                <div class="fo-feature">
                                    <span class="fo-feature-icon"><i class="fa-solid {{ $iconFor($feature->title) }}"></i></span>
                                    <h3>{{ $feature->title }}</h3>
                                    <p>{{ $feature->subtitle }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    @if (count($productsData) > 0)
        <section class="fo-section">
            <div class="container">
                <div class="fo-head-row fo-reveal">
                    <div class="fo-section-head">
                        <span class="fo-eyebrow">Networking products</span>
                        <h2 class="fo-title">Routers, switches &amp; more</h2>
                        <p class="fo-lead">Networking products from Felna Tech.</p>
                    </div>
                    <div class="d-flex align-items-center fo-gap">
                        <a href="{{ route('products') }}" class="fo-btn fo-btn-outline d-none d-md-inline-flex">View all</a>
                        <div class="fo-track-nav">
                            <button type="button" data-track-prev="#productTrack" aria-label="Previous products"><i class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" data-track-next="#productTrack" aria-label="Next products"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="fo-track" id="productTrack">
                    @foreach ($productsData as $product)
                        @include('website.includes.product-card', ['product' => $product])
                    @endforeach
                </div>
                <div class="text-center d-md-none fo-mt">
                    <a href="{{ route('products') }}" class="fo-btn fo-btn-outline">View all products</a>
                </div>
            </div>
        </section>
    @endif

    {{--
        Team and testimonial sections were switched off before the redesign.
        The original markup is kept in storage/app/backups/website-redesign-2026-11-15/resources/views/index.blade.php
    --}}
@endsection

@push('scripts')
    <script>
        (function () {
            var btn = document.getElementById('heroPlanBtn');
            var go = document.getElementById('heroPlanGo');
            if (!btn || !go) return;
            var nameEl = btn.querySelector('[data-picker-name]');
            var metaEl = btn.querySelector('[data-picker-meta]');
            document.querySelectorAll('.fo-picker-item').forEach(function (item) {
                item.addEventListener('click', function () {
                    document.querySelectorAll('.fo-picker-item').forEach(function (i) {
                        i.classList.remove('active');
                        i.setAttribute('aria-current', 'false');
                    });
                    item.classList.add('active');
                    item.setAttribute('aria-current', 'true');
                    nameEl.textContent = item.dataset.name;
                    metaEl.textContent = item.dataset.meta;
                    go.href = item.dataset.href;
                });
            });
        })();
    </script>
@endpush
