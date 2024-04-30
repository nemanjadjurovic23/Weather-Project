<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTemperatures extends Model
{
    use HasFactory;

    protected $table = 'city_temperatures';
    protected $fillable = ([
       'city', 'temperature',
    ]);
}
