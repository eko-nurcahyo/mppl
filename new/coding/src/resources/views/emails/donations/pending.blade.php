@component('mail::message')

# Halo **{{ $donation->nama }}**,  
Terima kasih telah melakukan donasi untuk program:

# Donasi Anda Sedang Diverifikasi

Status donasi Anda untuk program:  
**{{ $donation->program->judul ?? 'Program Donasi' }}**  
Kategori: **{{ $donation->program->kategori ?? '-' }}**  
Wilayah: **{{ $donation->program->wilayah ?? '-' }}**

⏳ Donasi Anda saat ini berstatus **Pending** dan sedang menunggu proses verifikasi oleh tim kami.

Kami akan segera menghubungi Anda setelah donasi berhasil diverifikasi.  
Terima kasih telah berdonasi dan berkontribusi untuk kebaikan bersama. 🙏

@endcomponent
