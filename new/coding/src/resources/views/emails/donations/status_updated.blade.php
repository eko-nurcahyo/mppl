@component('mail::message')

# Halo **{{ $donation->nama }}**,  

Terima kasih telah melakukan donasi untuk program:

---

### 📝 Rincian Donasi

**📌 Program Donasi:** {{ $donation->program->judul ?? '-' }}  
**🏷️ Kategori:** {{ $donation->program->kategori ?? '-' }}  
**🌍 Wilayah:** {{ $donation->program->wilayah ?? '-' }}  
**💰 Jumlah Donasi:** Rp{{ number_format($donation->nominal, 0, ',', '.') }}  
**📅 Tanggal Donasi:** {{ $donation->created_at->format('d M Y H:i') }}  
**📦 Metode Pembayaran:** {{ $donation->metode_pembayaran }}  
**📄 Status Donasi:** **{{ ucfirst($donation->status) }}**

---

# Status Donasi Anda Telah Diperbarui  

Donasi Anda telah diperbarui menjadi:  
**{{ ucfirst($donation->status) }}**

@if ($donation->status == 'approved') 🎉  
Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** berhasil dan akan kami proses.

🙏 Terima kasih atas kebaikan Anda! 😊

@elseif ($donation->status == 'rejected')
Donasi Anda sebesar **Rp {{ number_format($donation->nominal, 0, ',', '.') }}** tidak dapat kami proses.  
Silakan hubungi kami untuk informasi lebih lanjut.

🙁 Kami sangat menghargai niat baik Anda!
@endif

@endcomponent


{{-- ✅ Kesimpulan:
File status_updated.blade.php adalah template email Laravel yang digunakan untuk memberitahukan donatur bahwa status donasi mereka telah berubah menjadi approved (berhasil) atau rejected (gagal). Email ini responsif, informatif, dan personal karena menyebut nama donatur, jumlah donasi, serta program yang didukung. Dengan conditional logic @if, isi email disesuaikan secara otomatis berdasarkan status donasi. Hal ini menunjukkan profesionalisme dalam komunikasi dan meningkatkan transparansi serta kepercayaan publik terhadap sistem donasi. --}}