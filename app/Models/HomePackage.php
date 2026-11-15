<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePackage extends Model
{
    use HasFactory;

    private static $homePackage;

    public static function newHomePackage($request){
        self::$homePackage = new HomePackage();
        self::saveBasicInfo($request,self::$homePackage);
    }
    public static function updateHomePackage($request,$homePackage){
        self::saveBasicInfo($request,$homePackage);
    }
    public static function deleteHomePackage($homePackage){
        $homePackage->delete();
    }
    private static function saveBasicInfo($request,$homePackage){
        $homePackage->name = $request->name;
        $homePackage->bandwidth = $request->bandwidth;
        $homePackage->feature_one = $request->feature_one;
        $homePackage->feature_two = $request->feature_two;
        $homePackage->feature_three = $request->feature_three;
        $homePackage->feature_four = $request->feature_four;
        $homePackage->price = $request->price;
        $homePackage->status = $request->status;
        $homePackage->save();
    }



}
