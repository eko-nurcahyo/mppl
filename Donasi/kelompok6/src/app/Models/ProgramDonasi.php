<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramDonasi extends Model
{
        public function donasis()
    {
        return $this->hasMany(Donasi::class, 'program_donasi_id');
    }
}
