<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CauseController;



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
Route::get('/causes', [CauseController::class, 'index'])->name('causes');
Route::view('/service', 'frontend.service')->name('service');
Route::view('/donate', 'frontend.donate')->name('donate');
Route::view('/team', 'frontend.team')->name('team');
Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/404', 'frontend.404')->name('404');
Route::get('/donasi', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donasi', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donate/{program}', [DonationController::class, 'showDonate'])->name('donate');



// Route untuk submit contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback (jika URL tidak ditemukan)
Route::fallback(function () {
    return view('frontend.404');
});
