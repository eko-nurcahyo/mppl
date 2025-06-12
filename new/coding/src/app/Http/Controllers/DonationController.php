<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation; // ← Tambahkan ini
use App\Models\Program;  // ← Tambahkan ini

class DonationController extends Controller
{
    // Menampilkan form donasi untuk program tertentu
    public function showDonate($programId)
    {
        $program = Program::findOrFail($programId);

        // Hitung total donasi terkumpul jika mau ditampilkan di form
        $totalTerkumpul = $program->donations()->where('status', 'approved')->sum('nominal');

        return view('frontend.donate', compact('program', 'totalTerkumpul'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'nama' => 'required',
            'email' => 'required|email',
            'nominal' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'bukti_transfer' => 'required|image|max:2048',
        ]);

        $path = $request->file('bukti_transfer')->store('bukti-transfer', 'public');

        Donation::create([
            'program_id' => $validated['program_id'], // ← Simpan program_id
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'nominal' => $validated['nominal'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'bukti_transfer' => $path,
            'status' => 'pending',
        ]);

        // Redirect ke halaman sukses, atau kembali ke causes
        return redirect()->route('causes')->with('success', 'Donasi berhasil dikirim, menunggu verifikasi admin.');
    }
}
