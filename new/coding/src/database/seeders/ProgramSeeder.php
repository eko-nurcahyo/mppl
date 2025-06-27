<?php

// Namespace dari file ini menunjukkan bahwa file berada di folder database/seeders
namespace Database\Seeders;

// Mengimpor Seeder bawaan Laravel untuk membuat seeder
use Illuminate\Database\Seeder;

// Mengimpor helper string untuk membuat slug
use Illuminate\Support\Str;

// Mengimpor model Program yang akan diisi datanya
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    // Fungsi utama saat seeder dijalankan
    public function run(): void
    {   // Data program dikelompokkan berdasarkan wilayah
        $programsByWilayah = [
            'Jawa' => [
                ['Beasiswa Anak Yatim', 'Yogyakarta', 'Pendidikan', 85000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 1
                ['Renovasi Kelas Retak', 'Semarang', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 2
                ['Pemasangan Pipa Bersih', 'Banyuwangi', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 3
                ['Sumur Wakaf di Desa', 'Purwokerto', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 4
                ['Bantuan Gempa Cianjur', 'Cianjur', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 5
                ['Bencana Tanah Longsor', 'Banjarnegara', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 6
                ['Pelatihan Komputer Gratis', 'Bandung', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 7
                ['Air Bersih untuk Pesantren', 'Bogor', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 8
                ['Relawan Bencana Gunung Semeru', 'Lumajang', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 9
                ['Bangun Kelas Baru', 'Madiun', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 10
                ['Pemasangan Tangki Air', 'Probolinggo', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 11
                ['Bantu Warga Terdampak Puting Beliung', 'Tegal', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 12
                ['Paket Belajar Digital Anak Desa', 'Solo', 'Pendidikan', 60000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 13
            ],
            'Kalimantan' => [
                ['Sekolah Darurat di Pedalaman', 'Palangkaraya', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 14
                ['Bantuan Buku Anak Dayak', 'Samarinda', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 15
                ['Instalasi Air Bersih Gambut', 'Pontianak', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 16
                ['Sumur Wakaf Daerah Pinggiran', 'Banjarmasin', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 17
                ['Banjir Besar Kaltim', 'Balikpapan', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 18
                ['Longsor Hutan Kalbar', 'Sintang', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 19
                ['Kelas Kreatif untuk Anak', 'Tarakan', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 20
                ['Sumur Bersih di Desa Terpencil', 'Kapuas', 'Air Bersih', 40000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 21
            ],
            'Sulawesi' => [
                ['Fasilitas Belajar Gratis', 'Makassar', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 22
                ['Bangun Madrasah', 'Palu', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 23
                ['Sumur Bersih Komunal', 'Gorontalo', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 24
                ['Air Layak Minum Sekolah', 'Kendari', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 25
                ['Gempa Mamuju', 'Mamuju', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 26
                ['Tanah Longsor Sulsel', 'Parepare', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 27
                ['Perpustakaan Sekolah Laut', 'Baubau', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 28
                ['Tandon Air Bersih Sekolah', 'Palu', 'Air Bersih', 35000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 29
                ['Bantuan Evakuasi Gempa', 'Majene', 'Bencana Alam', 75000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 30
            ],
            'Bali & Nusa Tenggara' => [
                ['Bangun Perpustakaan Anak', 'Mataram', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 31
                ['Sekolah Alam untuk Anak Desa', 'Bima', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 32
                ['Tangki Air Hujan Warga', 'Kupang', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 33
                ['Pipa Bersih Desa Adat', 'Denpasar', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 34
                ['Erupsi Gunung Ile Lewotolok', 'Lembata', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 35
                ['Badai Seroja Korban Terdampak', 'Alor', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 36
                ['Beasiswa untuk Anak Pesisir', 'Labuan Bajo', 'Pendidikan', 45000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 37
                ['Pembangunan WC Umum Desa', 'Atambua', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 38
            ],
            'Maluku' => [
                ['Guru Relawan Maluku', 'Ambon', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 39
                ['Perahu Air Bersih ke Pulau Terluar', 'Tual', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 40
                ['Bantuan Gempa Maluku Tengah', 'Masohi', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 41
                ['Banjir Pulau Seram', 'Namlea', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 42
                ['Pembangunan Sekolah Darurat', 'Langgur', 'Pendidikan', 50000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 43
            ],
            'Papua' => [
                ['Rumah Belajar Papua', 'Jayapura', 'Pendidikan', 10000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 44
                ['Air Bersih Pegunungan', 'Timika', 'Air Bersih', 30000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 45
                ['Longsor Distrik Gunung', 'Nabire', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 46
                ['Gempa Papua Barat', 'Manokwari', 'Bencana Alam', 50000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 47
                ['Air Bersih untuk Anak Pegunungan', 'Wamena', 'Air Bersih', 40000000, 'AIR_BERSIH.png', 'AIR_BERSIH.png'], // 48
                ['Logistik untuk Korban Gempa', 'Sorong', 'Bencana Alam', 70000000, 'BENCANA_ALAM.png', 'BENCANA_ALAM.png'], // 49
                ['Perpustakaan Mini Suku Lokal', 'Merauke', 'Pendidikan', 55000000, 'PENDIDIKAN.png', 'PENDIDIKAN.png'], // 50
            ],
        ];

         // Melakukan iterasi untuk setiap wilayah dan daftar program di dalamnya
         foreach ($programsByWilayah as $wilayah => $programs) {

            // Iterasi setiap program dalam wilayah tersebut
            foreach ($programs as $data) {

                // Memecah array data menjadi variabel $judul, $kota, dst
                [$judul, $kota, $kategori, $target, $gambar, $foto_kisah] = array_pad($data, 6, null);

                // Membuat atau mengupdate data program berdasarkan slug
                Program::updateOrCreate(
                    ['slug' => Str::slug($judul)], // Kondisi pencocokan berdasarkan slug
                    [
                        'judul' => $judul, // Judul program
                        'slug' => Str::slug($judul), // Slug otomatis dari judul
                        'kategori' => $kategori, // Kategori program
                        'wilayah' => $wilayah, // Wilayah dari array induk
                        'kota' => $kota, // Kota tempat program berlangsung
                        'target_donasi' => $target ?? 100000000, // Jika target kosong, pakai default 100 juta
                        'status' => 'aktif', // Default status aktif
                        'gambar' => $gambar ? "/assets/charitee/img/gmbr/{$gambar}" : null, // Path gambar jika ada
                        'foto_kisah' => $foto_kisah ? "/assets/charitee/img/gmbr/{$foto_kisah}" : null, // Path foto kisah
                        'deskripsi' => 'Program bantuan untuk kategori ' . strtolower($kategori) . ' di wilayah ' . $kota . '.', // Deskripsi singkat otomatis
                    ]
                );
            }
        }
    }
}
