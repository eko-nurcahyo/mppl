<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'target',
        'tanggal_mulai',
        'tanggal_akhir',
        'gambar',
        'status',
        'kisah',         // tambah jika sudah di database
        'foto_kisah',    // tambah jika sudah di database
    ];

    // Relasi ke Donation
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
