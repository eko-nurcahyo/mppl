<?php

// Import class-class bawaan Laravel yang diperlukan untuk membuat migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan class anonim turunan dari Migration (bentuk singkat Laravel 8+)
return new class extends Migration
{
    // Fungsi yang dijalankan saat menjalankan perintah `php artisan migrate`
    public function up(): void
    {
        // Menambahkan kolom baru pada tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'wilayah' belum ada
            if (!Schema::hasColumn('programs', 'wilayah')) {
                // Jika belum ada, tambahkan kolom 'wilayah' bertipe string, nullable (boleh kosong),
                // dan diletakkan setelah kolom 'kota'
                $table->string('wilayah')->nullable()->after('kota');
            }
        });
    }

    // Fungsi yang dijalankan saat melakukan rollback (`php artisan migrate:rollback`)
    public function down(): void
    {
        // Menghapus kolom dari tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'wilayah' ada
            if (Schema::hasColumn('programs', 'wilayah')) {
                // Jika ada, maka hapus kolom 'wilayah'
                $table->dropColumn('wilayah');
            }
        });
    }
};
// ✅ Kesimpulan:
//Migration ini digunakan untuk menambahkan kolom wilayah ke tabel programs jika kolom tersebut belum ada.
//Kolom ini diletakkan setelah kolom kota, bertipe string dan boleh bernilai null.
//Jika suatu saat ingin membatalkan perubahan, maka fungsi down() akan menghapus kolom wilayah jika kolom tersebut memang ada.
//Struktur ini aman karena dilindungi dengan pengecekan hasColumn, mencegah error jika kolom sudah ada atau belum ada.