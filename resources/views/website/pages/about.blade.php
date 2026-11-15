@extends('website.master')
@section('title', 'About Us')
@section('meta_description', $about ? $about->title . ' — ' . $about->story : 'Learn about Felna Online, an internet service provider in Dhaka and a sister concern of IGL Group.')
@section('share_image', $about->image ?? '')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'About Us',
        'subtitle' => 'Get to know the team behind Felna Online.',
    ])

    @if ($about)
        <section class="fo-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 fo-reveal">
                        <div class="fo-about-media">
                            <img src="{{ asset($about->image) }}" alt="{{ $about->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6 fo-reveal">
                        <span class="fo-eyebrow">About us</span>
                        <h2 class="fo-title">{{ $about->title }}</h2>
                        <div class="fo-prose">{!! nl2br(e($about->story)) !!}</div>
                    </div>
                </div>
            </div>
        </section>

        @if ($about->mission || $about->vision)
            <section class="fo-section">
                <div class="container">
                    <div class="row">
                        @if ($about->mission)
                            <div class="col-md-6 fo-reveal">
                                <div class="fo-card fo-card-hover h-100">
                                    <span class="fo-mv-icon green"><i class="fa-solid fa-bullseye"></i></span>
                                    <h3 class="h4 fw-bold">Our Mission</h3>
                                    <div class="fo-prose">{!! nl2br(e($about->mission)) !!}</div>
                                </div>
                            </div>
                        @endif
                        @if ($about->vision)
                            <div class="col-md-6 fo-reveal">
                                <div class="fo-card fo-card-hover h-100">
                                    <span class="fo-mv-icon red"><i class="fa-solid fa-eye"></i></span>
                                    <h3 class="h4 fw-bold">Our Vision</h3>
                                    <div class="fo-prose">{!! nl2br(e($about->vision)) !!}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="fo-section">
            <div class="container">
                <div class="fo-empty">
                    <i class="fa-solid fa-circle-info"></i>
                    <h3>About information is coming soon</h3>
                    <p class="mb-0">In the meantime, call us at <a href="tel:+8801958666999">+88-01958-666999</a>.</p>
                </div>
            </div>
        </section>
    @endif
@endsection
