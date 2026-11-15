{{--
    Inner page banner.
    @include('website.includes.page-hero', ['title' => 'About', 'subtitle' => '...', 'icon' => 'fa-wifi', 'crumbs' => ['Services' => route('services-our')]])
--}}
<section class="fo-section">
    <div class="container fo-page-hero">
        <ol class="fo-crumbs" aria-label="Breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            @foreach ($crumbs ?? [] as $label => $url)
                <li><a href="{{ $url }}">{{ $label }}</a></li>
            @endforeach
            <li aria-current="page">{{ $title }}</li>
        </ol>
        <h1>{{ $title }}</h1>
        @if (!empty($subtitle))
            <p>{{ $subtitle }}</p>
        @endif
        <i class="fa-solid {{ $icon ?? 'fa-wifi' }} fo-page-hero-icon" aria-hidden="true"></i>
    </div>
</section>
