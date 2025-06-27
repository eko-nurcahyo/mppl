@component('mail::message')
{{-- Menggunakan komponen mail Laravel untuk menghasilkan email dengan format standar --}}

# Halo **{{ $donation->nama }}**,  
{{-- Heading sapaan personal kepada donatur dengan menggunakan nama dari objek $donation --}}

Terima kasih telah melakukan donasi untuk program:
{{-- Kalimat pembuka untuk mengucapkan terima kasih atas donasi yang diberikan --}}

# Status Donasi Anda Telah Diperbarui
{{-- Heading utama untuk memberitahukan bahwa status donasi telah berubah --}}

**{{ $donation->program->judul ?? 'Program Donasi' }}**  
{{-- Menampilkan nama program donasi. Jika data tidak ditemukan, fallback ke 'Program Donasi' --}}

Kategori: **{{ $donation->program->kategori ?? '-' }}**  
{{-- Menampilkan kategori program, jika tidak ada maka tampilkan '-' --}}

Wilayah: **{{ $donation->program->wilayah ?? '-' }}**
{{-- Menampilkan wilayah program, jika tidak tersedia maka tampilkan '-' --}}

telah diperbarui menjadi:  
**{{ ucfirst($donation->status) }}**
{{-- Menampilkan status donasi terbaru. ucfirst() membuat huruf pertama kapital seperti: Approved, Rejected --}}

@if ($donation->status == 'approved')🎉
{{-- Jika status adalah "approved", tampilkan blok pesan sukses berikut --}}

Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** berhasil dan akan kami proses.  
{{-- Menampilkan jumlah nominal donasi dalam format rupiah dengan pemisah ribuan koma --}}

🙏 Terima kasih atas kebaikan Anda! 😊
{{-- Ucapan terima kasih kepada donatur atas keberhasilannya --}}

@elseif ($donation->status == 'rejected')
{{-- Jika status adalah "rejected", tampilkan blok pesan penolakan berikut --}}

Mohon maaf, donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** gagal atau ditolak.  
{{-- Menampilkan jumlah donasi yang gagal dalam format rupiah --}}

Silakan hubungi kami untuk informasi lebih lanjut.  
{{-- Mengarahkan donatur untuk menghubungi tim jika butuh penjelasan --}}

🙁 Kami sangat menghargai niat baik Anda!
{{-- Ucapan empati dan penghargaan kepada donatur meskipun donasi ditolak --}}

@endif
{{-- Penutup kondisi if --}}

@endcomponent
{{-- Penutup komponen email --}}
{{-- ✅ Kesimpulan:
File status_updated.blade.php adalah template email Laravel yang digunakan untuk memberitahukan donatur bahwa status donasi mereka telah berubah menjadi approved (berhasil) atau rejected (gagal). Email ini responsif, informatif, dan personal karena menyebut nama donatur, jumlah donasi, serta program yang didukung. Dengan conditional logic @if, isi email disesuaikan secara otomatis berdasarkan status donasi. Hal ini menunjukkan profesionalisme dalam komunikasi dan meningkatkan transparansi serta kepercayaan publik terhadap sistem donasi. --}}