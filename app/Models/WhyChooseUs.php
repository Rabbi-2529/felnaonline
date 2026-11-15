<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    private static $whyChooseUs;

    // Create a new WhyChooseUs record
    public static function newWhyChooseUs($request)
    {
        self::$whyChooseUs = new WhyChooseUs();
        self::saveBasicInfo($request, self::$whyChooseUs);
    }

    // Update an existing WhyChooseUs record
    public static function updateWhyChooseUs($request, $whyChooseUs)
    {
        self::saveBasicInfo($request, $whyChooseUs);
    }

    // Save or update the WhyChooseUs record info
    private static function saveBasicInfo($request, $whyChooseUs)
    {
        $whyChooseUs->title = $request->title;
        $whyChooseUs->description = $request->description;
        $whyChooseUs->save();
    }

    // Delete a WhyChooseUs record
    public static function deleteWhyChooseUs($whyChooseUs)
    {
        $whyChooseUs->delete();
    }
}
