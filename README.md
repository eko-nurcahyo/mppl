Cara Kerja Tim dengan Git & GitHub — Versi Simpel
# 1. Ambil Kode dari GitHub (Clone)
Pertama kali di komputer kamu, kamu harus download (clone) dulu project dari GitHub ke komputer kamu:

git clone https://github.com/eko-nurcahyo/mppl.git
cd mppl
Artinya:
clone = download semua kode project
cd = masuk ke folder project

# 2. Pastikan Kode Terbaru di main
Sebelum mulai kerja, pastikan kode utama (main) di komputer kamu sudah paling baru:

git checkout main
git pull origin main
Artinya:
checkout main = pindah ke versi kode utama
pull origin main = ambil update terbaru dari GitHub

# Buat Tempat Kerja Baru (Branch Baru)
Supaya gak ganggu kerja orang lain dan kode utama tetap aman, kamu harus buat tempat kerja baru (branch) untuk fitur kamu. Contoh:
(contoh)
git checkout -b eko/fitur-login
Artinya:
Buat cabang baru bernama eko/fitur-login
Nanti kamu kerja di situ tanpa ganggu branch utama main

# Kerja dan Simpan Perubahan (Commit)
Setelah kamu ubah atau buat kode, simpan dulu perubahan itu ke dalam Git:
git add .
git commit -m "Eko: tambah fitur login"
Artinya:
add . = tandai semua perubahan
commit = simpan perubahan itu dengan pesan supaya jelas apa yang kamu ubah

# Kirim Perubahan ke GitHub (Push)
Supaya temanmu bisa lihat dan cek kerjaanmu, kirim cabang (branch) dan perubahanmu ke GitHub:
git push origin eko/fitur-login
Artinya:
Upload hasil kerjamu di cabang eko/fitur-login ke GitHub

# Buat Permintaan Gabung Kode (Pull Request)
Di GitHub, kamu buka website repo, lalu klik tombol buat Pull Request dari cabangmu ke cabang main.
Ini seperti bilang ke temanmu:
“Hei, saya sudah selesai kerja fitur ini, tolong dicek dan digabung ke kode utama ya!”

# Setelah Disetujui, Perbarui Kode Utama di Komputer
Kalau sudah disetujui dan digabung, kamu harus ambil update terbaru di komputer:
git checkout main
git pull origin main
Artinya:
Kode utama di komputer kamu diperbarui dengan versi yang terbaru

# Ulangi Lagi untuk Fitur Baru
Kalau mau mulai fitur baru, ulangi buat branch baru dari main yang terbaru. Jadi selalu kerja di tempat terpisah supaya aman.
Kenapa Harus Buat Branch Baru?
  Supaya kode utama gak rusak kalau ada yang salah
  Supaya kamu dan temanmu bisa kerja bersamaan tanpa saling ganggu
  Supaya mudah cek dan review kerjaan sebelum digabung

# Intinya:
Clone sekali dulu
Selalu kerja di branch baru pakai nama kamu
Commit & push hasil kerja
Buat pull request di GitHub
Setelah merge, update branch main di komputer
Ulangi untuk kerja berikutnya
