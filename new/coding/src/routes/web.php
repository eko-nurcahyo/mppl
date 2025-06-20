<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CauseController;

// Livewire routes (biarkan tetap)
Livewire::setUpdateRoute(fn($handle) => Route::post(config('app.asset_prefix') . '/livewire/update', $handle));
Livewire::setScriptRoute(fn($handle) => Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle));

// Halaman statis frontend
Route::view('/', 'frontend.index')->name('home'); // INI SAJA YANG DIPAKAI UNTUK /
Route::view('/about', 'frontend.about')->name('about');
Route::view('/service', 'frontend.service')->name('service');
Route::view('/team', 'frontend.team')->name('team');
Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/404', 'frontend.404')->name('404');

// Halaman daftar program donasi (dengan filter)
Route::get('/causes', [CauseController::class, 'index'])->name('causes');

// Halaman form donasi berdasarkan program
Route::get('/donate/{program}', [DonationController::class, 'show'])->name('donate.show'); // GANTI KE 'show'

// Simpan donasi dari form
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');

// Submit contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback jika URL tidak ditemukan
Route::fallback(fn() => view('frontend.404'));


