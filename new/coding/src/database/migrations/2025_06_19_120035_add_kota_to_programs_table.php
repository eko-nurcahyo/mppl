<?php

// Mengimpor class-class yang dibutuhkan untuk membuat migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan class anonymous yang merupakan turunan dari Migration
return new class extends Migration
{
    // Fungsi ini akan dijalankan ketika perintah `php artisan migrate` dieksekusi
    public function up(): void
    {
        // Melakukan perubahan pada tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kota' belum ada di tabel
            if (!Schema::hasColumn('programs', 'kota')) {
                // Menambahkan kolom 'kota' bertipe string setelah kolom 'kategori'
                $table->string('kota')->after('kategori');
            }
        });
    }

    // Fungsi ini dijalankan saat melakukan rollback (`php artisan migrate:rollback`)
    public function down(): void
    {
        // Mengembalikan tabel ke kondisi sebelum migrasi ini dijalankan
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kota' ada di tabel
            if (Schema::hasColumn('programs', 'kota')) {
                // Jika ada, kolom 'kota' akan dihapus
                $table->dropColumn('kota');
            }
        });
    }
};

// ✅ Kesimpulan:
//File migrasi ini digunakan untuk menambahkan kolom kota pada tabel programs jika belum ada. Kolom kota berguna untuk menyimpan lokasi spesifik kota dari setiap program. File ini juga menyertakan fungsi rollback (down) untuk menghapus kolom tersebut jika diperlukan. Ini adalah cara yang aman dan fleksibel dalam pengelolaan struktur database di Laravel.