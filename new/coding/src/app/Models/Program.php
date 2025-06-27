<?php

// Namespace untuk class model Program
namespace App\Models;

// Import class Model dari Laravel
use Illuminate\Database\Eloquent\Model;

// Import class Str untuk manipulasi string (digunakan untuk slug)
use Illuminate\Support\Str;

class Program extends Model
{
    // Daftar atribut yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'judul',             // Judul program donasi
        'slug',              // Slug URL-friendly, dibuat dari judul
        'kategori',          // Kategori program (contoh: Pendidikan, Bencana)
        'wilayah',           // Wilayah program (contoh: Jawa, Slawesi, Kalimantan, Papua, dll)
        'kota',              // Kota tempat program berjalan
        'deskripsi',         // Deskripsi singkat program
        'target_donasi',     // Target donasi yang ingin dicapai
        'tanggal_mulai',     // Tanggal dimulainya program
        'tanggal_akhir',     // Tanggal berakhirnya program
        'gambar',            // Banner/gambar utama program
        'status',            // Status program (aktif / nonaktif)
        'kisah',             // Cerita detail program (biasanya panjang)
        'foto_kisah',        // Foto pendukung cerita program
    ];

    // Relasi One to Many: satu program bisa punya banyak donasi
    public function donations()
    {
        return $this->hasMany(Donation::class); // Menyatakan bahwa satu program dimiliki oleh banyak donasi
    }

    // Scope lokal: hanya ambil program yang status-nya aktif dan ada gambarnya
    public function scopeAktifDenganGambar($query)
    {
        return $query->where('status', 'aktif')         // Hanya program dengan status aktif
                     ->whereNotNull('gambar');          // Dan yang memiliki gambar (tidak null)
    }

    // Scope lokal: filter berdasarkan wilayah (jika parameter wilayah ada)
    public function scopeFilterWilayah($query, $wilayah)
    {
        if ($wilayah) {
            $query->where('wilayah', $wilayah);        // Jika parameter wilayah diberikan, filter sesuai
        }

        return $query;
    }

    // Scope lokal: filter berdasarkan kategori (jika parameter kategori ada)
    public function scopeFilterKategori($query, $kategori)
    {
        if ($kategori) {
            $query->where('kategori', $kategori);       // Jika parameter kategori diberikan, filter sesuai
        }

        return $query;
    }

    // Event model: dijalankan otomatis saat model dibuat atau diperbarui
    protected static function booted()
    {
        // Saat record baru dibuat
        static::creating(function ($program) {
            // Jika slug kosong, buat dari judul menggunakan Str::slug()
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->judul); // Contoh: "Bantuan Bencana" -> "bantuan-bencana"
            }
        });

        // Saat record diperbarui
        static::updating(function ($program) {
            // Jika slug kosong, buat dari judul
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->judul);
            }
        });
    }
}
// ✅ Kesimpulan:
//File program.php ini adalah model Eloquent Laravel yang mewakili tabel programs dalam database. Fungsi dan komponennya antara lain:
//Menentukan field apa saja yang bisa diisi secara massal ($fillable).
//Mendefinisikan relasi hasMany() ke model Donation, artinya 1 program bisa memiliki banyak donasi.
//Menyediakan scope filter aktifDenganGambar, filterWilayah, dan filterKategori untuk memudahkan query pencarian.
//Secara otomatis membuat slug dari judul jika belum diisi, saat record dibuat atau diperbarui, menggunakan fitur booted().
//Model ini sangat penting karena menjadi penghubung utama antara data program dan sistem donasi yang berjalan di aplikasi.