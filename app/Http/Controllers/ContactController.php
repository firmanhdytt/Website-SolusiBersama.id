<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
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

        // Simpan ke database
        Contact::create($validated);

        try {
            // Kirim email ke admin
            Mail::to("firmanhidayat1780@gmail.com")->send(new ContactMail($validated));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Email gagal dikirim: " . $e->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => "Pesan berhasil dikirim"
        ]);
    }
}
