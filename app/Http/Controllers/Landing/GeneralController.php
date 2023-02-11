<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function cityByProvince(Request $request)
    {
        $cities = City::where('province_id', $request->provinceId)->get();

        return response()->json([
            'cities' => $cities
        ]);
    }
}
