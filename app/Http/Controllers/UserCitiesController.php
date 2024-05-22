<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        \App\Models\UserCities::create([
            'city_id' => $city,
            'user_id' => $user->id,
        ]);

        return redirect()->back();
    }
}
