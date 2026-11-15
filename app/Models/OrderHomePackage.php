<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHomePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_package_id', 'name', 'email', 'mobile', 'coverage_area', 'address', 'need_router'
    ];

    public static function newOrderHomePackage($request)
    {
        return self::create([
            'home_package_id' => $request->home_package_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'coverage_area' => $request->coverage_area,
            'address' => $request->address,
            'need_router' => $request->need_router,
        ]);
    }

    public function homePackage()
    {
        return $this->belongsTo(HomePackage::class, 'home_package_id');
    }

}
