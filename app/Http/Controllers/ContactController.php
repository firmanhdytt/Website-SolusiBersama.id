<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data kontak ke database agar aman & tercatat
        $contact = Contact::create($validated);

        // Kirim email notifikasi ke admin (dengan penanganan error graceful)
        try {
            Mail::to("firmanhidayat1780@gmail.com")->send(new ContactMail($validated));
        } catch (\Throwable $e) {
            Log::warning("Notifikasi email kontak gagal: " . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => "Pesan Anda berhasil dikirim! Tim kami akan segera merespons."
        ]);
    }
}
