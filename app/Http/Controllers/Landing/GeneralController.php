<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Irfa\RajaOngkir\Facades\Ongkir;

class GeneralController extends Controller
{
    public function cityByProvince(Request $request)
    {
        $cities = City::where('province_id', $request->provinceId)->get();

        return response()->json([
            'cities' => $cities
        ]);
    }

    // public function getCouriers(Request $request)
    // {
    //     $get = Ongkir::find(['origin' => config('app.city_origin'), 'destination' => $request->cityId, 'weight' => 1000, 'courier' => 'jne'])
    //         ->costDetails()
    //         ->get();

    //     return response()->json([
    //         'couriers' => $get
    //     ]);
    // }
}
