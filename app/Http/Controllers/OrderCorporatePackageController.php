<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\OrderCorporatePackage;

class OrderCorporatePackageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|unique:order_home_packages",
            "mobile" => "required|unique:order_home_packages",
            "coverage_area" => "required",
            "address" => "required",
            "corporate_package_id" => "required"
        ]);
        $order = OrderCorporatePackage::newOrderCorporatePackage($request);
        // Fetch the home package name using the relationship
        $corporatePackageName = $order->corporatePackage->name;

        $msg = "New Order Details:\nName: {$order->name}\nEmail: {$order->email}\nMobile: {$order->mobile}\nAddress: {$order->address}\nPackage Name: {$corporatePackageName}";

        $response = Http::get(config('services.sms.url'), [
            'api_key' => config('services.sms.key'),
            'contacts' => config('services.sms.notify_number'),
            'senderid' => config('services.sms.sender_id'),
            'msg' => $msg,
        ]);

        if ($response->successful()) {
            return back()->with("msg", "Your Corporate Package has been ordered!!");
        } else {
            return back()->with("error", "Failed to send SMS. Please try again.");
        }
    }
}
