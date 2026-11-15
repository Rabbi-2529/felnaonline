<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    private static $slider,$imageUrl;

    public static function newSlider($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'upload/slider-images/') : 'upload/slider.png';
        self::$slider = new Slider();
        self::saveBasicInfo($request,self::$slider,self::$imageUrl);
    }

    public static function updateSlider($request,$slider){
        if($request->file('image')){
            if(file_exists($slider->image)){
                unlink($slider->image);
            }
            self::$imageUrl = imageUpload($request->image,'upload/slider-images/');
        }else{
            self::$imageUrl = $slider->image;
        }

        self::saveBasicInfo($request,$slider,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$slider,$imageUrl){

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image = $imageUrl;
        $slider->status = $request->status;
        $slider->save();
    }

    public static function deleteSlider($slider)
    {
        if(file_exists($slider->image)){
            unlink($slider->image);
        }
        $slider->delete();
    }
}
