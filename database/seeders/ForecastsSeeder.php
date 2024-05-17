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

        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++) {
                $weatherType = Forecasts::WEATHERS[rand(0, 3)];
                $probability = rand(1, 100);

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

                Forecasts::create([
                    'city_id' => $city->id,
                    'temperature' => $lastTemperature,
                    'date' => Carbon::now()->addDays(rand(1, 30)),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }
        }

    }
}
