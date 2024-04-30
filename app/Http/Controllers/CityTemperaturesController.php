<?php

namespace App\Http\Controllers;

use App\Models\CityTemperatures;
use Illuminate\Http\Request;

class CityTemperaturesController extends Controller
{
    public function addCity()
    {
        return view('add-city');
    }

    public function saveCity(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'temperature' => 'required'
        ]);

        CityTemperatures::create([
           'city' => $request->get('city'),
            'temperature' => $request->get('temperature'),
        ]);

        return redirect()->route('addCity');
    }

    public function allCities()
    {
        $allCities = CityTemperatures::all();

        return view('all-cities', compact('allCities'));
    }
}
