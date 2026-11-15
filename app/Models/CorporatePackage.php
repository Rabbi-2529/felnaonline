<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporatePackage extends Model
{
    use HasFactory;

    private static $corporatePackage;

    public static function newCorporatePackage($request){
        self::$corporatePackage = new CorporatePackage();
        self::saveBasicInfo($request,self::$corporatePackage);
    }
    public static function updateCorporatePackage($request,$corporatePackage){
        self::saveBasicInfo($request,$corporatePackage);
    }
    public static function deleteCorporatePackage($corporatePackage){
        $corporatePackage->delete();
    }
    private static function saveBasicInfo($request,$corporatePackage){
        $corporatePackage->name = $request->name;
        $corporatePackage->bandwidth = $request->bandwidth;
        $corporatePackage->feature_one = $request->feature_one;
        $corporatePackage->feature_two = $request->feature_two;
        $corporatePackage->feature_three = $request->feature_three;
        $corporatePackage->feature_four = $request->feature_four;
        $corporatePackage->price = $request->price;
        $corporatePackage->status = $request->status;
        $corporatePackage->save();
    }
}
