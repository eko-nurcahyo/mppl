<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto increment primary key
            $table->string('judul');
            $table->string('slug')->unique(); // ✅ wajib untuk identifikasi unik
            $table->string('kategori')->nullable(); // ✅ kategori (misalnya: Pendidikan)
            $table->string('wilayah')->nullable();  // ✅ wilayah besar (misalnya: Jawa)
            $table->string('kota')->nullable();     // ✅ nama kota spesifik
            $table->text('deskripsi');
            $table->bigInteger('target_donasi');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->string('gambar')->nullable();
            $table->string('foto_kisah')->nullable(); // ✅ foto pendukung kisah
            $table->longText('kisah')->nullable();    // ✅ kisah menyentuh
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
