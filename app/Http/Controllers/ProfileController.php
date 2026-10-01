<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            $primaryPath = public_path('images/profile');
            $publicHtmlPath = base_path('../public_html/images/profile');

            if (!file_exists($primaryPath)) {
                @mkdir($primaryPath, 0755, true);
            }
            if (file_exists(base_path('../public_html')) && !file_exists($publicHtmlPath)) {
                @mkdir($publicHtmlPath, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($user->photo) {
                @unlink($primaryPath . '/' . $user->photo);
                @unlink($publicHtmlPath . '/' . $user->photo);
            }

            $file = $request->file('photo');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = 'profile_' . time() . '_' . uniqid() . '.' . $ext;
            
            $file->move($primaryPath, $filename);

            if (file_exists(base_path('../public_html'))) {
                @copy($primaryPath . '/' . $filename, $publicHtmlPath . '/' . $filename);
            }

            $user->photo = $filename;
        }

        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui',
        ]);
    }

    public function password()
    {
        return view('dashboard.profile.password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (! Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai',
            ]);
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui');
    }
}
