<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_THROTTLED) {
            return back()
                ->withErrors(['email' => 'Terlalu sering meminta. Coba lagi beberapa saat lagi.'])
                ->onlyInput('email');
        }

        // Pesan sama untuk email terdaftar maupun tidak (mencegah penebakan akun)
        return back()->with('status', 'Jika email terdaftar, tautan reset password sudah dikirim.');
    }
}
