<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'target', 'tanggal_mulai', 'tanggal_akhir', 'gambar', 'status',
    ];

    // Relasi ke donasi
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
