<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    private static $feature;

    public static function newFeature($request){
        self::$feature = new Feature();
        self::saveBasicInfo($request,self::$feature);
    }
    public static function updateFeature($request,$feature){
        self::saveBasicInfo($request,$feature);
    }
    public static function deleteFeature($feature){
        $feature->delete();
    }
    private static function saveBasicInfo($request,$feature){
        $feature->title = $request->title;
        $feature->subtitle = $request->subtitle;
        $feature->status = $request->status;
        $feature->save();
    }
}
