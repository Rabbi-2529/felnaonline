<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyPoint extends Model
{
    use HasFactory;

    private static $keyPoint;

    // Create a new KeyPoint record
    public static function newKeyPoint($request)
    {
        self::$keyPoint = new KeyPoint();
        self::saveBasicInfo($request, self::$keyPoint);
    }

    // Update an existing KeyPoint record
    public static function updateKeyPoint($request, $keyPoint)
    {
        self::saveBasicInfo($request, $keyPoint);
    }

    // Save or update the KeyPoint record info
    private static function saveBasicInfo($request, $keyPoint)
    {
        $keyPoint->icon = $request->icon;
        $keyPoint->title = $request->title;
        $keyPoint->description = $request->description;
        $keyPoint->save();
    }

    // Delete a KeyPoint record
    public static function deleteKeyPoint($keyPoint)
    {
        $keyPoint->delete();
    }
}
