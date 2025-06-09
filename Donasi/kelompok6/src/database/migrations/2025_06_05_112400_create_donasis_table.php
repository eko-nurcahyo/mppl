<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('donasis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('program_donasi_id')->nullable()->constrained('program_donasis');
        $table->string('nama');
        $table->string('email');
        $table->integer('nominal');
        $table->string('metode_pembayaran');
        $table->string('bukti_transfer');
        $table->enum('status', ['pending', 'berhasil', 'gagal'])->default('pending');
        $table->string('pdf_path')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
