<?php

namespace App\Http\Controllers;

use App\Models\Program;

class CauseController extends Controller
{
    public function index()
    {
        // Ambil semua program dengan status 'aktif'
        $programs = Program::where('status', 'aktif')->get();

        // Hitung total donasi dan persentase progress untuk setiap program
        foreach ($programs as $program) {
            // Total donasi yang sudah disetujui (approved)
            $program->total_raised = $program->donations()
                ->where('status', 'approved')
                ->sum('nominal');

            // Hitung persentase progress berdasarkan target
            $program->progress_percent = $program->target > 0
                ? min(100, ($program->total_raised / $program->target) * 100)
                : 0;
        }

        // Kirim data ke view 'frontend.causes'
        return view('frontend.causes', compact('programs'));
    }
}
