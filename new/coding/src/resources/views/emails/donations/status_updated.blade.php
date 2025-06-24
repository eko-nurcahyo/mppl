@component('mail::message')

# Halo **{{ $donation->nama }}**,  
Terima kasih telah melakukan donasi untuk program:

# Status Donasi Anda Telah Diperbarui

**{{ $donation->program->judul ?? 'Program Donasi' }}**  
Kategori: **{{ $donation->program->kategori ?? '-' }}**  
Wilayah: **{{ $donation->program->wilayah ?? '-' }}**

telah diperbarui menjadi:  
**{{ ucfirst($donation->status) }}**

@if ($donation->status == 'approved')🎉
Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** berhasil dan akan kami proses.  
🙏 Terima kasih atas kebaikan Anda! 😊
@elseif ($donation->status == 'rejected')
Mohon maaf, donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** gagal atau ditolak.  
Silakan hubungi kami untuk informasi lebih lanjut.  
🙁 Kami sangat menghargai niat baik Anda!
@endif

@endcomponent
