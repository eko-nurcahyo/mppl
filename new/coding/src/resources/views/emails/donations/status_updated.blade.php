@component('mail::message')
# Status Donasi Anda Telah Diperbarui

Halo {{ $donation->nama }},

Status donasi Anda untuk program **{{ $donation->program->judul ?? 'Program' }}** telah diperbarui menjadi **{{ $donation->status }}**.

@if ($donation->status == 'approved')
Terima kasih atas donasi Anda. Kami akan segera memprosesnya.
@elseif ($donation->status == 'rejected')
Mohon maaf, donasi Anda ditolak. Silakan hubungi kami untuk informasi lebih lanjut.
@endif

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
