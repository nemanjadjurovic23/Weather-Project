<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['name'];

    public function forecasts()
    {
        return $this->hasMany(Forecasts::class, 'city_id', 'id')->orderBy('date');
    }

    public function todaysForecast()
    {
        return $this->hasOne(Forecasts::class, 'city_id', 'id')->whereDate('date', Carbon::now());
    }
}
