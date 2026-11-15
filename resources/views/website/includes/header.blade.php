@php
    $packagesActive = request()->routeIs('home-package') || request()->routeIs('corporate-package');
@endphp

<!-- Top bar (desktop only) -->
<div class="fo-topbar d-none d-lg-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="fo-topbar-group">
            <span><i class="fa-solid fa-location-dot"></i>House # 33 (4th Floor), Road # 4, Dhanmondi, Dhaka-1205</span>
            <span><i class="fa-regular fa-clock"></i>9:00 am – 6:00 pm</span>
        </div>
        <div class="fo-topbar-group">
            <a href="mailto:support@felnaonline.com"><i class="fa-regular fa-envelope"></i>support@felnaonline.com</a>
            <a href="https://www.unicodeconverter.info/internet-speed-tester.php?pgn=internet_speed_tester.php" target="_blank" rel="noopener" class="fo-pill"><i class="fa-solid fa-gauge-high"></i>Speed Test</a>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fo-nav sticky-top">
    <div class="container">
        <a href="{{ route('home') }}" class="fo-brand" aria-label="Felna Online home">
            <img src="{{ asset('website-assets/img/logo.png') }}" alt="Felna Online logo">
            <span class="fo-brand-name"><span class="fo-f">Felna</span> <span>Online</span><small>Internet Service Provider</small></span>
        </a>

        <div class="d-flex align-items-center fo-gap d-lg-none">
            <a href="tel:+8801958666999" class="fo-icon-btn" aria-label="Call Felna Online">
                <i class="fa-solid fa-phone"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#foNavbar"
                aria-controls="foNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="foNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ $packagesActive ? 'active' : '' }}" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Packages</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('home-package') }}" class="dropdown-item {{ request()->routeIs('home-package') ? 'active' : '' }}">
                            <span class="fo-dd-icon"><i class="fa-solid fa-house-signal"></i></span>
                            <span>Home Internet<small>Broadband for homes &amp; families</small></span>
                        </a>
                        <a href="{{ route('corporate-package') }}" class="dropdown-item {{ request()->routeIs('corporate-package') ? 'active' : '' }}">
                            <span class="fo-dd-icon"><i class="fa-solid fa-building"></i></span>
                            <span>Corporate Internet<small>Connectivity for offices</small></span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services-our') }}" class="nav-link {{ request()->routeIs('services-our') || request()->routeIs('category.services') ? 'active' : '' }}">Services</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about-us') }}" class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </li>
            </ul>

            <div class="fo-nav-right">
                <a href="tel:+8801958666999" class="fo-hotline d-none d-xl-flex">
                    <span class="fo-icon-btn"><i class="fa-solid fa-headset"></i></span>
                    <span><small>Hotline</small><strong>01958-666999</strong></span>
                </a>
                <a href="{{ route('home-package') }}" class="fo-btn fo-btn-primary fo-btn-sm">
                    <i class="fa-solid fa-wifi"></i> Get Connected
                </a>
            </div>
        </div>
    </div>
</nav>
