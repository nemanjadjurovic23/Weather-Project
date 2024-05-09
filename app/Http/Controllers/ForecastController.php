<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;
use Illuminate\Http\Request;

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
        $cities = Cities::with('forecasts')->get();
        $forecasts = Forecasts::with('city')->get();

        return view('forecast', compact('cities', 'forecasts'));
    }
}
