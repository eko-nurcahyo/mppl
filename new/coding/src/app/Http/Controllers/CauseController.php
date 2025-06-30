<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class CauseController extends Controller
{
    public function index(Request $request)
    {
        $wilayah = $request->get('wilayah');
        $kategori = $request->get('kategori');

        $query = Program::aktifDenganGambar()
            ->filterWilayah($wilayah)
            ->filterKategori($kategori);

        // ✅ Ganti get() menjadi paginate(9)
        $programs = $query->paginate(9);

        $wilayahList = Program::select('wilayah')->distinct()->pluck('wilayah')->sort();
        $kategoriList = Program::select('kategori')->distinct()->pluck('kategori')->sort();

        // Mapping total raised dan progress
        $programs->getCollection()->transform(function ($program) {
            $totalRaised = $program->donations()
                ->where('status', 'approved')
                ->sum('nominal');

            $program->total_raised = $totalRaised;
            $program->progress_percent = $program->target_donasi > 0
                ? min(100, ($totalRaised / $program->target_donasi) * 100)
                : 0;

            return $program;
        });

        return view('frontend.causes', compact('programs', 'wilayahList', 'kategoriList'));
    }
}
