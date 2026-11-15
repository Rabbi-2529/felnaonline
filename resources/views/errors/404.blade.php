@extends('website.master')
@section('title', 'Page not found')
@section('robots', 'noindex, follow')

@section('body')
    <section class="fo-section">
        <div class="container text-center">
            <div class="mx-auto" style="max-width: 560px">
                <div class="fo-404-code">404</div>
                <h1 class="fo-title">Page not found</h1>
                <p class="fo-lead fo-mb">Sorry, the page you are looking for does not exist or has been moved.</p>
                <div class="d-flex flex-wrap justify-content-center fo-gap">
                    <a class="fo-btn fo-btn-primary" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Go to home</a>
                    <a class="fo-btn fo-btn-outline" href="{{ route('home-package') }}">View packages</a>
                </div>
            </div>
        </div>
    </section>
@endsection
