<?php

// Mengimpor class-class yang diperlukan dari Laravel untuk membuat migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mendefinisikan migration anonymous class yang mewarisi dari class Migration
return new class extends Migration
{
    // Fungsi 'up' akan dijalankan saat melakukan migrate untuk menambahkan kolom baru ke tabel 'programs'
    public function up()
    {
        // Mengakses struktur tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kisah' belum ada di tabel
            if (!Schema::hasColumn('programs', 'kisah')) {
                // Jika belum ada, maka tambahkan kolom 'kisah'
                // longText → karena teks kisah bisa panjang
                // nullable → kolom ini tidak wajib diisi
                // after('deskripsi') → diletakkan setelah kolom deskripsi
                $table->longText('kisah')->nullable()->after('deskripsi');
            }

            // Mengecek apakah kolom 'foto_kisah' belum ada di tabel
            if (!Schema::hasColumn('programs', 'foto_kisah')) {
                // Jika belum ada, maka tambahkan kolom 'foto_kisah'
                // string → menyimpan path atau nama file gambar
                // nullable → kolom ini tidak wajib diisi
                // after('kisah') → diletakkan setelah kolom kisah
                $table->string('foto_kisah')->nullable()->after('kisah');
            }
        });
    }

    // Fungsi 'down' akan dijalankan saat rollback migration untuk menghapus kolom yang ditambahkan sebelumnya
    public function down()
    {
        // Mengakses tabel 'programs'
        Schema::table('programs', function (Blueprint $table) {
            // Mengecek apakah kolom 'kisah' ada, jika ada maka dihapus
            if (Schema::hasColumn('programs', 'kisah')) {
                $table->dropColumn('kisah');
            }

            // Mengecek apakah kolom 'foto_kisah' ada, jika ada maka dihapus
            if (Schema::hasColumn('programs', 'foto_kisah')) {
                $table->dropColumn('foto_kisah');
            }
        });
    }
};
// ✅ Kesimpulan:
//Migration ini menambahkan dua kolom baru ke tabel programs:
//kisah: berisi cerita atau latar belakang dari program (tipe longText, bisa kosong).
//foto_kisah: menyimpan gambar pendukung cerita (tipe string, bisa kosong).
//Kedua kolom diletakkan setelah kolom deskripsi dan aman untuk dijalankan ulang karena disertai pengecekan hasColumn. Fungsi down() memungkinkan rollback dengan cara menghapus kembali kolom-kolom tersebut jika sudah ada. Migration ini penting untuk mendukung konten visual dan narasi dalam sebuah program donasi.