@extends('website.master')
@section('title', 'Networking Products')
@section('meta_description', 'Routers, switches and other networking products from Felna Tech, with prices in TK. Available through Felna Online, internet service provider in Dhaka.')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Products',
        'subtitle' => 'Networking products from Felna Tech.',
    ])

    <section class="fo-section">
        <div class="container">
            <div class="fo-section-head fo-reveal">
                <span class="fo-eyebrow">{{ $categoryName ?? 'Products' }}</span>
                <h2 class="fo-title">Our products</h2>
            </div>

            @if (count($productsData) > 0)
                <div class="row">
                    @foreach ($productsData as $product)
                        <div class="col-6 col-md-4 col-xl-3 fo-reveal">
                            @include('website.includes.product-card', ['product' => $product])
                        </div>
                    @endforeach
                </div>

                @if (!empty($prevPageUrl) || !empty($nextPageUrl))
                    <nav class="fo-pager" aria-label="Product pages">
                        @if (!empty($prevPageUrl))
                            <a href="{{ route('products', ['page' => basename($prevPageUrl)]) }}" class="fo-btn fo-btn-outline"><i class="fa-solid fa-arrow-left"></i> Previous</a>
                        @endif
                        @if (!empty($nextPageUrl))
                            <a href="{{ route('products', ['page' => basename($nextPageUrl)]) }}" class="fo-btn fo-btn-primary">Next <i class="fa-solid fa-arrow-right"></i></a>
                        @endif
                    </nav>
                @endif
            @else
                <div class="fo-empty">
                    <i class="fa-solid fa-box-open"></i>
                    <h3>No products found</h3>
                    <p class="mb-0">Please try again later, or visit <a href="https://felnatech.com/" target="_blank" rel="noopener">felnatech.com</a>.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
