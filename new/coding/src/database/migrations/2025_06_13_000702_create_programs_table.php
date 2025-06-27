<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration bawaan Laravel
use Illuminate\Database\Schema\Blueprint;      // Digunakan untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema;         // Menyediakan facade Schema untuk manipulasi tabel

class CreateProgramsTable extends Migration
{
    // Method yang dijalankan saat migrasi dieksekusi
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' bertipe bigint unsigned, auto increment, dan menjadi primary key
            $table->string('judul'); // Kolom untuk menyimpan judul dari program donasi
            $table->string('slug')->unique(); // Kolom 'slug' bertipe string, unik, biasanya digunakan untuk URL program
            $table->string('kategori')->nullable(); // Kolom kategori (misal: Pendidikan, Bencana, dll), opsional
            $table->string('pulau')->nullable(); // Kolom untuk nama pulau besar tempat program dijalankan (misal: Jawa), opsional
            $table->string('kota')->nullable(); // Kolom untuk nama kota dari lokasi program, opsional
            $table->text('deskripsi'); // Kolom teks untuk menjelaskan deskripsi singkat program donasi
            $table->bigInteger('target_donasi'); // Kolom untuk menyimpan target dana yang ingin dikumpulkan (dalam angka besar)
            $table->date('tanggal_mulai')->nullable(); // Kolom untuk menyimpan tanggal mulai program, opsional
            $table->date('tanggal_akhir')->nullable(); // Kolom untuk menyimpan tanggal akhir program, opsional
            $table->string('gambar')->nullable(); // Kolom untuk menyimpan path atau nama file gambar utama program, opsional
            $table->string('foto_kisah')->nullable(); // Kolom opsional untuk foto pendukung yang menyertai kisah program
            $table->longText('kisah')->nullable(); // Kolom panjang untuk menceritakan kisah menyentuh di balik program, opsional
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif'); // Kolom enum status program, dengan nilai default 'aktif'
            $table->timestamps(); // Kolom otomatis 'created_at' dan 'updated_at' dari Laravel
        });
    }

    // Method yang dijalankan saat rollback migrasi
    public function down()
    {
        Schema::dropIfExists('programs'); // Menghapus tabel 'programs' jika rollback dijalankan
    }
}
// ✅ Kesimpulan:
//ile migration ini berfungsi untuk membuat tabel programs dalam database, yang menyimpan informasi detail mengenai program donasi seperti judul, lokasi, kategori, target donasi, kisah, dan status. Struktur ini sangat penting sebagai pondasi utama dalam sistem penggalangan dana karena semua data program akan direkam di sini. Dengan adanya kolom slug, kategori, wilayah, dan kisah, maka tampilan dan pengelolaan program menjadi lebih terstruktur dan informatif bagi pengguna aplikasi.