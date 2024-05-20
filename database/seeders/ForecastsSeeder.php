<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecasts;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all();
        $lastTemperature = null;

        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++) {
                $weatherType = Forecasts::WEATHERS[rand(0, 3)];
                $probability = rand(1, 100);

                if ($i == 0) {
                    if ($weatherType == 'rainy') {
                        $lastTemperature = rand(-10, 50);
                    } else if ($weatherType == 'snowy') {
                        $lastTemperature = rand(1, -20);
                    } else if ($weatherType == 'cloudy') {
                        $lastTemperature = rand(-20, 15);
                    } else if ($weatherType == 'sunny') {
                        $lastTemperature = rand(-20, 50);
                        $probability = 0;
                    }
                } else {
                    $changeTemperature = rand(-5, 5);
                    $lastTemperature += $changeTemperature;
                    if ($lastTemperature >= -10 && $lastTemperature <= 50) {
                        $weatherType = 'rainy';
                    } else if ($lastTemperature <= 1) {
                        $weatherType = 'snowy';
                    } else if ($lastTemperature >= -20 && $lastTemperature < 15) {
                        $weatherType = 'cloudy';
                    } else if ($lastTemperature >= -20) {
                        $weatherType = 'sunny';
                    }
                }

                Forecasts::create([
                    'city_id' => $city->id,
                    'temperature' => $lastTemperature,
                    'date' => Carbon::now()->addDays($i),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }
        }

    }
}
