<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['service_category_id', 'name', 'status', 'image', 'description']; // Add description to fillable

    private static $imageUrl;

    /**
     * Relationship with ServiceCategory.
     */
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    /**
     * Create a new service.
     */
    public static function newService($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image, 'upload/services/') : 'upload/services/default.png';
        
        $service = new Service();
        self::saveServiceInfo($request, $service, self::$imageUrl);
    }

    /**
     * Update an existing service.
     */
    public static function updateService($request, $service)
    {
        if ($request->file('image')) {
            // Delete old image if a new one is uploaded
            if (file_exists($service->image)) {
                unlink($service->image);
            }
            self::$imageUrl = imageUpload($request->image, 'upload/services/');
        } else {
            self::$imageUrl = $service->image;
        }

        self::saveServiceInfo($request, $service, self::$imageUrl);
    }

    /**
     * Save the basic information of the service.
     */
    private static function saveServiceInfo($request, $service, $imageUrl)
    {
        $service->service_category_id = $request->service_category_id;
        $service->name = $request->name;
        $service->status = $request->status;
        $service->image = $imageUrl;
        $service->description = $request->description; // Save the description
        $service->save();
    }

    /**
     * Delete a service.
     */
    public static function deleteService($service)
    {
        // Delete image file if it exists
        if (file_exists($service->image)) {
            unlink($service->image);
        }
        $service->delete();
    }
}
