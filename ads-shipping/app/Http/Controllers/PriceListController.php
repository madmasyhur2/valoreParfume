<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class PriceListController extends Controller
{
    public function store()
    {
        $data = [
            'province_origin' => Province::find(request('province_origin'))->name,
            'regency_origin' => Regency::find(request('regency_origin'))->name,
            'district_origin' => District::find(request('district_origin'))->name,
            'village_origin' => Village::find(request('village_origin'))->name,
            'province_destination' => Province::find(request('province_destination'))->name,
            'regency_destination' => Regency::find(request('regency_destination'))->name,
            'district_destination' => District::find(request('district_destination'))->name,
            'village_destination' => Village::find(request('village_destination'))->name,
            'weight' => (float) request('weight')
        ];

        return view('pricelist', compact('data'));
    }
}
