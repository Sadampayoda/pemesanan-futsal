<?php

// use App\Http\Controllers\;
use App\Http\Controllers\{DashboardController, ValidationController,FutsalController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ValidationController::class)->group(function(){
    Route::get('login','login')->name('login');
    Route::get('register','register')->name('register');
    Route::post('login','loginValidate')->name('login.validate');
    Route::post('register','registerValidate')->name('register.validate');
});
Route::controller(DashboardController::class)->group(function(){
    Route::get('dashboard','index')->name('dashboard');
});

Route::resource('futsal',FutsalController::class);
