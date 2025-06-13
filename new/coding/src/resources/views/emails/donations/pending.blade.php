@component('mail::message')
# Donasi Sedang Diproses

Halo {{ $donation->nama }},

Terima kasih telah melakukan donasi untuk program **{{ $donation->program->judul ?? 'Program Donasi' }}**.

Donasi Anda sedang kami proses dan akan diverifikasi oleh admin.

Salam,<br>
{{ config('app.name') }}
@endcomponent
