@extends('website.master')
@section('title', 'Our Services')
@section('meta_description', 'Services from Felna Online, internet service provider in Dhaka' . ($categories->count() ? ': ' . $categories->pluck('title')->implode(', ') . '.' : '.') . ' Call 01958-666999.')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Our Services',
        'subtitle' => 'Explore what we offer, grouped by category.',
    ])

    <section class="fo-section">
        <div class="container">
            <div class="fo-section-head text-center fo-reveal">
                <span class="fo-eyebrow">Explore our categories</span>
                <h2 class="fo-title">Choose a category</h2>
            </div>

            @if ($categories->isEmpty())
                <div class="fo-empty">
                    <i class="fa-solid fa-layer-group"></i>
                    <h3>No service categories yet</h3>
                    <p class="mb-0">Please check back soon.</p>
                </div>
            @else
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4 fo-reveal">
                            <a href="{{ route('category.services', $category->id) }}" class="fo-media-card text-reset">
                                <div class="fo-media-card-img">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->title }}" loading="lazy">
                                </div>
                                <div class="fo-media-card-body">
                                    <h3>{{ $category->title }}</h3>
                                    <p>{{ \Illuminate\Support\Str::limit($category->description, 120) }}</p>
                                    <span class="fo-link-arrow">View services <i class="fa-solid fa-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
