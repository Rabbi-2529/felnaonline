@php
    $adminPage = \App\Support\AdminNav::page();
    $customTitle = trim(html_entity_decode($__env->yieldContent('title') ?: $__env->yieldContent('feature'), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    $docTitle = ($adminPage['action'] === 'other' && $customTitle ? $customTitle : $adminPage['title']) . ' · Felna Admin';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $docTitle }}</title>
    <link rel="icon" href="{{ asset('website-assets/img/logo.png') }}">

    <!-- Fonts & icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/felna-admin.css') }}?v={{ @filemtime(public_path('admin-assets/css/felna-admin.css')) }}">

    <!-- SweetAlert2 must load before page content, because flash messages call it inline -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('head')
</head>

<body class="fa-body fa-page-{{ $adminPage['action'] }}">
    @include('admin.includes.sidebar')
    <div class="fa-backdrop" aria-hidden="true"></div>

    <div class="fa-main">
        @include('admin.includes.header')

        <main class="fa-content">
            @include('admin.includes.page-header', ['adminPage' => $adminPage])
            <div class="fa-page">
                @yield('body')
            </div>
        </main>

        @include('admin.includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin-assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin-assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script src="{{ asset('admin-assets/js/felna-admin.js') }}?v={{ @filemtime(public_path('admin-assets/js/felna-admin.js')) }}"></script>
    @include('admin.includes.flash')
    @stack('scripts')
</body>

</html>
