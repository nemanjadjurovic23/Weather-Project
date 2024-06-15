<?php

namespace App\Console\Commands;

use App\Models\Cities;
use App\Models\Forecasts;
use App\Services\WeatherService;
use Illuminate\Console\Command;

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
        $city = $this->argument('city');
        $dbCity = Cities::where(['name' => $city])->first();

        if ($dbCity == null) {
            Cities::create(['name' => $city]);
        }

        $weatherService = new WeatherService();
        $jsonResponse = $weatherService->getForecast($city);

        if(isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
        }

        if ($dbCity->todaysForecast != null) {
            $this->output->comment('Command finished');
            return;
        }

        $forecastDay = $jsonResponse['forecast']['forecastday'][0];
        $forecastDate = $forecastDay['date'];
        $temperature = $forecastDay['day']['avgtemp_c'];
        $weatherType = $forecastDay['day']['condition']['text'];
        $probability = $forecastDay['day']['daily_chance_of_rain'];

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'date' => $forecastDate,
            'weather_type' => strtolower($weatherType),
            'probability' => $probability,
        ];

        Forecasts::create($forecast);
        $this->output->comment('Added new forecast');
    }
}
