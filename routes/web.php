<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
