<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Mailer default yang digunakan untuk mengirim semua email.
    | Nilainya bisa diubah di file `.env` dengan variabel MAIL_MAILER.
    | Contoh isi: smtp, log, sendmail, dll.
    */

    'default' => env('MAIL_MAILER', 'log'), // Mengambil mailer default dari file .env, jika tidak ada maka pakai 'log'

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Konfigurasi lengkap untuk semua mailer yang bisa digunakan di aplikasi.
    | Bisa pakai driver: smtp, ses, postmark, log, array, failover, dll.
    |
    */

    'mailers' => [

        // Konfigurasi mailer SMTP
        'smtp' => [
            'transport' => 'smtp',                          // Menentukan jenis transport: smtp
            'scheme' => env('MAIL_SCHEME'),                 // Skema (optional), misalnya SMTPS atau HTTPS
            'url' => env('MAIL_URL'),                       // Jika tersedia, URL langsung ke server SMTP
            'host' => env('MAIL_HOST', '127.0.0.1'),        // Alamat host SMTP, default ke localhost
            'port' => env('MAIL_PORT', 2525),               // Port SMTP, default 2525
            'username' => env('MAIL_USERNAME'),             // Username akun SMTP
            'password' => env('MAIL_PASSWORD'),             // Password akun SMTP
            'timeout' => null,                              // Timeout koneksi SMTP (jika dibutuhkan)
            'local_domain' => env(                          // Domain lokal yang digunakan untuk EHLO
                'MAIL_EHLO_DOMAIN',
                parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST) // default ke host dari APP_URL
            ),
        ],

        // Konfigurasi mailer Amazon SES (jika menggunakan layanan SES dari AWS)
        'ses' => [
            'transport' => 'ses',
        ],

        // Konfigurasi mailer Postmark (layanan pihak ketiga)
        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'), // ID stream opsional
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        // Konfigurasi untuk layanan Resend
        'resend' => [
            'transport' => 'resend',
        ],

        // Menggunakan perintah 'sendmail' di server untuk mengirim email
        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'), // Lokasi default binary sendmail
        ],

        // Mailer log: tidak benar-benar mengirim email, hanya mencatat ke log Laravel
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'), // Bisa dikustomisasi channel log-nya
        ],

        // Mailer array: menyimpan email di array (berguna untuk testing/unit test)
        'array' => [
            'transport' => 'array',
        ],

        // Failover mailer: mencoba kirim via smtp, jika gagal fallback ke log
        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',     // Pertama-tama coba smtp
                'log',      // Jika gagal, fallback ke log
            ],
            'retry_after' => 60, // Tunggu 60 detik sebelum mencoba lagi
        ],

        // Roundrobin mailer: bergantian kirim via ses dan postmark
        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',         // Pertama pakai SES
                'postmark',    // Lalu Postmark
            ],
            'retry_after' => 60, // Coba ulang setelah 60 detik
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | Semua email yang dikirim aplikasi akan pakai alamat ini sebagai pengirim.
    | Bisa diubah di file .env menggunakan MAIL_FROM_ADDRESS dan MAIL_FROM_NAME
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'), // Default alamat email pengirim
        'name' => env('MAIL_FROM_NAME', 'Example'),                 // Default nama pengirim email
    ],

];
// ✅ Kesimpulan:
//File mail.php ini adalah konfigurasi mail Laravel yang berfungsi untuk:
//Menentukan mailer default (smtp, log, dll).
//Menyediakan berbagai jenis konfigurasi pengiriman email (SMTP, SES, Sendmail, dll).
//Mendukung failover dan roundrobin agar pengiriman email lebih handal.
//Menentukan alamat pengirim global (from) untuk semua email.
//Dengan konfigurasi ini, aplikasi dapat mengatur cara pengiriman email secara fleksibel, baik untuk produksi maupun pengujian. Pastikan .env Anda terisi sesuai agar sistem pengiriman email bekerja sebagaimana mestinya.