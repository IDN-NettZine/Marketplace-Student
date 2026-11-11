@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <h1>Marketplace khusus mahasiswa</h1>
        @auth
            <p>Kamu sudah masuk. Katalog produk dan fitur toko akan segera tersedia di sini.</p>
        @else
            <p>Jual beli kebutuhan kuliah dan kos antar sesama mahasiswa.</p>
            <a href="{{ route('register') }}" class="btn btn-outline" style="display:inline-block">Buat akun</a>
        @endauth
    </section>
@endsection
