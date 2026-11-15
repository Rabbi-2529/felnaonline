<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product,$imageUrl;

    public static function newProduct($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'upload/product-images/') : 'upload/product.png';
        self::$product = new Product();
        self::saveBasicInfo($request,self::$product,self::$imageUrl);
    }

    public static function updateProduct($request,$product){
        if($request->file('image')){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            self::$imageUrl = imageUpload($request->image,'upload/product-images/');
        }else{
            self::$imageUrl = $product->image;
        }

        self::saveBasicInfo($request,$product,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$product,$imageUrl){

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageUrl;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();
    }

    public static function deleteProduct($product)
    {
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
    }
}
