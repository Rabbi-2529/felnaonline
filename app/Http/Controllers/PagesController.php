<?php



namespace App\Http\Controllers;

use App\Models\CorporatePackage;
use App\Models\HomePackage;
use App\Models\OrderHomePackage;
use App\Models\Product;
use App\Models\About;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Seo;  // Add this to fetch SEO data
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    private $orderHomePackage;

    // Fetch SEO data for a specific page
    private function getSeoData($page)
    {
        return Seo::where('page', $page)->first();
    }

    public function about()
    {
        // Fetch the first About section from the database (or adjust if needed)
        $about = About::first();  // Fetching the first 'About' record
        $seo = $this->getSeoData('about');  // Fetch SEO data for the 'about' page
    
        // Pass the 'about' and 'seo' data to the view
        return view('website.pages.about', compact('about', 'seo'));
    }
    
    public function contact()
    {
        $seo = $this->getSeoData('contact');  // Fetch SEO data for the 'contact' page
        return view("website.pages.contact", compact('seo'));
    }

    public function services()
    {
        // Fetch all services along with their associated categories
        $services = Service::with('category')->get();
        
        // Fetch all service categories
        $categories = ServiceCategory::all();

        // Fetch SEO data for the 'service' page
        $seo = $this->getSeoData('service');
        
        // Pass both services, categories, and SEO data to the view
        return view("website.pages.services", compact('services', 'categories', 'seo'));
    }

    // Controller Method to Display Categories
    public function showCategoryServices($categoryId)
    {
        // Fetch the category and its services
        $category = ServiceCategory::with('services')->findOrFail($categoryId);

        // Fetch SEO data for the 'service' page
        $seo = $this->getSeoData('service');
        
        return view('website.pages.services-single', compact('category', 'seo'));
    }

 public function products(Request $request) {
    $page = $request->get('page', 1);
    $response = Http::get("https://admin.felnatech.com/product/product-category-items/networking?page={$page}");
    
    if ($response->successful()) {
        $products = $response->json();
        
        // Debug: Check the structure of the first product
        if (!empty($products['products']['data'])) {
            logger('First product data:', $products['products']['data'][0]);
        }
        
        $productsData = $products['products']['data'] ?? [];
        $categoryName = $products['categoryName'] ?? 'Unknown Category';
        $nextPageUrl = $products['products']['next_page_url'] ?? null;
        $prevPageUrl = $products['products']['prev_page_url'] ?? null;
        $seo = $this->getSeoData('product');
        
        return view('website.pages.products', compact('productsData', 'categoryName', 'nextPageUrl', 'prevPageUrl', 'seo'));
    } else {
        $seo = $this->getSeoData('product');
        return view('website.pages.products', ['productsData' => [], 'categoryName' => 'Error fetching products', 'seo' => $seo]);
    }
}

    public function homePackage()
    {
        // Fetch SEO data for the 'home-package' page
        $seo = $this->getSeoData('home-package');
        return view("website.pages.home-package", [
            "homePackages" => HomePackage::where("status", 1)->get(),
            'seo' => $seo
        ]);
    }

    public function corporatePackage()
    {
        // Fetch SEO data for the 'corporate-package' page
        $seo = $this->getSeoData('corporate-package');
        return view("website.pages.corporate-package", [
            "corporatePackages" => CorporatePackage::where("status", 1)->get(),
            'seo' => $seo
        ]);
    }
}
