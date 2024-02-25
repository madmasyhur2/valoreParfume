<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Shipping;

class PriceListController extends Controller
{
    public function index()
    {
        $data = [
            'province_origin' => Province::find(request('province_origin'))->name,
            'regency_origin' => Regency::find(request('regency_origin'))->name,
            'district_origin' => District::find(request('district_origin'))->name,
            'village_origin' => Village::find(request('village_origin'))->name,
            'zipcode_origin' => Village::find(request('village_origin'))->zipcode,
            'province_destination' => Province::find(request('province_destination'))->name,
            'regency_destination' => Regency::find(request('regency_destination'))->name,
            'district_destination' => District::find(request('district_destination'))->name,
            'village_destination' => Village::find(request('village_destination'))->name,
            'zipcode_destination' => Village::find(request('village_destination'))->zipcode,
            'weight' => (float) request('weight')/1000
        ];

        $villageOriginLatitude = Village::findOrFail(request('village_origin'))->latitude;
        $villageOriginLongitude = Village::findOrFail(request('village_origin'))->longitude;
        $villageDestinationLatitude = Village::findOrFail(request('village_destination'))->latitude;
        $villageDestinationLongitude = Village::findOrFail(request('village_destination'))->longitude;

        $distance = $this->calculateDistance($villageOriginLatitude, $villageOriginLongitude, $villageDestinationLatitude, $villageDestinationLongitude);
        $weight = $data['weight'];

        $fee = $this->calculateFee($weight, $distance);
        $deliveryTime = $this->calculateDeliveryTime($distance);

        $shipping = $this->storeShippingData($distance, $deliveryTime, $fee);

        return view('pricelist', compact('data', 'distance', 'fee', 'deliveryTime', 'shipping'));
    }

    public function storeShippingData($distance, $deliveryTime, $fee)
    {
        $shipping = new Shipping();
        $shipping->distance = $distance;
        $shipping->delivery_time_economy = $deliveryTime['economy'];
        $shipping->delivery_time_regular = $deliveryTime['regular'];
        $shipping->delivery_time_express = $deliveryTime['express'];
        $shipping->fee_economy = $fee['economy'];
        $shipping->fee_regular = $fee['regular'];
        $shipping->fee_express = $fee['express'];
        $shipping->save();
    
        return $shipping;
    }
    

    public function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $theta = $longitude1 - $longitude2; 
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
        $distance = acos($distance); 
        $distance = rad2deg($distance); 
        $distance = $distance * 60 * 1.1515; 
        $distance = $distance * 1.609344; 

        return (round($distance,2)); 
    }

    public function calculateDeliveryTime($distance)
    {
        // Array untuk menentukan estimasi lama pengiriman berdasarkan jarak
        $deliveryTimeRanges = [
            50 => 3,    // 1-50 km = 3 hari
            75 => 4,
            100 => 5,
            150 => 6,
            200 => 7,
            250 => 8,
            300 => 9,
            350 => 10
        ];

        $deliveryTime = 10; 
        foreach ($deliveryTimeRanges as $range => $time) {
            if ($distance <= $range) {
                $deliveryTime = $time;
                break;
            }
        }

        $economy = ceil($deliveryTime * 5 / 3);
        $regular = $deliveryTime;
        $express = ceil($deliveryTime * 1 / 3);
    
        return compact('economy', 'regular', 'express');
    }

    public function calculateFee($weight, $distance)
    {   
        $pricePerKgRanges = [
            100 => 10000,  // 1-100 km
            200 => 15000,
            300 => 20000,
            400 => 25000,
            500 => 30000
        ];
    
        $pricePerKg = 30000;
        foreach ($pricePerKgRanges as $range => $price) {
            if ($distance <= $range) {
                $pricePerKg = $price;
                break;
            }
        }

        $fee = $weight * $pricePerKg;

        $economy = ceil($fee * 1 / 2);
        $regular = $fee;
        $express = ceil($fee * 5 / 2);
    
        return compact('economy', 'regular', 'express');
    }
}
