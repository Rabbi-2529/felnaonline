<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.product.index",['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.product.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required | unique:products",
            "description"=> "required",
            "image"=> "required | image | mimes:jpeg,jpg,png,gif,webp",
            "price"=> "required"
        ]);

        Product::newProduct($request);
        return back()->with("msg","Product Added Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.product.show",["product"=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("admin.product.edit",["product"=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name"=> "required",
            "description"=> "required",
            "image"=> "image | mimes:jpeg,jpg,png,gif,webp",
            "price"=> "required"
        ]);
        Product::updateProduct($request, $product);
        return to_route('product.index')->with("msg","Product Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product);
        return back()->with("del","Product Deleted Successfully!!");
    }
}
