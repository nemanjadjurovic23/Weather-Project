<?php

namespace Database\Seeders;

use App\Models\Cities;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart(100);

        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Cities::create([
                'name' => $faker->city,
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }


}
