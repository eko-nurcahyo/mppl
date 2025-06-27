<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat migration anonymous class (tanpa nama class khusus)
return new class extends Migration
{
    // Method 'up' dijalankan saat melakukan migrate untuk menambahkan kolom baru
    public function up(): void
    {
        // Menargetkan tabel 'programs' untuk dimodifikasi
        Schema::table('programs', function (Blueprint $table) {
            // Jika kolom 'slug' belum ada dalam tabel 'programs'
            if (!Schema::hasColumn('programs', 'slug')) {
                // Tambahkan kolom 'slug' bertipe string setelah kolom 'judul' dan buat nilainya unik
                $table->string('slug')->after('judul')->unique();
            }
        });
    }

    // Method 'down' dijalankan saat melakukan rollback migration
    public function down(): void
    {
        // Menargetkan tabel 'programs' kembali
        Schema::table('programs', function (Blueprint $table) {
            // Jika kolom 'slug' ada, maka hapus kolom tersebut
            if (Schema::hasColumn('programs', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
//✅ Kesimpulan:
//Migration ini menambahkan kolom slug (untuk URL unik dari judul program) ke tabel programs jika belum ada, dan akan dihapus saat rollback. Ini aman karena menggunakan pengecekan Schema::hasColumn agar tidak error saat dijalankan berulang