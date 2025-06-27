<?php

// Namespace Laravel untuk controller
namespace App\Http\Controllers;

// Mengimpor Request untuk mengambil input dari user (query string, dll)
use Illuminate\Http\Request;

// Mengimpor model Program (yang merepresentasikan tabel 'programs')
use App\Models\Program;

// Mendefinisikan controller CauseController yang bertugas menampilkan daftar program donasi
class CauseController extends Controller
{
    // Method utama untuk menampilkan halaman daftar program donasi
    public function index(Request $request)
    {
        // Mengambil nilai filter wilayah dari URL, contoh: ?wilayah=Jawa
        $wilayah = $request->get('wilayah');

        // Mengambil nilai filter kategori dari URL, contoh: ?kategori=Pendidikan
        $kategori = $request->get('kategori');

        // Query data program:
        // - Hanya program yang statusnya "aktif"
        // - Memiliki gambar
        // - Difilter berdasarkan wilayah & kategori jika ada
        $query = Program::aktifDenganGambar()      // Scope di model Program: status = aktif dan gambar != null
            ->filterWilayah($wilayah)             // Scope filterWilayah di model Program
            ->filterKategori($kategori);          // Scope filterKategori di model Program

        // Jalankan query untuk mendapatkan hasil program donasi setelah difilter
        $programs = $query->get();

        // Ambil semua data 'wilayah' dari tabel programs, lalu hilangkan duplikat dan urutkan
        $wilayahList = Program::select('wilayah')->distinct()->pluck('wilayah')->sort();

        // Ambil semua data 'kategori' dari tabel programs, hilangkan duplikat dan urutkan
        $kategoriList = Program::select('kategori')->distinct()->pluck('kategori')->sort();

        // Untuk setiap program, hitung total donasi dan progress hanya dari donasi yang sudah diverifikasi (status = approved)
        $programs->map(function ($program) {
            // 💡 Penting: Hanya hitung donasi yang sudah disetujui admin
            $totalRaised = $program->donations()
                ->where('status', 'approved')  // ⛔ Tidak menghitung donasi pending
                ->sum('nominal');

            // Tambahkan atribut ke object program
            $program->total_raised = $totalRaised;

            // Hitung persentase progress (dibatasi maksimal 100%)
            $program->progress_percent = $program->target_donasi > 0
                ? min(100, ($totalRaised / $program->target_donasi) * 100)
                : 0;

            return $program;
        });

        // Kirim data ke view frontend.causes untuk ditampilkan
        return view('frontend.causes', compact('programs', 'wilayahList', 'kategoriList'));
    }
}
