<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\DonasiController;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});
Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

// Tambahkan ini untuk home!
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/donasi', [DonasiController::class, 'index']);
Route::post('/donasi', [DonasiController::class, 'store']);
