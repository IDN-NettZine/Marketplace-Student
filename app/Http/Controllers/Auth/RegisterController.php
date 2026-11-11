<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\StudentVerification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'no_hp' => ['required', 'regex:/^[0-9]{9,15}$/'],
            'nim' => ['required', 'string', 'max:30', 'unique:student_verifications,nim'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP hanya angka, 9-15 digit.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Role tidak diambil dari input: otomatis 'user' (default kolom)
        $user = DB::transaction(function () use ($data) {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                'password' => $data['password'], // di-hash otomatis oleh casts()
            ]);

            // Pengajuan verifikasi mahasiswa, menunggu persetujuan admin
            StudentVerification::create([
                'user_id' => $user->id,
                'nim' => $data['nim'],
                'email_kampus' => $data['email'],
                'status' => 'menunggu',
            ]);

            // Satu pengguna punya satu keranjang
            Cart::create(['user_id' => $user->id]);

            return $user;
        });

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('status', 'Akun berhasil dibuat. Selamat datang!');
    }
}
