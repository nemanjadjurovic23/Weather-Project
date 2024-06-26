<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function addCity()
    {
        return view('add-city');
    }

    public function saveCity(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'temperature' => 'required|integer'
        ]);

        WeatherModel::create([
            'city' => $request->get('city'),
            'temperature' => $request->get('temperature'),
        ]);

        return redirect()->route('addCity');
    }

    public function allCities()
    {
        $allCities = WeatherModel::with('city')->get();
        return view('all-cities', compact('allCities'));
    }

    public function editCity(WeatherModel $cityTemperatures)
    {
        return view('edit-city', compact('cityTemperatures'));
    }

    public function updateCity(Request $request, WeatherModel $cityTemperatures)
    {
        $cityTemperatures->update([
            'city' => $request->get('city'),
            'temperature' => $request->get('temperature'),
        ]);

        return redirect()->route('allCities')->with("success", "Successfully updated City");
    }

    public function deleteCity($cityTemperatures)
    {
        $city = WeatherModel::with('city')->where(['id' => $cityTemperatures])->first();

        if ($city == null) {
            die('City not found');
        }
        $city->delete();
        return redirect()->route('allCities')->with("success", "Successfully deleted City");
    }

    public function index()
    {
        $weathers = WeatherModel::with('city')->get();

        return view('weather', compact('weathers'));
    }

    public function addWeather(Cities $city)
    {
        $weathers = WeatherModel::with('city')->get();

        return view('admin/add-weather', compact('weathers', 'city'));
    }

}
