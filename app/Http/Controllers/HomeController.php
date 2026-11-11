<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Belum login: langsung ke halaman login
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        return view('home');
    }
}
