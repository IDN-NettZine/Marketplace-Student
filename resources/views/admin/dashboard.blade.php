@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
    <section class="hero">
        <h1>Dashboard admin</h1>
        <p>Ringkasan data marketplace.</p>
    </section>

    <div class="stats">
        <div class="stat"><div class="n">{{ $totalUser }}</div><div class="l">Pengguna</div></div>
        <div class="stat"><div class="n">{{ $totalToko }}</div><div class="l">Toko</div></div>
        <div class="stat"><div class="n">{{ $totalProduk }}</div><div class="l">Produk</div></div>
        <div class="stat"><div class="n">{{ $totalPesanan }}</div><div class="l">Pesanan</div></div>
    </div>
@endsection
