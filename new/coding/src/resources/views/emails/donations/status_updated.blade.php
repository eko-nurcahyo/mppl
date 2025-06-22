@component('mail::message')

{{-- Logo header --}}
<img src="{{ asset('charitee/img/Fund.jpg') }}" alt="Logo" style="max-width: 150px; margin-bottom: 20px;">

{{-- Judul utama --}}
# Status Donasi Anda Telah Diperbarui

{{-- Info program --}}
Status donasi Anda untuk program:  
**{{ $donation->program->judul ?? 'Program Donasi' }}**  
Kategori: **{{ $donation->program->kategori ?? '-' }}**  
Wilayah: **{{ $donation->program->wilayah ?? '-' }}**

{{-- Status donasi --}}
telah diperbarui menjadi:  
**{{ ucfirst($donation->status) }}**

{{-- Kondisi berdasarkan status --}}
@if ($donation->status == 'approved')
Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** berhasil dan akan segera kami proses.  
🙏 Terima kasih atas kebaikan Anda! 😊
@elseif ($donation->status == 'rejected')
Mohon maaf, donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** gagal atau ditolak.  
Silakan hubungi kami untuk informasi lebih lanjut.  
🙁 Kami sangat menghargai niat baik Anda!
@endif

{{-- Tombol ke halaman program (opsional) --}}
@component('mail::button', ['url' => route('program.show', $donation->program->slug ?? '#')])
Lihat Program
@endcomponent

@endcomponent
