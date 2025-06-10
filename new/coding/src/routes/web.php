<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ContactController;

// Livewire routes (biarkan saja, ini untuk Livewire asset)
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});
Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

// Routing halaman utama frontend (pakai folder frontend)
Route::view('/', 'frontend.index')->name('home');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/causes', 'frontend.causes')->name('causes');
Route::view('/service', 'frontend.service')->name('service');
Route::view('/donate', 'frontend.donate')->name('donate');
Route::view('/team', 'frontend.team')->name('team');
Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/404', 'frontend.404')->name('404');


// Route untuk submit contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback (jika URL tidak ditemukan)
Route::fallback(function () {
    return view('frontend.404');
});
