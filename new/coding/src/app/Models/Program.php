<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'target_donasi',     // <- disesuaikan dengan Blade
        'tanggal_mulai',
        'tanggal_akhir',
        'gambar',
        'status',
        'kisah',
        'foto_kisah',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
