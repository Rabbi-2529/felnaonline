{{--
    One package (plan) card.
    Expects: $package, $tag (e.g. "Home"), and either $orderTarget (modal id) or $orderUrl (link).
--}}
@php
    $speedMatch = [];
    $hasSpeed = preg_match('/^\s*([\d.,]+)\s*(.*)$/', (string) $package->bandwidth, $speedMatch);
    $features = array_filter([
        $package->feature_one,
        $package->feature_two,
        $package->feature_three,
        $package->feature_four,
    ]);
@endphp
<div class="fo-plan">
    <div class="fo-plan-head">
        <i class="fa-solid fa-wifi fo-plan-wifi" aria-hidden="true"></i>
        <div class="fo-plan-top">
            <h3 class="fo-plan-name">{{ $package->name }}</h3>
            <span class="fo-plan-tag">{{ $tag }}</span>
        </div>
        @if ($hasSpeed)
            <div class="fo-plan-speed">
                <strong>{{ $speedMatch[1] }}</strong>
                <span>{{ trim($speedMatch[2]) ?: 'Mbps' }}</span>
            </div>
        @else
            <div class="fo-plan-speed-raw">{{ $package->bandwidth }}</div>
        @endif
    </div>

    <div class="fo-plan-body">
        <div class="fo-plan-price">
            <strong>{{ is_numeric($package->price) ? number_format((float) $package->price) : $package->price }}</strong>
            <span>TK</span>
        </div>

        <ul class="fo-plan-features">
            @foreach ($features as $feature)
                <li><i class="fa-solid fa-check"></i><span>{{ $feature }}</span></li>
            @endforeach
        </ul>

        @if (!empty($orderTarget))
            <button type="button" class="fo-btn fo-btn-primary fo-btn-block" data-bs-toggle="modal" data-bs-target="#{{ $orderTarget }}">
                <i class="fa-solid fa-wifi"></i> Order now
            </button>
        @else
            <a href="{{ $orderUrl }}" class="fo-btn fo-btn-primary fo-btn-block">
                <i class="fa-solid fa-wifi"></i> Order now
            </a>
        @endif
    </div>
</div>
