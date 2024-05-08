<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach($cities as $city => $temperatures) {
            foreach ($temperatures as $temperature) {
                Temperature::factory()->create([
                    'city' => $city,
                    'temperature' => $temperature,
                ]);
            }

        }

    }
}
