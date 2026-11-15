@php
    // ---- Page meta (title, description, share image) ----
    // Pages can set: @section('title'), @section('meta_description'), @section('share_image'), @section('robots').
    // SEO records saved in the admin panel take priority over these defaults.
    $siteName = 'Felna Online';
    $section = fn ($name) => trim(html_entity_decode($__env->yieldContent($name), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    $clean = fn ($text, $limit) => \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags((string) $text))), $limit, '…');
    $hasSeo = isset($seo) && $seo;

    $pageTitle = $section('title');
    if ($hasSeo && filled($seo->meta_title)) {
        $fullTitle = $seo->meta_title;
    } elseif ($pageTitle === '' || $pageTitle === $siteName) {
        $fullTitle = $siteName . ' | Internet Service Provider in Dhaka';
    } else {
        $fullTitle = $pageTitle . ' | ' . $siteName;
    }
    $fullTitle = $clean($fullTitle, 90);

    $defaultDescription = 'Felna Online is an internet service provider in Dhaka with fast, reliable home and corporate broadband packages. Call our hotline 01958-666999 to get connected.';
    $metaDescription = $hasSeo && filled($seo->meta_description)
        ? $seo->meta_description
        : ($section('meta_description') ?: $defaultDescription);
    $metaDescription = $clean($metaDescription, 200);

    $metaKeywords = $hasSeo && filled($seo->meta_keywords)
        ? $seo->meta_keywords
        : 'Felna Online, internet service provider, ISP Dhaka, broadband Dhaka, home internet, corporate internet, BDIX';

    // Only accept real robots values (index, noindex, follow, nofollow, ...); anything else falls back to the default.
    $robots = $section('robots') ?: ($hasSeo && filled($seo->meta_robots) ? $seo->meta_robots : 'index, follow');
    $robotTokens = array_filter(array_map('trim', explode(',', strtolower($robots))));
    $validRobot = '/^(index|noindex|follow|nofollow|all|none|noarchive|nosnippet|noimageindex|notranslate|max-snippet:-?\d+|max-image-preview:(none|standard|large)|max-video-preview:-?\d+)$/';
    foreach ($robotTokens as $token) {
        if (!preg_match($validRobot, $token)) { $robots = 'index, follow'; break; }
    }

    // Share image: a page image is used only if it is wide enough for link previews (about 1.91:1); otherwise the branded default.
    $defaultImage = 'website-assets/img/og-share.jpg';
    $imagePath = $defaultImage;
    $candidate = ltrim($section('share_image'), '/');
    if ($candidate !== '' && is_file(public_path($candidate))) {
        $size = @getimagesize(public_path($candidate));
        if ($size && $size[0] >= 600 && $size[0] / max($size[1], 1) >= 1.3) {
            $imagePath = $candidate;
        }
    }
    $imageSize = @getimagesize(public_path($imagePath)) ?: [1200, 630, 'mime' => 'image/jpeg'];
    $imageUrl = asset($imagePath);
    $imageAlt = $imagePath === $defaultImage ? 'Felna Online — fast, reliable internet for home and business in Dhaka' : $fullTitle;

    $canonical = request()->filled('page') ? request()->fullUrl() : url()->current();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="{{ $robots }}">
    <meta name="theme-color" content="#062618">
    <link rel="canonical" href="{{ $canonical }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn, Messenger) -->
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $imageUrl }}">
    <meta property="og:image:secure_url" content="{{ str_replace('http://', 'https://', $imageUrl) }}">
    <meta property="og:image:type" content="{{ $imageSize['mime'] ?? 'image/jpeg' }}">
    <meta property="og:image:width" content="{{ $imageSize[0] }}">
    <meta property="og:image:height" content="{{ $imageSize[1] }}">
    <meta property="og:image:alt" content="{{ $imageAlt }}">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $imageUrl }}">
    <meta name="twitter:image:alt" content="{{ $imageAlt }}">

    <!-- Favicon -->
    <link href="{{ asset('website-assets/img/logo.png') }}" rel="icon">

    <script>document.documentElement.classList.add('js');</script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 + Felna theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('website-assets/css/felna.css') }}?v={{ @filemtime(public_path('website-assets/css/felna.css')) }}" rel="stylesheet">
    @stack('head')
    @yield('custom-css')
</head>

<body>
    @include('website.includes.header')

    <main class="fo-main">
        @yield('body')
    </main>

    @include('website.includes.footer')

    <!-- Tawk.to live chat -->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/58ac8e5ada22730aacd02d82/1gkus7v64';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website-assets/js/felna.js') }}?v={{ @filemtime(public_path('website-assets/js/felna.js')) }}"></script>
    @stack('scripts')
    @yield('custom-js')
</body>

</html>
