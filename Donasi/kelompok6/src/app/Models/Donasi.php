<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
        public function program()
    {
        return $this->belongsTo(ProgramDonasi::class, 'program_donasi_id');
    }
}
