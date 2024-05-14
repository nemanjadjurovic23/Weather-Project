<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;

class ForecastController extends Controller
{

    public function index(Cities $city)
    {
        return view('forecast', compact('city'));
    }

//    public function show($id)
//    {
//        $city = Cities::with('forecasts')->find($id);
//        return view('forecast', compact('city'));
//    }
}
