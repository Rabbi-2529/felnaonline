<aside class="fa-sidebar" aria-label="Admin navigation">
    <div class="fa-sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">
            <span class="fa-logo-tile"><img src="{{ asset('website-assets/img/logo.png') }}" alt="Felna Online logo"></span>
            <span>
                <strong><span class="fa-f">Felna</span> <span>Online</span></strong>
                <small>Admin panel</small>
            </span>
        </a>
        <button type="button" class="fa-sidebar-close" data-fa-nav-close aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <nav class="fa-nav">
        @foreach (\App\Support\AdminNav::groups() as $group)
            @if ($group['label'])
                <span class="fa-nav-label">{{ $group['label'] }}</span>
            @endif
            @foreach ($group['items'] as $item)
                @continue(!Route::has($item['route']))
                <a href="{{ route($item['route']) }}"
                    class="fa-nav-link {{ \App\Support\AdminNav::isActive($item) ? 'active' : '' }}"
                    @if (\App\Support\AdminNav::isActive($item)) aria-current="page" @endif>
                    <i class="fa-solid {{ $item['icon'] }}"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        @endforeach
    </nav>

    <div class="fa-sidebar-foot">
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="fa-nav-link">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>View website</span>
        </a>
    </div>
</aside>
