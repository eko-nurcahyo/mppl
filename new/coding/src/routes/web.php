<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CauseController;

// Halaman utama dan statis
Route::view('/', 'frontend.index')->name('home');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/service', 'frontend.service')->name('service');
Route::view('/team', 'frontend.team')->name('team');
Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
Route::view('/404', 'frontend.404')->name('404');

// Halaman daftar program donasi
Route::get('/causes', [CauseController::class, 'index'])->name('causes');

// Halaman form donasi spesifik program
Route::get('/donate/{program}', [DonationController::class, 'show'])->name('donate.show');

// Proses penyimpanan donasi dari form
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');

// Contact Us
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback untuk halaman yang tidak ditemukan
Route::fallback(function () {
    return view('frontend.404');
});
