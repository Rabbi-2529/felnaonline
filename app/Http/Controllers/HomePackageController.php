<?php

namespace App\Http\Controllers;

use App\Models\HomePackage;
use Illuminate\Http\Request;

class HomePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.home_package.index",['home_packages' => HomePackage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.home_package.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required | unique:home_packages",
            "bandwidth"=> "required",
            "feature_one"=> "required",
            "feature_two"=> "required",
            "feature_three"=> "required",
            "feature_four"=> "required",
            "price"=> "required",
        ]);

        HomePackage::newHomePackage($request);
        return back()->with("msg","Home Package Added Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(HomePackage $homePackage)
    {
        return view("admin.home_package.show",["home_package"=> $homePackage]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePackage $homePackage)
    {
        return view("admin.home_package.edit",["home_package"=> $homePackage]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomePackage $homePackage)
    {
        $request->validate([
            "name"=> "required",
            "bandwidth"=> "required",
            "feature_one"=> "required",
            "feature_two"=> "required",
            "feature_three"=> "required",
            "feature_four"=> "required",
            "price"=> "required",
        ]);

        HomePackage::updateHomePackage( $request, $homePackage);
        return to_route("home_package.index")->with("msg","Home Package Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePackage $homePackage)
    {
        HomePackage::deleteHomePackage($homePackage);
        return back()->with("del","Home Package Deleted Successfully!!");
    }
}
