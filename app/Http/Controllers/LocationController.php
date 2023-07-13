<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    public function index()
    {
        $provinces = Province::all();
        return view('index', compact('provinces'));
    }

    public function getRegencies(Request $request)
    {
        $regencies = Province::findOrFail($request->province_id)->regencies;
        return response()->json($regencies);
    }

    public function getDistricts(Request $request)
    {
        $districts = Regency::findOrFail($request->regency_id)->districts;
        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $villages = District::findOrFail($request->district_id)->villages;
        return response()->json($villages);
    }
    public function submitLocation(Request $request)
    {
        $villageId = $request->input('village');

        if (!$villageId) {
            return response()->json(['error' => 'Please select a village'], 422);
        }

        $village = Village::find($villageId);
        return response()->json($village);
    }
}
