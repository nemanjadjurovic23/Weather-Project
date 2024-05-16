<?php

namespace App\Http;

class ForecastHelper
{

    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-showers-heavy',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
    ];
    public static function getIconByWeatherType($type)
    {
        $icon = self::WEATHER_ICONS[$type];

        return $icon;
    }

    public static function getColorByTemperature($temperature)
    {
        if ($temperature <= 0) {
            $boja = 'lightBlue';
        } else if ($temperature >= 1 && $temperature <= 15) {
            $boja = 'blue';
        } else if ($temperature >= 15 && $temperature <= 25) {
            $boja = 'green';
        } else {
            $boja = 'red';
        }

        return $boja;
    }
}
