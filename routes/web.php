<?php

use App\Http\Controllers\CityTemperaturesController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

   Route::get('/add-city', [CityTemperaturesController::class, 'addCity'])->name('addCity');
   Route::post('/save-city', [CityTemperaturesController::class, 'saveCity'])->name('saveCity');
   Route::get('/city-edit/{cityTemperatures}', [CityTemperaturesController::class, 'editCity'])->name('editCity');
   Route::get('/all-cities', [CityTemperaturesController::class, 'allCities'])->name('allCities');
   Route::put('/update-city/{cityTemperatures}', [CityTemperaturesController::class, 'updateCity'])->name('updateCity');
   Route::get('/city-delete/{cityTemperatures}', [CityTemperaturesController::class, 'deleteCity'])->name('deleteCity');
});

require __DIR__.'/auth.php';
