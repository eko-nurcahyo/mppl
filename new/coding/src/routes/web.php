<?php

// Mengimpor semua class route dan controller yang dibutuhkan
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\Frontend\ProgramController;

// Halaman utama dan statis
Route::view('/', 'frontend.index')->name('home');
// Menampilkan view 'frontend.index' saat mengakses URL '/', dengan nama rute 'home'

Route::view('/about', 'frontend.about')->name('about');
// Menampilkan halaman statis 'about' (tentang kami)

Route::view('/service', 'frontend.service')->name('service');
// Menampilkan halaman layanan

Route::view('/team', 'frontend.team')->name('team');
// Menampilkan halaman tim

Route::view('/testimonial', 'frontend.testimonial')->name('testimonial');
// Menampilkan halaman testimoni

Route::view('/404', 'frontend.404')->name('404');
// Menyediakan halaman khusus untuk error 404 (tidak ditemukan)

// Halaman daftar program donasi
Route::get('/causes', [CauseController::class, 'index'])->name('causes');
// Memetakan URL '/causes' ke method 'index' dari CauseController, biasanya menampilkan semua program

// Halaman form donasi spesifik program
Route::get('/donate/{program}', [DonationController::class, 'show'])->name('donate.show');
// Menampilkan halaman form donasi berdasarkan program tertentu (parameter {program})

// Proses penyimpanan donasi dari form
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
// Menyimpan data donasi yang dikirim dari form, diproses oleh method 'store'

// Contact Us
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
// Menampilkan halaman formulir kontak

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
// Menangani pengiriman formulir kontak ke method 'submit'

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Fallback untuk halaman yang tidak ditemukan
Route::fallback(function () {
    return view('frontend.404');
});
// Jika URL yang diakses tidak ditemukan, akan diarahkan ke view 'frontend.404' (halaman error)

//✅ Kesimpulan:
//File web.php ini berisi semua definisi rute frontend untuk aplikasi Laravel, seperti:
//Halaman statis (home, about, service, team, testimonial, 404).
//Halaman dinamis terkait program donasi (/causes, /donate/{program}).
//Proses penyimpanan donasi dan pengiriman kontak.
//Penanganan fallback saat route tidak ditemukan.
//Dengan struktur ini, Laravel dapat menavigasi halaman secara efisien, menjaga organisasi aplikasi tetap rapi, dan memastikan pengalaman pengguna yang konsisten di berbagai URL.