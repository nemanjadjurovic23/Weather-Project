<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{

    public function index(Cities $city)
    {
        return view('forecast', compact('city'));
    }

    public function addForecast(Request $request)
    {

        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required',
            'date' => 'required',
            'weather_type' => 'required',
        ]);

        Forecasts::create([
            'city_id' => $request->get('city_id'),
            'temperature' => $request->get('temperature'),
            'date' => $request->get('date'),
            'weather_type' => $request->get('weather_type'),
            'probability' => $request->get('probability'),
        ]);

        return redirect()->route('addForecastForm')->with('success', 'Forecast added!');
    }

    public function addForecastForm()
    {
        $cities = Cities::with('forecasts')->get();
        $forecasts = Forecasts::WEATHERS;

        return view('admin/add-forecast', compact('cities', 'forecasts'));
    }

    public function search(Request $request)
    {
        $cityName = $request->get('city');

        $cities = Cities::with('todaysForecast')->where("name", "LIKE", "%$cityName%")->get();

        if (count($cities) == 0) {
            return redirect()->back()->with('error', 'City not found');
        }

        $userFavourites = [];
        if(Auth::check()) {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }

        return view('search_results', compact('cities', 'userFavourites'));
    }
}
