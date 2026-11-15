<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\HomePackage;
use App\Models\Seo;
use App\Models\Slider;
use App\Models\Team;
use App\Models\WhyChooseUs;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the latest 10 products from the external API
        $response = Http::get("https://admin.felnatech.com/product/product-category-items/networking?per_page=10");
    
        // Initialize variables for products and category data
        $productsData = [];
        $categoryName = 'Unknown Category';
    
        // Check if the response was successful
        if ($response->successful()) {
            $products = $response->json();
    
            // Extract products data
            $productsData = $products['products']['data'] ?? [];
            $categoryName = $products['categoryName'] ?? 'Unknown Category';
        }
        $teams = Team::all();
                $clients = Client::all();
    $whyChooseUs = WhyChooseUs::all();
        $activeHomePackages = HomePackage::where("status", 1)->orderBy("price")->get();
        // Return the view with sliders, features, and products data
        return view("index", [
            "sliders" => Slider::where('status', 1)->get(),
            "features" => Feature::where("status", 1)->get(),
            "productsData" => $productsData,
            "categoryName" => $categoryName,
            "whyChooseUs" => $whyChooseUs,
            "clients" => $clients,
             "teams" => $teams,
            "allHomePackages" => $activeHomePackages,
            "homePackages" => $activeHomePackages->take(4),
            "seo" => Seo::where('page', 'home')->first(),
        ]);
    }
    
    
    public function readFullDescription($id)
{
    // Retrieve the Why Choose Us section by ID
    $whyChooseUs = WhyChooseUs::findOrFail($id);

    // Return the view for reading full description
    return view('website.pages.why-choose-us-description', compact('whyChooseUs'));
}
}
