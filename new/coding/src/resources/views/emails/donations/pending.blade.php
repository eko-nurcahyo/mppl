@component('mail::message')

<img src="{{ asset('assets/charitee/img/Fund.jpg') }}" alt="Logo" style="max-width: 150px; margin-bottom: 20px;">

# Donasi Anda Sedang Diverifikasi

Status donasi Anda untuk program:  
**{{ $donation->program->judul ?? 'Program Donasi' }}**  
Kategori: **{{ $donation->program->kategori ?? '-' }}**  
Wilayah: **{{ $donation->program->wilayah ?? '-' }}**

⏳ Donasi Anda saat ini berstatus **Pending** dan sedang menunggu proses verifikasi oleh tim kami.

Kami akan segera menghubungi Anda setelah donasi berhasil diverifikasi.  
Terima kasih telah berdonasi dan berkontribusi untuk kebaikan bersama. 🙏

@endcomponent
