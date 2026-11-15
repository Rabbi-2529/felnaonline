<?php

namespace App\Http\Controllers;

use App\Models\CorporatePackage;
use Illuminate\Http\Request;

class CorporatePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         return view("admin.corporate_package.index",['corporate_packages' => CorporatePackage::all()]);
     }

     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view("admin.corporate_package.add");
     }

     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $request->validate([
             "name"=> "required | unique:corporate_packages",
             "bandwidth"=> "required",
             "feature_one"=> "required",
             "feature_two"=> "required",
             "feature_three"=> "required",
             "feature_four"=> "required",
             "price"=> "required",
         ]);

         CorporatePackage::newCorporatePackage($request);
         return back()->with("msg","Corporate Package Added Successfully!!");
     }

     /**
      * Display the specified resource.
      */
     public function show(CorporatePackage $corporatePackage)
     {
         return view("admin.corporate_package.show",["corporate_package"=> $corporatePackage]);
     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit(CorporatePackage $CorporatePackage)
     {
         return view("admin.corporate_package.edit",["corporate_package"=> $CorporatePackage]);
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, CorporatePackage $corporatePackage)
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

         CorporatePackage::updateCorporatePackage( $request, $corporatePackage);
         return to_route("corporate_package.index")->with("msg","Corporate Package Updated Successfully!!");
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy(CorporatePackage $corporatePackage)
     {
         CorporatePackage::deleteCorporatePackage($corporatePackage);
         return back()->with("del","Corporate Package Deleted Successfully!!");
     }
}
