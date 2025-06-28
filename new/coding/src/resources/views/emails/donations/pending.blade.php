@component('mail::message')
# Halo {{ $donation->nama }}

Terima kasih telah melakukan donasi untuk program berikut:

---

### 📝 Rincian Donasi

**📌 Program Donasi:** {{ $donation->program->judul ?? '-' }}  
**🏷️ Kategori:** {{ $donation->program->kategori ?? '-' }}  
**🌍 Wilayah:** {{ $donation->program->wilayah ?? '-' }}  
**💰 Jumlah Donasi:** Rp{{ number_format($donation->nominal, 0, ',', '.') }}  
**📅 Tanggal Donasi:** {{ \Carbon\Carbon::parse($donation->created_at)->format('d M Y H:i') }} WIB  
**📦 Metode Pembayaran:** {{ $donation->metode_pembayaran }}  
**📄 Status Donasi:** **{{ ucfirst($donation->status) }}**

---

⏳ Saat ini donasi Anda sedang kami proses dan menunggu verifikasi admin.  
Mohon tunggu maksimal 1×24 jam.

🙏 Terima kasih atas kontribusi Anda untuk kebaikan bersama.

@endcomponent
