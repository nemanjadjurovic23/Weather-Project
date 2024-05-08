<?php

namespace App\Http\Controllers;

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
}
