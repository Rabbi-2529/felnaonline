@php
    $adminUser = Auth::user();
    $initials = collect(preg_split('/\s+/', trim($adminUser->name ?? 'A')))->filter()->take(2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->implode('');
@endphp
<header class="fa-topbar">
    <button type="button" class="fa-icon-btn fa-menu-btn" data-fa-nav-toggle aria-label="Open menu">
        <i class="fa-solid fa-bars"></i>
    </button>

    <div class="fa-topbar-title">
        <i class="fa-regular fa-calendar" style="color:var(--fa-green)"></i>
        <span>{{ now()->setTimezone('Asia/Dhaka')->format('l, j F Y') }}</span>
    </div>

    <div class="fa-topbar-right">
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="fa-icon-btn" title="View website" aria-label="View website">
            <i class="fa-solid fa-globe"></i>
        </a>
        <div class="dropdown">
            <button type="button" class="fa-user-btn" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fa-avatar">{{ $initials ?: 'A' }}</span>
                <span class="fa-user-name">{{ $adminUser->name ?? 'Admin' }}</span>
                <i class="fa-solid fa-chevron-down" style="font-size:.7rem;color:var(--fa-muted)"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end fa-dropdown">
                <div class="fa-dropdown-head">
                    <span class="fa-avatar">{{ $initials ?: 'A' }}</span>
                    <span>
                        <strong>{{ $adminUser->name ?? 'Admin' }}</strong>
                        <small>{{ $adminUser->email ?? '' }}</small>
                    </span>
                </div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-solid fa-user-gear"></i> My profile</a>
                <a class="dropdown-item" href="{{ route('home') }}" target="_blank" rel="noopener"><i class="fa-solid fa-globe"></i> View website</a>
                <form action="{{ route('logout') }}" method="post" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger"><i class="fa-solid fa-right-from-bracket"></i> Log out</button>
                </form>
            </div>
        </div>
    </div>
</header>
