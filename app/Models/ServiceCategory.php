<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image'];

    private static $imageUrl;

    /**
     * Relationship with services.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Create a new service category.
     */
    public static function newServiceCategory($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image, 'upload/service-categories/') : 'upload/service-categories/default.png';
        
        $serviceCategory = new ServiceCategory();
        self::saveCategoryInfo($request, $serviceCategory, self::$imageUrl);
    }

    /**
     * Update an existing service category.
     */
    public static function updateServiceCategory($request, $serviceCategory)
    {
        if ($request->file('image')) {
            // Delete old image if a new one is uploaded
            if (file_exists($serviceCategory->image)) {
                unlink($serviceCategory->image);
            }
            self::$imageUrl = imageUpload($request->image, 'upload/service-categories/');
        } else {
            self::$imageUrl = $serviceCategory->image;
        }

        self::saveCategoryInfo($request, $serviceCategory, self::$imageUrl);
    }

    /**
     * Save the basic information of the service category.
     */
    private static function saveCategoryInfo($request, $serviceCategory, $imageUrl)
    {
        $serviceCategory->title = $request->title;
        $serviceCategory->image = $imageUrl;
        $serviceCategory->save();
    }

    /**
     * Delete a service category.
     */
    public static function deleteServiceCategory($serviceCategory)
    {
        // Delete image file if it exists
        if (file_exists($serviceCategory->image)) {
            unlink($serviceCategory->image);
        }
        $serviceCategory->delete();
    }
}
