<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CorporatePackage;
use App\Models\Feature;
use App\Models\HomePackage;
use App\Models\OrderCorporatePackage;
use App\Models\OrderHomePackage;
use App\Models\Product;
use App\Models\Seo;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function index()
    {
        $weekAgo = now()->subDays(7);
        $hasCorporateOrders = Schema::hasTable('order_corporate_packages');

        $homeOrders = OrderHomePackage::with('homePackage')->latest()->take(8)->get()
            ->map(fn ($o) => $this->orderRow($o, 'home', $o->homePackage));
        $corporateOrders = $hasCorporateOrders
            ? OrderCorporatePackage::with('corporatePackage')->latest()->take(8)->get()
                ->map(fn ($o) => $this->orderRow($o, 'corporate', $o->corporatePackage))
            : collect();

        $recentOrders = $homeOrders->concat($corporateOrders)
            ->sortByDesc(fn ($row) => optional($row['date'])->timestamp ?? 0)
            ->take(8)
            ->values();

        $stats = [
            'home_orders' => OrderHomePackage::count(),
            'home_orders_week' => OrderHomePackage::where('created_at', '>=', $weekAgo)->count(),
            'corporate_orders' => $hasCorporateOrders ? OrderCorporatePackage::count() : 0,
            'corporate_orders_week' => $hasCorporateOrders ? OrderCorporatePackage::where('created_at', '>=', $weekAgo)->count() : 0,
            'home_packages' => HomePackage::count(),
            'home_packages_active' => HomePackage::where('status', 1)->count(),
            'corporate_packages' => CorporatePackage::count(),
            'corporate_packages_active' => CorporatePackage::where('status', 1)->count(),
        ];

        $content = [
            ['label' => 'Sliders', 'count' => Slider::count(), 'icon' => 'fa-images', 'route' => 'slider.index'],
            ['label' => 'Features', 'count' => Feature::count(), 'icon' => 'fa-star', 'route' => 'feature.index'],
            ['label' => 'Services', 'count' => Service::count(), 'icon' => 'fa-screwdriver-wrench', 'route' => 'services.index'],
            ['label' => 'Service categories', 'count' => ServiceCategory::count(), 'icon' => 'fa-layer-group', 'route' => 'service_categories.index'],
            ['label' => 'Products', 'count' => Product::count(), 'icon' => 'fa-box-open', 'route' => 'product.index'],
            ['label' => 'Clients', 'count' => Client::count(), 'icon' => 'fa-handshake', 'route' => 'clients.index'],
            ['label' => 'Team members', 'count' => Team::count(), 'icon' => 'fa-user-group', 'route' => 'team.index'],
            ['label' => 'Pages with SEO', 'count' => Seo::count(), 'icon' => 'fa-magnifying-glass-chart', 'route' => 'seo'],
        ];

        return view('dashboard', compact('stats', 'recentOrders', 'content'));
    }

    private function orderRow($order, string $type, $package): array
    {
        return [
            'type' => $type,
            'name' => $order->name,
            'email' => $order->email,
            'mobile' => $order->mobile,
            'area' => $order->coverage_area,
            'address' => $order->address,
            'router' => (int) $order->need_router === 1 ? 'Yes' : 'No',
            'package' => $package->name ?? 'Deleted package',
            'speed' => $package->bandwidth ?? null,
            'date' => $order->created_at,
        ];
    }
}
