<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Program;
use App\Mail\DonationPendingMail;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form donasi
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nominal' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string|max:100',
            'bukti_transfer' => 'required|image|max:2048', // max 2MB
        ]);

        // Simpan file bukti transfer ke storage/public/bukti-transfer
        $path = $request->file('bukti_transfer')->store('bukti-transfer', 'public');

        // Simpan data donasi ke database
        $donation = Donation::create([
            'program_id' => $validated['program_id'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'nominal' => $validated['nominal'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'bukti_transfer' => $path,
            'status' => 'pending', // status awal pending
        ]);

        // Kirim email notifikasi donasi sedang diproses
        Mail::to($donation->email)->send(new DonationPendingMail($donation));

        // Redirect ke halaman causes dengan pesan sukses
        return redirect()->route('causes')->with('success', 'Donasi berhasil dikirim, menunggu verifikasi admin.');
    }

    public function showDonate($programId)
{
    $program = Program::findOrFail($programId);
    $totalTerkumpul = $program->donations()->where('status', 'approved')->sum('nominal');

    return view('frontend.donate', compact('program', 'totalTerkumpul'));
}

}
