@extends('website.master')
@section('title', $category->title)
@section('meta_description', $category->description ?: $category->title . ' services from Felna Online, internet service provider in Dhaka.')
@section('share_image', $category->image ?? '')

@section('body')
    @include('website.includes.page-hero', [
        'title' => $category->title,
        'subtitle' => $category->description ? \Illuminate\Support\Str::limit($category->description, 160) : null,
        'crumbs' => ['Services' => route('services-our')],
    ])

    <section class="fo-section">
        <div class="container">
            <div class="fo-section-head text-center fo-reveal">
                <span class="fo-eyebrow">Services in {{ $category->title }}</span>
                <h2 class="fo-title">What we offer</h2>
            </div>

            @if ($category->services->isEmpty())
                <div class="fo-empty">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <h3>No services listed in this category yet</h3>
                    <p class="fo-mb">Call us and we will tell you what is available in your area.</p>
                    <a href="{{ route('services-our') }}" class="fo-btn fo-btn-outline fo-btn-sm"><i class="fa-solid fa-arrow-left"></i> All categories</a>
                </div>
            @else
                <div class="row">
                    @foreach ($category->services as $service)
                        <div class="col-md-6 fo-reveal">
                            <article class="fo-media-card">
                                <div class="fo-media-card-img">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
                                </div>
                                <div class="fo-media-card-body">
                                    <h3>{{ $service->name }}</h3>
                                    <p class="mb-0">{{ $service->description }}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
