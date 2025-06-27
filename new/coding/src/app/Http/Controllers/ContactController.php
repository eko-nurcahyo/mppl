<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Menampilkan halaman form kontak
    public function index()
    {
        return view('frontend.contact');
    }

    // Menangani submit form kontak dan kirim email
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|max:150',
            'message' => 'required|max:1000',
        ]);

        // ✅ Kirim ke email kamu sendiri
        Mail::to('sukseskita699@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
