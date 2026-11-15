{{-- Page title, breadcrumbs and main buttons, built from App\Support\AdminNav --}}
@if ($adminPage['action'] !== 'other' && $adminPage['action'] !== 'dashboard')
    <div class="fa-page-head">
        <div class="fa-page-head-left">
            <span class="fa-page-icon"><i class="fa-solid {{ $adminPage['icon'] }}"></i></span>
            <div class="min-w-0">
                <h1>{{ $adminPage['title'] }}</h1>
                <ol class="fa-crumbs" aria-label="Breadcrumb">
                    @foreach ($adminPage['crumbs'] as $crumb)
                        <li>
                            @if ($crumb['url'] && !$loop->last)
                                <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                            @else
                                <span aria-current="page">{{ $crumb['label'] }}</span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
        @if (count($adminPage['buttons']))
            <div class="fa-page-actions">
                @foreach ($adminPage['buttons'] as $button)
                    <a href="{{ $button['url'] }}" class="btn btn-{{ $button['style'] }}">
                        <i class="fa-solid {{ $button['icon'] }}"></i> {{ $button['label'] }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endif
