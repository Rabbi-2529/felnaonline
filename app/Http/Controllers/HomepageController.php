<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use App\Models\KeyPoint;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Show the homepage index with Why Choose Us and Key Points data.
     */
    public function index()
    {
        $whyChooseUs = WhyChooseUs::all();
        $keyPoints = KeyPoint::all();

        return view('admin.homepage.index', compact('whyChooseUs', 'keyPoints'));
    }

    /**
     * Show the form to create a new "Why Choose Us" section.
     */
    public function createWhyChooseUs()
    {
        return view('admin.homepage.create-why-choose-us');
    }

    /**
     * Store a new "Why Choose Us" section.
     */
    public function storeWhyChooseUs(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        WhyChooseUs::newWhyChooseUs($request);

        return redirect()->route('homepage.index')->with('success', 'Why Choose Us section created successfully!');
    }

    /**
     * Show the form to edit the "Why Choose Us" section.
     */
    public function editWhyChooseUs($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);

        return view('admin.homepage.edit-why-choose-us', compact('whyChooseUs'));
    }

    /**
     * Update the "Why Choose Us" section.
     */
    public function updateWhyChooseUs(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $whyChooseUs = WhyChooseUs::findOrFail($id);
        WhyChooseUs::updateWhyChooseUs($request, $whyChooseUs);

        return redirect()->route('homepage.index')->with('success', 'Why Choose Us section updated successfully!');
    }

    /**
     * Delete the "Why Choose Us" section.
     */
    public function deleteWhyChooseUs($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        WhyChooseUs::deleteWhyChooseUs($whyChooseUs);

        return redirect()->route('homepage.index')->with('success', 'Why Choose Us section deleted successfully!');
    }

    /**
     * Show the form to create a new Key Point.
     */
    public function createKeyPoint()
    {
        return view('admin.homepage.create-key-point');
    }

    /**
     * Store a new Key Point.
     */
    public function storeKeyPoint(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        KeyPoint::newKeyPoint($request);

        return redirect()->route('homepage.index')->with('success', 'Key Point created successfully!');
    }

    /**
     * Show the form to edit a Key Point.
     */
    public function editKeyPoint($id)
    {
        $keyPoint = KeyPoint::findOrFail($id);

        return view('admin.homepage.edit-key-point', compact('keyPoint'));
    }

    /**
     * Update a Key Point.
     */
    public function updateKeyPoint(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $keyPoint = KeyPoint::findOrFail($id);
        KeyPoint::updateKeyPoint($request, $keyPoint);

        return redirect()->route('homepage.index')->with('success', 'Key Point updated successfully!');
    }

    /**
     * Delete a Key Point.
     */
    public function deleteKeyPoint($id)
    {
        $keyPoint = KeyPoint::findOrFail($id);
        KeyPoint::deleteKeyPoint($keyPoint);

        return redirect()->route('homepage.index')->with('success', 'Key Point deleted successfully!');
    }
}
