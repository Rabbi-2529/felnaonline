<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    private static $about, $imageUrl;

    public static function newAbout($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image, 'upload/about-images/') : 'upload/default-about-image.jpg';
        self::$about = new About();
        self::saveBasicInfo($request, self::$about, self::$imageUrl);
    }

    public static function updateAbout($request, $about)
    {
        if ($request->file('image')) {
            if (file_exists($about->image)) {
                unlink($about->image);
            }
            self::$imageUrl = imageUpload($request->image, 'upload/about-images/');
        } else {
            self::$imageUrl = $about->image;
        }

        self::saveBasicInfo($request, $about, self::$imageUrl);
    }

    private static function saveBasicInfo($request, $about, $imageUrl)
    {
        $about->title = $request->title;
        $about->story = $request->story;
        $about->mission = $request->mission;
        $about->vision = $request->vision;
        $about->image = $imageUrl;
        $about->save();
    }

    public static function deleteAbout($about)
    {
        if (file_exists($about->image)) {
            unlink($about->image);
        }
        $about->delete();
    }
}
