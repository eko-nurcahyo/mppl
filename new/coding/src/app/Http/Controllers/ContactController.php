<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact'); // File blade-nya di resources/views/frontend/contact.blade.php
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|max:150',
            'message' => 'required|max:1000',
        ]);

        Mail::to('admin@example.com')->send(new ContactMail($validated));

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}

