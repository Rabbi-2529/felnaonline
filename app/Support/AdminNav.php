<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Admin panel navigation.
 * One list of modules drives the sidebar, page titles, breadcrumbs and the "Add" / "Back" buttons.
 */
class AdminNav
{
    public static function groups(): array
    {
        return [
            [
                'label' => null,
                'items' => [
                    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fa-gauge-high', 'route' => 'admin.dashboard', 'match' => ['admin.dashboard']],
                ],
            ],
            [
                'label' => 'Internet Packages',
                'items' => [
                    ['key' => 'home_package', 'label' => 'Home Packages', 'singular' => 'home package', 'icon' => 'fa-house-signal', 'route' => 'home_package.index', 'create' => 'home_package.create', 'match' => ['home_package.*']],
                    ['key' => 'corporate_package', 'label' => 'Corporate Packages', 'singular' => 'corporate package', 'icon' => 'fa-building', 'route' => 'corporate_package.index', 'create' => 'corporate_package.create', 'match' => ['corporate_package.*']],
                ],
            ],
            [
                'label' => 'Website Content',
                'items' => [
                    ['key' => 'homepage', 'label' => 'Homepage Sections', 'singular' => 'section', 'icon' => 'fa-table-cells-large', 'route' => 'homepage.index', 'match' => ['homepage.*']],
                    ['key' => 'slider', 'label' => 'Sliders', 'singular' => 'slider', 'icon' => 'fa-images', 'route' => 'slider.index', 'create' => 'slider.create', 'match' => ['slider.*']],
                    ['key' => 'feature', 'label' => 'Features', 'singular' => 'feature', 'icon' => 'fa-star', 'route' => 'feature.index', 'create' => 'feature.create', 'match' => ['feature.*']],
                    ['key' => 'about', 'label' => 'About Us', 'singular' => 'about entry', 'icon' => 'fa-circle-info', 'route' => 'about.index', 'create' => 'about.create', 'match' => ['about.*']],
                    ['key' => 'team', 'label' => 'Team', 'singular' => 'team member', 'icon' => 'fa-user-group', 'route' => 'team.index', 'create' => 'team.create', 'match' => ['team.*']],
                    ['key' => 'clients', 'label' => 'Clients', 'singular' => 'client', 'icon' => 'fa-handshake', 'route' => 'clients.index', 'create' => 'clients.create', 'match' => ['clients.*']],
                ],
            ],
            [
                'label' => 'Services & Products',
                'items' => [
                    ['key' => 'services', 'label' => 'Services', 'singular' => 'service', 'icon' => 'fa-screwdriver-wrench', 'route' => 'services.index', 'create' => 'services.create', 'match' => ['services.*']],
                    ['key' => 'service_categories', 'label' => 'Service Categories', 'singular' => 'category', 'icon' => 'fa-layer-group', 'route' => 'service_categories.index', 'create' => 'service_categories.create', 'match' => ['service_categories.*']],
                    ['key' => 'product', 'label' => 'Products', 'singular' => 'product', 'icon' => 'fa-box-open', 'route' => 'product.index', 'create' => 'product.create', 'match' => ['product.*']],
                ],
            ],
            [
                'label' => 'Settings',
                'items' => [
                    ['key' => 'seo', 'label' => 'SEO', 'singular' => 'SEO entry', 'icon' => 'fa-magnifying-glass-chart', 'route' => 'seo', 'create' => 'seo.create', 'match' => ['seo', 'seo.*']],
                    ['key' => 'profile', 'label' => 'My Profile', 'icon' => 'fa-user-gear', 'route' => 'profile.edit', 'match' => ['profile.*']],
                ],
            ],
        ];
    }

    /** The module that matches the current route, or null. */
    public static function current(): ?array
    {
        $name = Route::currentRouteName();
        if (!$name) {
            return null;
        }
        foreach (static::groups() as $group) {
            foreach ($group['items'] as $item) {
                foreach ($item['match'] as $pattern) {
                    if (Str::is($pattern, $name)) {
                        return $item + ['group' => $group['label']];
                    }
                }
            }
        }
        return null;
    }

    public static function isActive(array $item): bool
    {
        $name = Route::currentRouteName();
        foreach ($item['match'] as $pattern) {
            if ($name && Str::is($pattern, $name)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Header data for the current page: title, breadcrumbs, action (index/create/edit/show) and buttons.
     */
    public static function page(): array
    {
        $item = static::current();
        $name = (string) Route::currentRouteName();
        $action = Str::afterLast($name, '.');

        if (!$item) {
            return ['title' => 'Admin', 'action' => 'other', 'crumbs' => [], 'buttons' => [], 'icon' => 'fa-gauge-high'];
        }

        $singular = $item['singular'] ?? Str::singular(strtolower($item['label']));
        $special = [
            'homepage.create-why-choose-us' => ['Add "Why choose us" item', 'create'],
            'homepage.edit-why-choose-us' => ['Edit "Why choose us" item', 'edit'],
            'homepage.create-key-point' => ['Add key point', 'create'],
            'homepage.edit-key-point' => ['Edit key point', 'edit'],
            'seo.edit' => ['Edit SEO for ' . ucfirst(str_replace('-', ' ', (string) request()->route('page'))), 'edit'],
            'profile.edit' => ['My Profile', 'index'],
        ];

        if (isset($special[$name])) {
            [$title, $action] = $special[$name];
        } elseif ($action === 'create') {
            $title = 'Add ' . $singular;
        } elseif ($action === 'edit') {
            $title = 'Edit ' . $singular;
        } elseif ($action === 'show') {
            $title = ucfirst($singular) . ' details';
        } else {
            $title = $item['label'];
            $action = $item['key'] === 'dashboard' ? 'dashboard' : 'index';
        }

        $crumbs = [['label' => 'Dashboard', 'url' => route('admin.dashboard')]];
        if ($item['key'] !== 'dashboard') {
            $crumbs[] = ['label' => $item['label'], 'url' => route($item['route'])];
        }
        if (!in_array($action, ['index', 'dashboard'], true)) {
            $crumbs[] = ['label' => $title, 'url' => null];
        }

        $buttons = [];
        if ($action === 'index' && !empty($item['create']) && Route::has($item['create'])) {
            $buttons[] = ['label' => 'Add ' . $singular, 'url' => route($item['create']), 'icon' => 'fa-plus', 'style' => 'primary'];
        }
        if ($item['key'] === 'homepage' && $action === 'index') {
            $buttons[] = ['label' => 'Add key point', 'url' => route('homepage.create-key-point'), 'icon' => 'fa-plus', 'style' => 'primary'];
        }
        if ($action === 'show') {
            $editRoute = Str::beforeLast($name, '.') . '.edit';
            if (Route::has($editRoute)) {
                $buttons[] = ['label' => 'Edit', 'url' => route($editRoute, request()->route()->parameters()), 'icon' => 'fa-pen', 'style' => 'primary'];
            }
        }
        if (in_array($action, ['create', 'edit', 'show'], true)) {
            $buttons[] = ['label' => 'Back to ' . strtolower($item['label']), 'url' => route($item['route']), 'icon' => 'fa-arrow-left', 'style' => 'light'];
        }

        return [
            'title' => $title,
            'module' => $item['label'],
            'group' => $item['group'],
            'icon' => $item['icon'],
            'action' => $action,
            'crumbs' => $crumbs,
            'buttons' => $buttons,
        ];
    }
}
