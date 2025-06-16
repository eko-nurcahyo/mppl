<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CauseController;

// Livewire routes (biarkan saja, ini untuk Livewire asset)
Livewire::setUpdateRoute(fn($handle) => Route::post(config('app.asset_prefix') . '/livewire/update', $handle));
Livewire::setScriptRoute(fn($handle) => Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle));

// Halaman statis frontend
Route::view('/', 'frontend.index')->name('home');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/service', 'frontend.service')->name('service');
Route::view('/team', 'frontend.team')->name('team');
Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/404', 'frontend.404')->name('404');
Route::get('/donations/create', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');


// Halaman dinamis daftar program donasi
Route::get('/causes', [CauseController::class, 'index'])->name('causes');

// Halaman form donasi dan proses simpan donasi
Route::get('/donate/{program}', [DonationController::class, 'showDonate'])->name('donate.show');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');

// Route untuk submit contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback jika url tidak ditemukan
Route::fallback(fn() => view('frontend.404'));
