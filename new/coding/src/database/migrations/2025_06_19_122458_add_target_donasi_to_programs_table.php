<?php

// Mengimpor class-class yang diperlukan untuk migrasi
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan class anonymous yang meng-extend Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Fungsi ini akan dijalankan ketika menjalankan `php artisan migrate`.
     * Namun, baris yang menambahkan kolom 'target_donasi' dikomentari, 
     * artinya kolom tersebut tidak akan ditambahkan kecuali tanda komentar (//) dihapus.
     */
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            //$table->bigInteger('target_donasi')->after('kota');
            // Baris di atas akan menambahkan kolom 'target_donasi' bertipe bigInteger 
            // setelah kolom 'kota', untuk menyimpan jumlah target donasi.
            // Namun saat ini dinonaktifkan (dikomentari), sehingga tidak akan berpengaruh jika dijalankan.
        });
    }

    /**
     * Reverse the migrations.
     *
     * Fungsi ini dijalankan saat melakukan rollback (`php artisan migrate:rollback`).
     * Ia akan menghapus kolom 'target_donasi' dari tabel 'programs' jika kolom tersebut sudah ada.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('target_donasi');
            // Menghapus kolom 'target_donasi' dari tabel 'programs'.
        });
    }
};
// ✅ Kesimpulan:
//File migrasi ini dirancang untuk menambahkan kolom target_donasi ke tabel programs, namun baris penambahan tersebut masih dikomentari sehingga saat dijalankan tidak akan ada perubahan. Sementara itu, fungsi down() tetap menghapus kolom target_donasi jika rollback dilakukan.
//Jika ingin mengaktifkan migrasi penambahan kolom, cukup hapus tanda komentar (//) pada baris $table->bigInteger(...).