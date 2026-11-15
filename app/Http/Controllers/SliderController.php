<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.slider.index",['sliders' => Slider::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.slider.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=> "required",
            "subtitle"=> "required",
            "image"=> "required | image | mimes:jpeg,jpg,png,gif,webp",
        ]);

        Slider::newSlider($request);
        return back()->with("msg","Slider Added Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view("admin.slider.edit",["slider" => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "title"=> "required",
            "subtitle"=> "required",
            "image"=> "image | mimes:jpeg,jpg,png,gif,webp",
        ]);

        Slider::updateSlider($request, $slider);
        return to_route('slider.index')->with("msg","Slider Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        Slider::deleteSlider($slider);
        return back()->with("del","Slider Deleted Successfully!!");
    }
}
