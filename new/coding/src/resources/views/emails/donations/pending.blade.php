@component('mail::message') 
{{-- Blade directive untuk menggunakan komponen mail bawaan Laravel dengan template layout email bawaan --}}

# Halo **{{ $donation->nama }}**,  
{{-- Heading pertama menyapa donatur secara personal menggunakan nama dari objek $donation --}}

Terima kasih telah melakukan donasi untuk program:
{{-- Kalimat pembuka sebagai bentuk apresiasi kepada donatur --}}

# Donasi Anda Sedang Diverifikasi
{{-- Heading utama sebagai status terkini dari donasi --}}

Status donasi Anda untuk program:  
**{{ $donation->program->judul ?? 'Program Donasi' }}**  
{{-- Menampilkan nama/judul program yang didonasikan. Jika data kosong, tampilkan 'Program Donasi' --}}

Kategori: **{{ $donation->program->kategori ?? '-' }}**  
{{-- Menampilkan kategori program donasi, default "-" jika tidak tersedia --}}

Wilayah: **{{ $donation->program->wilayah ?? '-' }}**
{{-- Menampilkan wilayah program, default "-" jika tidak tersedia --}}

⏳ Donasi Anda saat ini berstatus **Pending** dan sedang menunggu proses verifikasi oleh tim kami.
{{-- Informasi status donasi saat ini yang masih dalam proses verifikasi --}}

Kami akan segera menghubungi Anda setelah donasi berhasil diverifikasi.  
{{-- Memberi tahu bahwa tim akan menghubungi kembali setelah proses selesai --}}

Terima kasih telah berdonasi dan berkontribusi untuk kebaikan bersama. 🙏
{{-- Ucapan terima kasih atas kontribusi donatur --}}

@endcomponent 
{{-- Penutup komponen email --}}
{{-- File pending.blade.php ini adalah template email Laravel yang digunakan untuk memberi tahu donatur bahwa donasi mereka sedang menunggu verifikasi (pending). Template ini memanfaatkan komponen @component('mail::message') yang memberikan tampilan standar dan rapi pada email. Dengan menggunakan data dari objek $donation, sistem dapat menyampaikan informasi secara personal dan informatif kepada donatur. Template ini meningkatkan transparansi dan kepercayaan dalam proses donasi.}}