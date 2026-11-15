<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCorporatePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_package_id', 'name', 'email', 'mobile', 'coverage_area', 'address', 'need_router'
    ];

    public static function newOrderCorporatePackage($request)
    {
        return self::create([
            'corporate_package_id' => $request->corporate_package_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'coverage_area' => $request->coverage_area,
            'address' => $request->address,
            'need_router' => $request->need_router,
        ]);
    }

    public function corporatePackage()
    {
        return $this->belongsTo(CorporatePackage::class);
    }
}
