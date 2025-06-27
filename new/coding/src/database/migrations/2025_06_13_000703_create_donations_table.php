<?php

// Mengimpor class bawaan Laravel untuk menangani migrasi database
use Illuminate\Database\Migrations\Migration;

// Mengimpor class Blueprint yang digunakan untuk mendefinisikan struktur tabel
use Illuminate\Database\Schema\Blueprint;

// Mengimpor class Schema untuk menjalankan perintah pembuatan atau penghapusan tabel
use Illuminate\Support\Facades\Schema;

// Membuat class migrasi CreateDonationsTable yang akan menangani pembuatan tabel 'donations'
class CreateDonationsTable extends Migration
{
    // Method up() digunakan untuk membuat struktur tabel saat perintah migrate dijalankan
    public function up()
    {
        // Membuat tabel bernama 'donations'
        Schema::create('donations', function (Blueprint $table) {

            $table->id(); 
            // Membuat kolom 'id' sebagai primary key bertipe bigint unsigned dan auto increment
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            // Membuat kolom foreign key 'program_id' yang terhubung ke tabel 'programs'
            // 'constrained()' otomatis merujuk ke tabel 'programs' dan kolom 'id'
            // 'onDelete('cascade')' artinya jika program terkait dihapus, donasi ini juga ikut dihapus
            $table->string('nama');
            // Kolom untuk menyimpan nama donatur, bertipe string (varchar 255)
            $table->string('email');
            // Kolom untuk menyimpan email donatur, bertipe string
            $table->bigInteger('nominal');
            // Kolom untuk menyimpan nominal donasi, bertipe bigInteger (karena nilainya bisa besar)
            $table->string('metode_pembayaran');
            // Kolom untuk menyimpan metode pembayaran (misalnya: BCA, Dana, dll), bertipe string
            $table->string('bukti_transfer')->nullable();
            // Kolom untuk menyimpan path file bukti transfer yang diunggah, opsional (nullable)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // Kolom untuk status donasi, hanya bisa berisi: 'pending', 'approved', atau 'rejected'
            // Nilai default-nya adalah 'pending'
            $table->text('keterangan')->nullable();
            // Kolom teks tambahan untuk keterangan (misalnya catatan admin), opsional
            $table->timestamps();
            // Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    // Method down() akan dijalankan jika migrasi di-rollback
    public function down()
    {
        Schema::dropIfExists('donations');
        // Menghapus tabel 'donations' jika ada
    }
}
//kesimpulan:
//File migration ini digunakan untuk membuat tabel donations di database, yang menyimpan data donasi seperti nama donatur, email, nominal, bukti transfer, dan status. Relasi dengan tabel programs juga diatur menggunakan foreign key program_id, sehingga donasi terhubung ke program yang didanai. Migration ini penting untuk menyimpan dan melacak seluruh aktivitas donasi dalam aplikasi penggalangan dana.