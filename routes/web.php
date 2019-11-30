<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');
    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/list', [LeadController::class, 'index'])->name('lead.list');

    Route::get('/leads/add', [LeadController::class, 'create']);
    Route::post('/leads/save', [LeadController::class, 'store']);

    Route::get('/leads/view/{lead}', [LeadController::class, 'view'])->name('lead.view');
    Route::post('/leads/update', [LeadController::class, 'update'])->name('lead.update');
});

Auth::routes();
