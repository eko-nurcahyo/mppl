<?php

// Mengimpor class yang diperlukan untuk proses migrasi
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan instance class anonymous Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Fungsi ini akan dijalankan ketika melakukan `php artisan migrate`.
     */
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            //$table->dropColumn('target');
            // Baris di atas (masih dikomentari) dimaksudkan untuk menghapus kolom 'target' dari tabel 'programs'.
            // Namun karena masih dikomentari, maka kolom 'target' tidak akan dihapus saat migrasi dijalankan.
        });
    }

    /**
     * Reverse the migrations.
     *
     * Fungsi ini akan dijalankan ketika menjalankan `php artisan migrate:rollback`.
     * Ini akan mengembalikan perubahan yang dibuat di fungsi up().
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->integer('target')->nullable();
            // Menambahkan kembali kolom 'target' dengan tipe data integer dan nullable ke tabel 'programs'.
            // Ini berguna jika sebelumnya kolom 'target' telah dihapus.
        });
    }
};
// ✅ Kesimpulan:
//File migrasi ini bertujuan untuk menghapus kolom target dari tabel programs, tetapi karena perintahnya masih dikomentari, maka tidak akan terjadi perubahan saat dijalankan. Namun, fungsi down() tetap menambahkan kembali kolom target jika rollback dilakukan.
//Jika kamu ingin benar-benar menghapus kolom target, hapus tanda komentar (//) pada baris $table->dropColumn('target');.