<?php

// Mendefinisikan namespace file ini berada di App\Mail
namespace App\Mail;

// Mengimpor model Donation agar bisa digunakan di dalam class ini
use App\Models\Donation;

// Trait dan class pendukung dari Laravel Mail
use Illuminate\Bus\Queueable;             // Untuk mendukung sistem antrean email
use Illuminate\Mail\Mailable;             // Kelas utama untuk membuat email
use Illuminate\Queue\SerializesModels;    // Untuk serialize model yang dikirim lewat queue

// Class DonationStatusUpdated digunakan untuk mengirim email notifikasi status donasi
class DonationStatusUpdated extends Mailable
{
    // Menggunakan trait agar bisa mendukung antrean dan serialisasi model
    use Queueable, SerializesModels;

    // Properti publik agar objek donation bisa digunakan di file markdown email (blade)
    public $donation;

    /**
     * Konstruktor class yang akan menerima dan menyimpan objek Donation
     * Konstruktor dipanggil saat class ini di-instantiasi (dipanggil di controller atau Filament)
     */
    public function __construct(Donation $donation)
    {
        // Menyimpan objek donation ke properti class agar bisa digunakan di dalam email view
        $this->donation = $donation;
    }

    /**
     * Method ini digunakan untuk membangun isi email yang akan dikirim
     * Kita bisa menentukan subject (judul email) dan file blade markdown-nya
     */
    public function build()
    {
        return $this->subject('Status Donasi Anda Telah Diperbarui')     // Menentukan subjek email
                    ->markdown('emails.donations.status_updated');       // Menentukan file view blade markdown yang digunakan
    }
}
// ✅ Kesimpulan:
//File DonationStatusUpdated adalah kelas email custom Laravel yang digunakan untuk mengirimkan pemberitahuan kepada donatur ketika status donasinya berubah (misalnya: dari pending menjadi approved atau rejected).
//Menerima data Donation dari controller/Filament dan menggunakannya dalam tampilan email.
//Menggunakan sistem queue dan markdown view agar email lebih efisien dan mudah dikelola.
//Email ini akan menggunakan view resources/views/emails/donations/status_updated.blade.php yang isinya dirancang dalam format markdown.
//File ini merupakan bagian penting dari sistem notifikasi aplikasi donasi.