<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;

class ForecastController extends Controller
{
    public function forecast($city)
    {
        $cities = [
            'beograd' => [19, 20, 24, 23, 21],
            'sarajevo' => [20, 14, 18, 22, 23],
        ];

        $city = strtolower($city);

        if (!array_key_exists($city, $cities)) {
            die('This city does not exist');
        }

        dd($cities[$city]);
    }

    public function index()
    {
        $forecasts = Forecasts::all();

        return view('forecast', compact('forecasts'));
    }

    public function show($id)
    {
        $city = Cities::with('forecasts')->find($id);
        return view('forecast', compact('city'));
    }
}
