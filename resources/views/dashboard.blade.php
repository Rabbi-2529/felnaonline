@extends('admin.master')
@section('title', 'Dashboard')

@section('body')
    @php
        $dhaka = now()->setTimezone('Asia/Dhaka');
        $hour = $dhaka->hour;
        $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
        $firstName = \Illuminate\Support\Str::of(Auth::user()->name ?? 'Admin')->before(' ');
    @endphp

    <!-- Welcome -->
    <section class="fa-welcome">
        <h2>{{ $greeting }}, {{ $firstName }}</h2>
        <p>{{ $dhaka->format('l, j F Y') }} · Here is what is happening with Felna Online.</p>
        <div class="fa-welcome-actions">
            <a href="{{ route('home_package.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add home package</a>
            <a href="{{ route('corporate_package.create') }}" class="btn btn-light"><i class="fa-solid fa-plus"></i> Add corporate package</a>
            <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-light"><i class="fa-solid fa-globe"></i> View website</a>
        </div>
    </section>

    <!-- Key numbers -->
    <section class="fa-stat-grid">
        <div class="fa-stat">
            <div class="fa-stat-top">
                <span class="fa-stat-icon green"><i class="fa-solid fa-house-signal"></i></span>
                <span class="fa-trend {{ $stats['home_orders_week'] ? '' : 'muted' }}">+{{ $stats['home_orders_week'] }} this week</span>
            </div>
            <div class="fa-stat-num">{{ number_format($stats['home_orders']) }}</div>
            <div class="fa-stat-label">Home package orders</div>
        </div>
        <div class="fa-stat">
            <div class="fa-stat-top">
                <span class="fa-stat-icon blue"><i class="fa-solid fa-building"></i></span>
                <span class="fa-trend {{ $stats['corporate_orders_week'] ? '' : 'muted' }}">+{{ $stats['corporate_orders_week'] }} this week</span>
            </div>
            <div class="fa-stat-num">{{ number_format($stats['corporate_orders']) }}</div>
            <div class="fa-stat-label">Corporate package orders</div>
        </div>
        <a href="{{ route('home_package.index') }}" class="fa-stat">
            <div class="fa-stat-top">
                <span class="fa-stat-icon amber"><i class="fa-solid fa-wifi"></i></span>
                <span class="fa-trend muted">{{ $stats['home_packages_active'] }} published</span>
            </div>
            <div class="fa-stat-num">{{ $stats['home_packages'] }}</div>
            <div class="fa-stat-label">Home packages</div>
        </a>
        <a href="{{ route('corporate_package.index') }}" class="fa-stat">
            <div class="fa-stat-top">
                <span class="fa-stat-icon red"><i class="fa-solid fa-network-wired"></i></span>
                <span class="fa-trend muted">{{ $stats['corporate_packages_active'] }} published</span>
            </div>
            <div class="fa-stat-num">{{ $stats['corporate_packages'] }}</div>
            <div class="fa-stat-label">Corporate packages</div>
        </a>
    </section>

    <div class="fa-dash-grid">
        <!-- Recent orders -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent orders</h3>
                <span class="text-muted small fw-semibold">Latest {{ $recentOrders->count() }}</span>
            </div>
            @if ($recentOrders->isEmpty())
                <div class="fa-empty"><i class="fa-solid fa-inbox"></i>No orders yet. New package orders from the website will show here.</div>
            @else
                <div class="table-responsive" style="border:0;border-radius:0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Mobile</th>
                                <th>Package</th>
                                <th>Router</th>
                                <th>Ordered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $order)
                                <tr>
                                    <td>
                                        <div class="fa-cell">
                                            <strong>{{ $order['name'] }}</strong>
                                            <small>{{ $order['email'] }}</small>
                                        </div>
                                    </td>
                                    <td class="text-nowrap"><a href="tel:{{ $order['mobile'] }}"><i class="fa-solid fa-phone me-1" style="font-size:.75rem"></i>{{ $order['mobile'] }}</a></td>
                                    <td>
                                        <div class="fa-cell">
                                            <strong>{{ $order['package'] }}{{ $order['speed'] ? ' · ' . $order['speed'] : '' }}</strong>
                                            <span class="fa-order-type {{ $order['type'] }}">{{ ucfirst($order['type']) }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $order['router'] }}</td>
                                    <td class="text-nowrap" title="{{ optional($order['date'])->setTimezone('Asia/Dhaka')?->format('j M Y, g:i a') }}">
                                        {{ optional($order['date'])->diffForHumans() ?? '—' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Quick actions -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick actions</h3>
            </div>
            <div class="card-body">
                <div class="fa-quick">
                    <a href="{{ route('home_package.create') }}"><i class="fa-solid fa-house-signal"></i>Add home package</a>
                    <a href="{{ route('corporate_package.create') }}"><i class="fa-solid fa-building"></i>Add corporate package</a>
                    <a href="{{ route('slider.create') }}"><i class="fa-solid fa-images"></i>Add slider</a>
                    <a href="{{ route('feature.create') }}"><i class="fa-solid fa-star"></i>Add feature</a>
                    <a href="{{ route('services.create') }}"><i class="fa-solid fa-screwdriver-wrench"></i>Add service</a>
                    <a href="{{ route('seo.create') }}"><i class="fa-solid fa-magnifying-glass-chart"></i>Add SEO</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Website content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Website content</h3>
        </div>
        <div class="card-body">
            <div class="fa-tiles">
                @foreach ($content as $tile)
                    <a href="{{ route($tile['route']) }}" class="fa-tile">
                        <i class="fa-solid {{ $tile['icon'] }}"></i>
                        <span>
                            <strong>{{ $tile['count'] }}</strong>
                            <small>{{ $tile['label'] }}</small>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
