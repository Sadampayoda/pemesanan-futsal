<?php

use App\Http\Controllers\FutsalController;
use App\Http\Controllers\ValidationController;
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

Route::resource('futsal',FutsalController::class);
