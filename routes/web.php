<?php

use App\Http\Controllers\CityTemperaturesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('admin')->group(function () {
   Route::get('/add-city', [CityTemperaturesController::class, 'addCity'])->name('addCity');
   Route::post('/save-city', [CityTemperaturesController::class, 'saveCity'])->name('saveCity');

   Route::get('/city-edit/{id}', [CityTemperaturesController::class, 'editCity'])->name('editCity');
   Route::get('/city-delete/{id}', [CityTemperaturesController::class, 'deleteCity'])->name('deleteCity');
   Route::get('/all-cities', [CityTemperaturesController::class, 'allCities'])->name('allCities');
});

require __DIR__.'/auth.php';
