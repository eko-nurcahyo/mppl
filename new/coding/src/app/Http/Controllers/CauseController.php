<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class CauseController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::query();

        // Ambil filter dari URL (GET)
        $wilayah = $request->get('wilayah');
        $kategori = $request->get('kategori');

        // Filter jika ada pilihan
        if ($wilayah) {
            $query->where('wilayah', $wilayah);
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        // Ambil data untuk dropdown (unik)
        $wilayahList = Program::select('wilayah')->distinct()->pluck('wilayah')->sort();
        $kategoriList = Program::select('kategori')->distinct()->pluck('kategori')->sort();


        $programs = $query->get();

        return view('frontend.causes', compact('programs', 'wilayahList', 'kategoriList'));
    }
}
