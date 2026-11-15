@php
    $imagePath = asset('website-assets/img/logo.png');
    if (isset($product['images']) && is_array($product['images']) && count($product['images']) > 0) {
        $lastImage = end($product['images']);
        if (!empty($lastImage['img_name'])) {
            $imagePath = 'https://admin.felnatech.com/storage/app/public/products/' . $lastImage['img_name'];
        }
    }
    $price = $product['pro_price'] ?? null;
    $detailUrl = 'https://felnatech.com/pro/' . ($product['pro_slug'] ?? '') . '/' . ($product['pro_model'] ?? '');
@endphp
<article class="fo-product">
    <a href="{{ $detailUrl }}" target="_blank" rel="noopener" class="fo-product-media">
        <img src="{{ $imagePath }}" alt="{{ $product['pro_title'] ?? 'Product image' }}" loading="lazy">
    </a>
    <div class="fo-product-body">
        <h3 class="fo-product-title" title="{{ $product['pro_title'] ?? '' }}">{{ $product['pro_title'] ?? 'Untitled product' }}</h3>
        <div class="fo-product-foot">
            @if ($price !== null && $price !== '')
                <span class="fo-price">{{ is_numeric($price) ? number_format((float) $price) : $price }}<small>TK</small></span>
            @else
                <span class="fo-price"><small class="ms-0">Price on request</small></span>
            @endif
            <a href="{{ $detailUrl }}" target="_blank" rel="noopener" class="fo-link-arrow">Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</article>
