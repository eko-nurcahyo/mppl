<?php

// Namespace controller ini
namespace App\Http\Controllers;

// Import class Request dan model yang digunakan
use Illuminate\Http\Request;
use App\Models\Donation;    // Model Donation
use App\Models\Program;     // Model Program

// Import class mail yang dibutuhkan untuk kirim email
use App\Mail\DonationPendingMail;               // Email saat donasi dalam status pending
use Illuminate\Support\Facades\Mail;            // Facade Laravel untuk mengirim email

// Controller utama yang menangani donasi dari frontend
class DonationController extends Controller
{
    // Menampilkan halaman form donasi umum (tidak terkait program tertentu)
    public function showDonate()
    {
        // Mengembalikan view resources/views/frontend/donate-general.blade.php
        return view('frontend.donate-general');
    }

    // Menyimpan data donasi dari form
    public function store(Request $request)
    {
        // Validasi input dari form donasi
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',       // program_id wajib dan harus ada di tabel programs
            'nama' => 'required|string|max:255',                 // Nama donatur wajib diisi
            'email' => 'required|email|max:255',                 // Email wajib valid
            'nominal' => 'required|numeric|min:1',               // Nominal minimal Rp1
            'metode_pembayaran' => 'required|string|max:100',   // Misal: BCA, Dana, dll
            'bukti_transfer' => 'required|image|max:2048',       // Gambar bukti transfer maksimal 2MB
        ]);

        // Upload gambar bukti transfer ke folder public/storage/bukti-transfer
        $path = $request->file('bukti_transfer')->store('bukti-transfer', 'public');

        // Simpan data donasi ke database
        $donation = Donation::create([
            'program_id' => $validated['program_id'],               // Relasi ke program
            'nama' => $validated['nama'],                           // Nama donatur
            'email' => $validated['email'],                         // Email donatur
            'nominal' => $validated['nominal'],                     // Jumlah donasi
            'metode_pembayaran' => $validated['metode_pembayaran'],// Jenis pembayaran
            'bukti_transfer' => $path,                              // Path bukti
            'status' => 'pending',                                  // Status default "pending"
        ]);

        // Kirim email notifikasi bahwa donasi sedang diproses
        try {
            Mail::to($donation->email)->send(new DonationPendingMail($donation));
        } catch (\Exception $e) {
            // Jika terjadi error saat mengirim email (misalnya SMTP tidak aktif), tidak melakukan apapun
        }

        // Redirect kembali ke halaman daftar program dengan pesan sukses
        return redirect()->route('causes')
            ->with('success', 'Donasi berhasil dikirim, menunggu verifikasi admin.');
    }

    // Menampilkan halaman form donasi spesifik untuk satu program
    public function show($id)
    {
        // Cari program berdasarkan ID atau error 404 jika tidak ditemukan
        $program = Program::findOrFail($id);

        // Hitung total nominal donasi yang sudah masuk untuk program ini
        // HANYA menghitung donasi yang status-nya 'approved'
        $totalTerkumpul = $program->donations()
            ->where('status', 'approved')                      // Filter donasi yang disetujui
            ->sum('nominal');

        // Hitung persentase progres donasi (maksimal 100%)
        $progressPercent = ($program->target_donasi > 0)
            ? min(100, ($totalTerkumpul / $program->target_donasi) * 100)   // Hitung presentase
            : 0;

        // Kirim data program, total donasi, dan persentase ke view
        return view('frontend.donate', [
            'program' => $program,
            'totalTerkumpul' => $totalTerkumpul,
            'progressPercent' => $progressPercent,
        ]);
    }
}
// ✅ Kesimpulan:
//File DonationController.php adalah controller Laravel yang menangani seluruh proses donasi dari frontend, mulai dari:
//Menampilkan form donasi umum dan spesifik per program.
//Memvalidasi dan menyimpan data donasi ke database.
//Mengunggah bukti transfer ke folder storage.
//Mengirim email konfirmasi ke donatur bahwa donasi mereka sedang diproses (pending).
//Controller ini adalah jantung dari fitur donasi dalam aplikasi, menghubungkan form donasi, database, dan email notifikasi secara terpadu.