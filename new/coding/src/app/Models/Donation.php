<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'nama',
        'email',
        'nominal',
        'metode_pembayaran',
        'bukti_transfer',
        'status',
        'keterangan',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
