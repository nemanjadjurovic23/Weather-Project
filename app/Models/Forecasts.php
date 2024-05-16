<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecasts extends Model
{
    use HasFactory;

    protected $table = 'forecasts';

    protected $fillable = ([
        'city_id', 'temperature', 'date', 'weather_type', 'probability',
    ]);

    const WEATHERS = ['rainy', 'sunny', 'snowy'];

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

}
