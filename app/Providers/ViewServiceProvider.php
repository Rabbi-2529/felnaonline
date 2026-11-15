<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Seo;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('website.master', function ($view) {
            $route = Route::current();
            $routeName = $route ? $route->getName() : null;

            // Only load SEO if the route matches one of these pages
            $seoPages = [
                'about' => 'about-us',
                'corporate-package' => 'corporate-package',
                'feature' => 'services-our',
                'home-package' => 'home-package',
                'product' => 'products',
                'service' => 'services-our',
                'contact' => 'contact',
            ];

            // Flip the array to make reverse mapping (routeName => page)
            $reverseMap = array_flip($seoPages);
            $page = $reverseMap[$routeName] ?? null;

            // Get SEO record if applicable
            $seo = $page ? Seo::where('page', $page)->first() : null;

            // Share it with the view
            $view->with('seo', $seo);
        });
    }
}
