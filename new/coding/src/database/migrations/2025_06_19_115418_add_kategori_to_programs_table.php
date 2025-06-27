<?php

// Import class-class bawaan Laravel untuk migrasi database
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan instance dari class anonymous yang mewarisi Migration
return new class extends Migration
{
    // Fungsi up dijalankan saat migration dijalankan dengan perintah `php artisan migrate`
    public function up(): void
    {
        // Menambahkan kolom baru pada tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kategori' belum ada di tabel
            if (!Schema::hasColumn('programs', 'kategori')) {
                // Menambahkan kolom string 'kategori' setelah kolom 'slug'
                // Kolom ini akan menyimpan jenis kategori program (misalnya: Pendidikan, Bencana Alam, dll)
                $table->string('kategori')->after('slug');
            }
        });
    }

    // Fungsi down dijalankan saat migration di-rollback dengan perintah `php artisan migrate:rollback`
    public function down(): void
    {
        // Menghapus kolom dari tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kategori' ada sebelum dihapus
            if (Schema::hasColumn('programs', 'kategori')) {
                // Menghapus kolom 'kategori' agar struktur tabel kembali seperti semula
                $table->dropColumn('kategori');
            }
        });
    }
};
// ✅ Kesimpulan:
//Migration ini menambahkan kolom kategori pada tabel programs, yang bertipe string dan diletakkan setelah kolom slug. Kolom ini berguna untuk mengelompokkan jenis program (misalnya: Pendidikan, Air Bersih, Bencana Alam). Fitur pengecekan Schema::hasColumn digunakan untuk memastikan kolom hanya ditambahkan atau dihapus jika perlu, sehingga membuat migration aman untuk dijalankan berulang kali.