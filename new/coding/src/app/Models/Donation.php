<?php

// Namespace model Laravel. Menunjukkan lokasi file ini dalam struktur folder Laravel.
namespace App\Models;

// Trait HasFactory digunakan untuk mendukung fitur factory saat testing atau seeding data dummy.
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Mengimpor class Model dari Laravel sebagai dasar semua model Eloquent.
use Illuminate\Database\Eloquent\Model;

// Definisi class Donation yang merupakan model untuk tabel 'donations'.
class Donation extends Model
{
    // Menggunakan trait HasFactory agar model ini bisa menggunakan fitur factory Laravel.
    use HasFactory;

    /**
     * Daftar kolom yang dapat diisi secara massal (mass assignment).
     * Ini penting untuk keamanan agar tidak semua kolom bisa diisi sembarangan melalui create() atau update().
     */
    protected $fillable = [
        'program_id',          // Foreign key untuk relasi ke tabel 'programs'.
        'nama',                // Nama dari donatur.
        'email',               // Alamat email donatur.
        'nominal',             // Besarnya nominal donasi yang diberikan.
        'metode_pembayaran',   // Metode pembayaran yang digunakan (misalnya: BCA, Dana).
        'bukti_transfer',      // Nama file dari bukti transfer yang diunggah oleh donatur.
        'status',              // Status donasi: pending, approved, atau rejected.
        'keterangan',          // Keterangan tambahan dari admin (opsional).
    ];

    /**
     * Relasi antara donasi dan program.
     * Setiap donasi dimiliki oleh satu program (many-to-one).
     * Menggunakan Eloquent belongsTo untuk relasi ke model Program.
     */
    public function program()
    {
        return $this->belongsTo(Program::class); // Relasi ke tabel 'programs' berdasarkan 'program_id'
    }
}

//✅ Kesimpulan:
//File donation.php ini adalah model Eloquent Laravel yang merepresentasikan tabel donations. Fungsi utamanya:
//Mengatur field mana yang boleh diisi massal melalui $fillable.
//Mendefinisikan relasi belongsTo ke model Program, sehingga setiap donasi terkait dengan satu program donasi.
//Mendukung fitur factory dengan HasFactory untuk keperluan seeding/testing.
//Model ini memungkinkan interaksi yang efisien dan aman dengan data donasi di database.