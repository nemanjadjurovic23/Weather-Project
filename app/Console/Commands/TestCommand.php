<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $response = Http::get('https://reqres.in/api/users?page=2');
//        dd($response->json());

//        $response = Http::post('https://reqres.in/api/create', [
//            'name' => 'Nemanja',
//            'job' => 'programer'
//        ]);
//        dd($response->json());

        $city = $this->argument('city');

        $response = Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => 'b3d7912e8b9e4cecb82101913242705',
            'q' => $city,
            'aqi' => 'no',
        ]);

        dd($response->json());
    }
}
