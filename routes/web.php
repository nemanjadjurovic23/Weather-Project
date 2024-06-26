<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserCitiesController::class, 'favouritesCities'])->name('user.favouritesCities');

Route::get('/forecast/search', [ForecastController::class, 'search'])->name('forecast.search');

Route::get('/forecast/{city:name}', [ForecastController::class, 'index'])->name('forecast');
Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/user-cities/favourite/{city}', [UserCitiesController::class, 'favourite'])->name('user-cities.favourite');
Route::get('/user-cities/unfavourite/{city}', [UserCitiesController::class, 'unfavourite'])->name('user-cities.unfavourite');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

   Route::get('/add-city', [WeatherController::class, 'addCity'])->name('addCity');
   Route::post('/save-city', [WeatherController::class, 'saveCity'])->name('saveCity');
   Route::get('/city-edit/{cityTemperatures}', [WeatherController::class, 'editCity'])->name('editCity');
   Route::get('/all-cities', [WeatherController::class, 'allCities'])->name('allCities');
   Route::put('/update-city/{cityTemperatures}', [WeatherController::class, 'updateCity'])->name('updateCity');
   Route::get('/city-delete/{cityTemperatures}', [WeatherController::class, 'deleteCity'])->name('deleteCity');

   Route::get('/add-weather', [WeatherController::class, 'addWeather'])->name('addWeather');

   Route::post('/weather/update', [AdminWeatherController::class, 'updateWeather'])->name('updateWeather');

   Route::get('/forecast', [ForecastController::class, 'addForecastForm'])->name('addForecastForm');
   Route::post('/forecast', [ForecastController::class, 'addForecast'])->name('addForecast');
});

require __DIR__.'/auth.php';
