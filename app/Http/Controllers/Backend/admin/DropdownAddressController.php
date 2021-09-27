<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\City as City;

class DropdownAddressController extends Controller
{
    //
    public function getCity(Request $request)
    {
        $idProvince = $request->id;
        $city = City::where('province_id', $idProvince)->get();
        return response()->json($city);

    }
}
