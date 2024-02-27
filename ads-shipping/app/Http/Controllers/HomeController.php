<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class HomeController extends Controller
{
    public function index() 
    {
        $provinces = $this->getProvince();
        // return response()->json($provinces, 200);
        return view('home', [
            'provinces' => $provinces
        ]);
    }

    public function getProvince()
    {
        $provinces =  Province::all();
        // return response()->json($provinces, 200);
        return $provinces;
    }

    public function getRegency($province_id)
    {
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistrict($regency_id)
    {
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }

    public function getVillage($district_id)
    {
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }



    public function districts(Request $request)
    {
        try {
            $districts = District::with(['regency', 'regency.province'])
            ->when($request->q, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->q . '%')
                    ->orWhereHas('regency', function ($query) use ($request) {
                        $query->where('name', 'LIKE', '%' . $request->q . '%');
                    })
                    ->orWhereHas('regency.province', function ($query) use ($request) {
                        $query->where('name', 'LIKE', '%' . $request->q . '%');
                    });
            })->get();

            $districts = $districts->map(function ($district) {
                return [
                    'id' => $district->id,
                    'text' => $district->name . ' - ' . $district->regency->name . ' - ' . $district->regency->province->name,
                ];
            });

            return response()->json($districts);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
