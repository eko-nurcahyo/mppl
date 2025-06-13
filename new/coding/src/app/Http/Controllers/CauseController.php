<?php

namespace App\Http\Controllers;

use App\Models\Program;

class CauseController extends Controller
{
    public function index()
    {
        $programs = Program::where('status', 'aktif')->get();

        foreach ($programs as $program) {
            $program->total_raised = $program->donations()
                ->where('status', 'approved')
                ->sum('nominal');

            $program->progress_percent = $program->target > 0
                ? min(100, ($program->total_raised / $program->target) * 100)
                : 0;
        }

        return view('frontend.causes', compact('programs'));
    }
}
