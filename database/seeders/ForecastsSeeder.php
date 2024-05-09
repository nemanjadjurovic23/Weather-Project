<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecasts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                Forecasts::create([
                    'city_id' => $city->id,
                    'temperature' => rand(10, 30),
                    'date' => now()->subDays(rand(1, 365)),
                ]);
            }
        }

    }
}
