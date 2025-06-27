<?php

// Namespace tempat file ini berada sesuai struktur Laravel
namespace App\Mail;

// Mengimpor trait dan class yang dibutuhkan untuk mengirim email
use Illuminate\Bus\Queueable;                       // Trait agar email bisa dikirim via queue (antrian)
use Illuminate\Mail\Mailable;                       // Class utama untuk membuat email di Laravel
use Illuminate\Mail\Mailables\Content;              // Untuk mendefinisikan konten email (view, data)
use Illuminate\Mail\Mailables\Envelope;             // Untuk mendefinisikan properti header email seperti subject
use Illuminate\Queue\SerializesModels;              // Trait agar objek bisa diserialisasi saat di-queue

// Class ContactMail mewarisi dari Mailable dan digunakan untuk mengirim email dari form kontak
class ContactMail extends Mailable
{
    // Menggunakan trait bawaan Laravel
    use Queueable, SerializesModels;

    // Properti publik untuk menyimpan data dari form yang akan dikirim ke view email
    public $data;

    /**
     * Konstruktor yang dipanggil saat class ini diinstansiasi
     * Parameter $data berisi array yang dikirim dari controller (isi form kontak)
     */
    public function __construct($data)
    {
        // Menyimpan data ke dalam properti publik agar bisa diakses di view
        $this->data = $data;
    }

    /**
     * Method envelope() mengatur judul (subject) dari email yang dikirim
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pesan Baru dari Kontak Website', // Subject email yang akan ditampilkan di inbox penerima
        );
    }

    /**
     * Method content() menentukan konten email yang akan dikirim
     * Di sini kita menggunakan view blade 'emails.contact' dan menyertakan data dari form
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',           // View email yang digunakan (resources/views/emails/contact.blade.php)
            with: ['data' => $this->data],    // Data yang dikirimkan ke view email
        );
    }

    /**
     * Method attachments() digunakan jika ingin melampirkan file
     * Dalam kasus ini tidak digunakan, maka cukup return array kosong
     */
    public function attachments(): array
    {
        return [];
    }
}
// ✅ Kesimpulan:
//File ContactMail.php ini merupakan class email Laravel yang digunakan untuk mengirimkan pesan dari form kontak ke email admin atau penerima lain.
//Menggunakan subject tetap: "Pesan Baru dari Kontak Website".
//Menampilkan isi email menggunakan view Blade emails.contact.
//Data form seperti nama, email, subjek, dan pesan dikirim lewat properti $data.
//Tidak menggunakan lampiran (attachments).
//File ini adalah bagian penting dari fitur “Hubungi Kami” dalam website dan memungkinkan pengguna untuk mengirimkan pesan secara langsung dari frontend ke admin melalui email.