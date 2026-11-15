<?php
namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Fetch all About sections from the database
        $abouts = About::all(); // You can customize this to limit the number of records or apply pagination if needed
        
        return view('admin.about.index', compact('abouts')); // Return the view with the about sections
    }

    public function create()
    {
        return view('admin.about.create'); // View to create About
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
            'mission' => 'required|string',
            'vision' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
        ]);

        About::newAbout($request);

        return back()->with('msg', 'About section created successfully!');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about')); // View to edit About
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
            'mission' => 'required|string',
            'vision' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
        ]);

        About::updateAbout($request, $about);

        return redirect()->route('about.index')->with('msg', 'About section updated successfully!');
    }

    public function destroy(About $about)
    {
        About::deleteAbout($about);

        return back()->with('msg', 'About section deleted successfully!');
    }
}