@extends('website.master')
@section('title', 'Why Choose Us')
@section('meta_description', ($whyChooseUs->title ? $whyChooseUs->title . ' — ' : '') . $whyChooseUs->description)

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Why Choose Us',
        'subtitle' => 'Reasons why you should choose Felna Online.',
    ])

    <section class="fo-section">
        <div class="container">
            <article class="fo-article fo-card fo-reveal">
                <span class="fo-eyebrow">Why Felna Online</span>
                <h2>{{ $whyChooseUs->title }}</h2>
                <div class="fo-prose">{!! nl2br(e($whyChooseUs->description)) !!}</div>
                <div class="d-flex flex-wrap fo-gap fo-mt">
                    <a href="{{ route('home-package') }}" class="fo-btn fo-btn-primary">See packages <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="{{ route('home') }}" class="fo-btn fo-btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to home</a>
                </div>
            </article>
        </div>
    </section>
@endsection
