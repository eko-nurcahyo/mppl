<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'wilayah',
        'kota',
        'deskripsi',
        'target_donasi',
        'tanggal_mulai',
        'tanggal_akhir',
        'gambar',
        'status',
        'kisah',
        'foto_kisah',
    ];

    // Relasi
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // Scope: hanya program aktif dan bergambar
    public function scopeAktifDenganGambar($query)
    {
        return $query->where('status', 'aktif')
                     ->whereNotNull('gambar');
    }

    // Scope: filter berdasarkan wilayah
    public function scopeFilterWilayah($query, $wilayah)
    {
        if ($wilayah) {
            $query->where('wilayah', $wilayah);
        }

        return $query;
    }

    // Scope: filter berdasarkan kategori
    public function scopeFilterKategori($query, $kategori)
    {
        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        return $query;
    }

    // Otomatis generate slug
    protected static function booted()
    {
        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->judul);
            }
        });

        static::updating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->judul);
            }
        });
    }
}
