<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        // Data dummy, nanti bisa diambil dari database
        $totalOrang = 0;
        $totalTerkumpul = 0;
        $persentase = 0;

        return view('frontend.donasi', compact('totalOrang', 'totalTerkumpul', 'persentase'));
    }

    // Nanti tambahkan method store() untuk proses donasi
}

