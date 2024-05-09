<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecasts extends Model
{
    use HasFactory;

    protected $table = 'forecasts';

    protected $fillable = ([
        'city_id', 'temperature', 'date',
    ]);

    public function city()
    {
        return $this->belongsTo(Cities::class,'city_id', 'id');
    }
}