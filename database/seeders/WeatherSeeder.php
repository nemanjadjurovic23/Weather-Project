<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = Cities::all();

        foreach ($cities as $city) {
            $weather = WeatherModel::where(['city_id' => $city->id])->first();

            if ($weather !== null) {
                $this->command->getOutput()->error('City not found');
            } else {
                WeatherModel::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30),
                ]);
            }
        }

    }
}
