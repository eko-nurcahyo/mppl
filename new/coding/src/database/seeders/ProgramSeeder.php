<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programsByWilayah = [
            'Sumatera' => [
                ['Renovasi Sekolah Dasar Pelosok', 'Padang', 'Pendidikan',10000000,'PENDIDIKAN.png'],
                ['Bantuan Seragam Anak Kurang Mampu', 'Medan', 'Pendidikan',20000000],
                ['Sumur Bor Daerah Riau', 'Pekanbaru', 'Air Bersih',30000000],
                ['Instalasi Pipa Bersih', 'Bengkulu', 'Air Bersih',40000000],
                ['Evakuasi Korban Banjir', 'Palembang', 'Bencana Alam',50000000],
                ['Bantuan Korban Longsor', 'Bukittinggi', 'Bencana Alam',60000000],
                ['Pembangunan Perpustakaan Mini', 'Jambi', 'Pendidikan',70000000],
                ['Air Bersih untuk Dusun Terpencil', 'Banda Aceh', 'Air Bersih',80000000],
                ['Bantuan Gempa Aceh', 'Lhokseumawe', 'Bencana Alam'],
                ['Renovasi Sekolah Rusak', 'Tanjung Pinang', 'Pendidikan'],
            ],
            'Jawa' => [
                ['Beasiswa Anak Yatim', 'Yogyakarta', 'Pendidikan'],
                ['Renovasi Kelas Retak', 'Semarang', 'Pendidikan'],
                ['Pemasangan Pipa Bersih', 'Banyuwangi', 'Air Bersih'],
                ['Sumur Wakaf di Desa', 'Purwokerto', 'Air Bersih'],
                ['Bantuan Gempa Cianjur', 'Cianjur', 'Bencana Alam'],
                ['Bencana Tanah Longsor', 'Banjarnegara', 'Bencana Alam'],
                ['Pelatihan Komputer Gratis', 'Bandung', 'Pendidikan'],
                ['Air Bersih untuk Pesantren', 'Bogor', 'Air Bersih'],
                ['Relawan Bencana Gunung Semeru', 'Lumajang', 'Bencana Alam'],
                ['Bangun Kelas Baru', 'Madiun', 'Pendidikan'],
                ['Pemasangan Tangki Air', 'Probolinggo', 'Air Bersih'],
                ['Bantu Warga Terdampak Puting Beliung', 'Tegal', 'Bencana Alam'],
            ],
            'Kalimantan' => [
                ['Sekolah Darurat di Pedalaman', 'Palangkaraya', 'Pendidikan'],
                ['Bantuan Buku Anak Dayak', 'Samarinda', 'Pendidikan'],
                ['Instalasi Air Bersih Gambut', 'Pontianak', 'Air Bersih'],
                ['Sumur Wakaf Daerah Pinggiran', 'Banjarmasin', 'Air Bersih'],
                ['Banjir Besar Kaltim', 'Balikpapan', 'Bencana Alam'],
                ['Longsor Hutan Kalbar', 'Sintang', 'Bencana Alam'],
                ['Kelas Kreatif untuk Anak', 'Tarakan', 'Pendidikan'],
            ],
            'Sulawesi' => [
                ['Fasilitas Belajar Gratis', 'Makassar', 'Pendidikan'],
                ['Bangun Madrasah', 'Palu', 'Pendidikan'],
                ['Sumur Bersih Komunal', 'Gorontalo', 'Air Bersih'],
                ['Air Layak Minum Sekolah', 'Kendari', 'Air Bersih'],
                ['Gempa Mamuju', 'Mamuju', 'Bencana Alam'],
                ['Tanah Longsor Sulsel', 'Parepare', 'Bencana Alam'],
                ['Perpustakaan Sekolah Laut', 'Baubau', 'Pendidikan'],
            ],
            'Bali & Nusa Tenggara' => [
                ['Bangun Perpustakaan Anak', 'Mataram', 'Pendidikan'],
                ['Sekolah Alam untuk Anak Desa', 'Bima', 'Pendidikan'],
                ['Tangki Air Hujan Warga', 'Kupang', 'Air Bersih'],
                ['Pipa Bersih Desa Adat', 'Denpasar', 'Air Bersih'],
                ['Erupsi Gunung Ile Lewotolok', 'Lembata', 'Bencana Alam'],
                ['Badai Seroja Korban Terdampak', 'Alor', 'Bencana Alam'],
            ],
            'Maluku' => [
                ['Guru Relawan Maluku', 'Ambon', 'Pendidikan'],
                ['Perahu Air Bersih ke Pulau Terluar', 'Tual', 'Air Bersih'],
                ['Bantuan Gempa Maluku Tengah', 'Masohi', 'Bencana Alam'],
                ['Banjir Pulau Seram', 'Namlea', 'Bencana Alam'],
            ],
            'Papua' => [
                ['Rumah Belajar Papua', 'Jayapura', 'Pendidikan',],
                ['Air Bersih Pegunungan', 'Timika', 'Air Bersih'],
                ['Longsor Distrik Gunung', 'Nabire', 'Bencana Alam'],
                ['Gempa Papua Barat', 'Manokwari', 'Bencana Alam'],
            ],
        ];

        $i = 1;

        foreach ($programsByWilayah as $wilayah => $programs) {
            foreach ($programs as $index => $data) {
                [$judul, $kota, $kategori, $target, $gambar] = array_pad($data, 5, null); // gambar optional
        
                Program::updateOrCreate(
                    ['slug' => Str::slug($judul)],
                    [
                        'judul' => $judul,
                        'slug' => Str::slug($judul),
                        'kategori' => $kategori,
                        'wilayah' => $wilayah,
                        'kota' => $kota,
                        'target_donasi' => $target ?? 100000000, // fallback jika kosong
                        'status' => 'aktif',
                        'gambar' => $gambar ? "assets/charitee/img/program/{$gambar}" : null,
                        'deskripsi' => 'Program bantuan untuk kategori ' . strtolower($kategori) . ' di wilayah ' . $kota . '.',
                    ]
                );
            }
        }
        
        
    }
}
