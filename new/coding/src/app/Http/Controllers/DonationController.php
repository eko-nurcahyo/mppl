<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Program;
use App\Mail\DonationPendingMail;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    public function showDonate()
    {
        // Misalnya kamu punya halaman donasi umum (tanpa program tertentu)
        return view('frontend.donate-general'); // Ganti dengan view yang sesuai
    }

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
        try {
            Mail::to($donation->email)->send(new DonationPendingMail($donation));
        } catch (\Exception $e) {
            // log error atau abaikan jika smtp offline
        }

        // Redirect ke halaman causes dengan pesan sukses
        return redirect()->route('causes')->with('success', 'Donasi berhasil dikirim, menunggu verifikasi admin.');
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);

        // Gunakan relasi yang benar: donations() bukan donasi()
        $totalTerkumpul = $program->donations()->sum('nominal');

        $progressPercent = ($program->target_donasi > 0)
            ? min(100, ($totalTerkumpul / $program->target_donasi) * 100)
            : 0;

        return view('frontend.donate', [
            'program' => $program,
            'totalTerkumpul' => $totalTerkumpul,
            'progressPercent' => $progressPercent
        ]);
    }
}
