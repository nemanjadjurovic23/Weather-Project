<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $email = $this->command->getOutput()->ask('What is your email?');

        if (User::where('email', $email)->exists()) {
            $this->command->getOutput()->error('Email already exists!');
        } else {
            $name = $this->command->getOutput()->ask('What is your name?');
            $password = $this->command->getOutput()->ask('What is your password?', 'password');
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->info('You have been successfully registered!');

        }

    }
}
