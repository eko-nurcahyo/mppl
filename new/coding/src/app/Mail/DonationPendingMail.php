<?php

// Namespace tempat file ini berada, sesuai struktur folder Laravel
namespace App\Mail;

// Import model Donation agar bisa dipakai dalam email ini
use App\Models\Donation;

// Import trait dan class Laravel untuk mendukung fitur email
use Illuminate\Bus\Queueable;             // Mendukung pengiriman email secara antrean
use Illuminate\Mail\Mailable;             // Class utama untuk meng-handle email di Laravel
use Illuminate\Queue\SerializesModels;    // Agar model seperti Donation bisa diserialisasi

// Membuat class email DonationPendingMail turunan dari Laravel Mailable
class DonationPendingMail extends Mailable
{
    // Menggunakan trait agar class ini mendukung queue dan serialisasi model
    use Queueable, SerializesModels;

    // Property publik agar bisa diakses di dalam view markdown email
    public $donation;

    /**
     * Konstruktor: menerima objek Donation yang dikirim dari controller
     *
     * @param  \App\Models\Donation  $donation
     */
    public function __construct(Donation $donation)
    {
        // Menyimpan objek Donation ke properti class agar bisa digunakan di dalam blade markdown
        $this->donation = $donation;
    }

    /**
     * Method build() akan membangun dan mengatur isi email yang akan dikirim
     * - Menentukan subject/judul email
     * - Menentukan tampilan email menggunakan view markdown
     */
    public function build()
    {
        return $this->subject('Donasi Anda Sedang Diproses')   // Judul email yang tampil di inbox
                    ->markdown('emails.donations.pending');    // View email dengan format markdown
    }
}
// ✅ Kesimpulan:
//File DonationPendingMail ini adalah class email custom Laravel yang bertanggung jawab untuk mengirimkan notifikasi email kepada donatur setelah mereka selesai mengisi form donasi, namun statusnya masih pending (belum diverifikasi).
//Menggunakan objek Donation yang dikirim dari controller untuk ditampilkan di email.
//Mengirim email menggunakan blade markdown view di emails.donations.pending.
//Memanfaatkan fitur Laravel seperti Queueable dan SerializesModels agar bisa diproses secara efisien.
//File ini berperan penting dalam memberi tahu pengguna bahwa donasinya sedang diverifikasi oleh sistem atau admin.