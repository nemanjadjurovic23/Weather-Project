<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    use HasFactory;

    protected $table = 'user_cities';
    protected $fillable = ['user_id', 'city_id'];

    public function city()
    {
        return $this->hasMany(Cities::class, 'id', 'city_id');
    }
}
