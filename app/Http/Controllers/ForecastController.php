<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;

class ForecastController extends Controller
{

    public function index(Cities $city)
    {
        $forecasts = Forecasts::where(['city_id' => $city->id])->get();

        return view('forecast', compact('forecasts'));
    }

//    public function show($id)
//    {
//        $city = Cities::with('forecasts')->find($id);
//        return view('forecast', compact('city'));
//    }
}
