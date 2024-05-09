<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{

    public function run(): void
    {
//        $city = $this->command->getOutput()->ask('What is your city?');
//        if ($city == null) {
//            $this->command->getOutput()->error('You have not entered a city name');
//        }
//
//        $cityTemperature = $this->command->getOutput()->ask('What is your city temperature?');
//        if ($cityTemperature == null) {
//            $this->command->getOutput()->error('You have not entered a city temperature');
//        }
//
//        if (WeatherModel::where('city', $city)->exists()) {
//            $this->command->getOutput()->error('City already exists');
//        } else {
//            WeatherModel::create([
//                'city' => $city,
//                'temperature' => $cityTemperature,
//            ]);
//
//            $this->command->getOutput()->info("You have successfully added city $city and a temperature $cityTemperature");
//
//        }

        $cities = Cities::whereBetween('id', [100, 200])->get();

        foreach ($cities as $city) {
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(10, 30),
                'created_at' => now(),
            ]);

        }


    }
}
