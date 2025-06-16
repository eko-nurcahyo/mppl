@component('mail::message')

<img src="{{ asset('charitee/img/Fund.jpg') }}" alt="Logo" style="max-width: 150px; margin-bottom: 20px;">

# Status Donasi Anda Telah Diperbarui

Status donasi Anda untuk program **{{ $donation->program->judul ?? 'Program Donasi' }}** telah diperbarui menjadi **{{ ucfirst($donation->status) }}**.

@if ($donation->status == 'approved')
Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** berhasil dan akan kami proses.  
🙏 Terima kasih atas kebaikan Anda! 😊
@elseif ($donation->status == 'rejected')
Mohon maaf, donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** gagal atau ditolak. Silakan hubungi kami untuk informasi lebih lanjut.  
🙁 Kami sangat menghargai niat baik Anda!
@endif

@endcomponent
