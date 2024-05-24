<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();

        if($user == null) {
            return redirect()->back()->with(['error' => 'You are not logged in.']);
        }

        UserCities::create([
            'city_id' => $city,
            'user_id' => $user->id,
        ]);

        return redirect()->back();
    }

    public function unfavourite($city)
    {
        $user = Auth::user();

        if($user == null) {
            return redirect()->back()->with(['error' => 'You are not logged in.']);
        }

        $userFavourite = UserCities::where([
            'city_id' => $city,
            'user_id' => $user->id,
        ])->first();

        $userFavourite->delete();

        return redirect()->back();
    }

    public function favouritesCities()
    {
        $user = Auth::user();

        if ($user == null) {
            return redirect()->back()->with(['error' => 'You are not logged in.']);
        }

        $userFavouriteCities = UserCities::where([
            'user_id' => $user->id,
        ])->get();

        return view('welcome', compact('userFavouriteCities'));
    }
}
