
# Cara Kerja Tim dengan Git & GitHub — Versi Simpel

---

## 1. Ambil Kode dari GitHub (Clone)

Pertama kali di komputer kamu, kamu harus download (clone) dulu project dari GitHub ke komputer kamu:

```bash
git clone https://github.com/eko-nurcahyo/mppl.git
cd mppl
```

**Artinya:**  
- `clone` = download semua kode project  
- `cd mppl` = masuk ke folder project yang sudah di-download

---

## 2. Pastikan Kode Terbaru di `main`

Sebelum mulai kerja, pastikan kode utama (`main`) di komputer kamu sudah paling baru:

```bash
git checkout main
git pull origin main
```

**Artinya:**  
- `checkout main` artinya pindah ke branch utama (`main`)  
- `pull origin main` mengambil pembaruan terbaru dari GitHub

---

## 3. Buat Tempat Kerja Baru (Branch Baru)

Supaya tidak mengganggu kerja orang lain dan kode utama tetap aman, kamu harus buat branch baru untuk fitur kamu. Contoh:

```bash
git checkout -b eko/fitur-login
```

**Artinya:**  
- Membuat branch baru bernama `eko/fitur-login`  
- Kamu bekerja di branch ini tanpa mengganggu branch `main`

---

## 4. Kerja dan Simpan Perubahan (Commit)

Setelah kamu membuat perubahan pada kode, simpan perubahan itu ke Git:

```bash
git add .
git commit -m "Eko: tambah fitur login"
```

**Artinya:**  
- `git add .` = menandai semua perubahan yang telah kamu buat  
- `git commit -m` menyimpan perubahan dengan pesan yang jelas

---

## 5. Kirim Perubahan ke GitHub (Push)

Agar perubahanmu bisa dilihat dan direview oleh teman tim, kirim (push) branch dan perubahanmu ke GitHub:

```bash
git push origin eko/fitur-login
```

---

## 6. Buat Permintaan Gabung Kode (Pull Request)

Di GitHub, buka repository, lalu buat Pull Request (PR) dari branch kamu ke branch `main`. Ini untuk meminta anggota tim lain mereview dan menggabungkan perubahanmu ke branch utama.

---

## 7. Setelah Pull Request Disetujui dan Merge

Setelah PR disetujui dan digabung (merge) ke branch `main`, update branch `main` di komputer kamu agar tetap sinkron:

```bash
git checkout main
git pull origin main
```

---

## 8. Ulangi Proses untuk Fitur Baru

Jika ingin mulai fitur baru, ulangi proses buat branch baru dari branch `main` yang sudah diperbarui supaya pekerjaanmu tetap terorganisir dan tidak bentrok dengan pekerjaan orang lain.

---

## Kenapa Harus Buat Branch Baru?

- Menjaga branch utama (`main`) tetap stabil dan bersih  
- Memungkinkan semua anggota tim bekerja secara paralel tanpa mengganggu satu sama lain  
- Memudahkan review kode dan pengujian sebelum digabung ke branch utama

---

## Inti dari Cara Kerja Ini:

- Clone repo sekali saja  
- Selalu buat branch baru untuk setiap pekerjaan atau fitur baru  
- Commit dan push perubahan ke branch tersebut  
- Buat pull request untuk review dan merge ke `main`  
- Setelah merge, update branch `main` lokal  
- Ulangi untuk pekerjaan berikutnya

---

## Ringkasan Perintah Git

| Aktivitas               | Perintah                                   |
|------------------------|--------------------------------------------|
| Clone repo             | `git clone <repo-url>`                      |
| Masuk folder project   | `cd mppl`                                  |
| Update branch main     | `git checkout main` <br> `git pull origin main` |
| Buat branch baru       | `git checkout -b namaanggota/nama-fitur`  |
| Commit perubahan       | `git add .` <br> `git commit -m "pesan"`  |
| Push branch ke GitHub  | `git push origin namaanggota/nama-fitur`  |
| Buat Pull Request      | Lewat GitHub web UI                        |

---

Semoga panduan ini membantu kamu dan tim bekerja dengan lebih terstruktur dan lancar. Jika perlu saya buatkan file `.md` siap pakai, beri tahu saja ya!  
Semangat terus, Eko! 🚀
