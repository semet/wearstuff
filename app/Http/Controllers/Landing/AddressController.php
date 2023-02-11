<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        Address::create([
            'user_id' => auth()->id(),
            'province_id' => $request->province,
            'city_id' => $request->city,
            'line' => $request->line,
            'building_number' => $request->building_number,
        ]);

        return back();
    }
}
