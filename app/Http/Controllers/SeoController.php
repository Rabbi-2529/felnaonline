<?php
namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    // Show the SEO index page with all SEO records
    public function index()
    {
        // Fetch all SEO data for different pages
        $seos = Seo::all();
        return view('admin.seo.index', compact('seos'));
    }

    // Show the SEO create page with the page options
    public function create()
    {
        // List of available pages that can have SEO data
        $pages = ['home', 'about', 'corporate-package', 'feature', 'home-package', 'product', 'service', 'contact'];
        
        // Return the view with available pages
        return view('admin.seo.create', compact('pages'));
    }

    // Store the new SEO data for the selected page
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'page' => 'required|in:home,about,corporate-package,feature,home-package,product,service,contact', // Ensure valid page selection
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_robots' => 'required|string|max:255',
        ]);

        // Create new SEO data for the page
        Seo::create([
            'page' => $request->page,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_robots' => $request->meta_robots,
        ]);

        // Redirect back with success message
        return redirect()->route('seo')->with('success', 'SEO data created successfully!');
    }

    // Edit SEO data for a specific page
    public function edit($page)
    {
        // Find the existing SEO data for the selected page
        $seo = Seo::where('page', $page)->first();

        if ($seo) {
            return view('admin.seo.edit', compact('seo', 'page'));
        }

        return redirect()->route('seo')->with('error', 'SEO data not found for this page!');
    }

    // Update the SEO data for a specific page
    public function update(Request $request, $page)
    {
        // Validate incoming request
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_robots' => 'required|string|max:255',
        ]);

        // Find the existing SEO data
        $seo = Seo::where('page', $page)->first();

        // Update SEO data
        if ($seo) {
            $seo->update([
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'meta_robots' => $request->meta_robots,
            ]);

            return redirect()->route('seo')->with('success', 'SEO data updated successfully!');
        }

        return redirect()->route('seo')->with('error', 'SEO data not found for this page!');
    }

    // Delete SEO data for a specific page
    public function destroy($page)
    {
        // Find the SEO data for the selected page
        $seo = Seo::where('page', $page)->first();

        if ($seo) {
            $seo->delete(); // Delete the SEO data
            return redirect()->route('seo')->with('success', 'SEO data deleted successfully!');
        }

        return redirect()->route('seo')->with('error', 'SEO data not found!');
    }
}
