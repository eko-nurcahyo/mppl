<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;   // <-- INI WAJIB ADA!
use App\Models\Program;

class CauseController extends Controller
{
    public function index()
    {
        $programs = Program::where('status', 'aktif')->get();
        return view('frontend.causes', compact('programs'));
    }
}
