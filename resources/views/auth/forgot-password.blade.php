@extends('layouts.auth')
@section('title', 'Lupa Password')

@section('content')
    <h1>Lupa password</h1>
    <p class="sub">Masukkan email akunmu. Kami kirim tautan untuk membuat password baru.</p>

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
               class="{{ $errors->has('email') ? 'has-error' : '' }}" autofocus autocomplete="email">
        @error('email') <div class="field-error">{{ $message }}</div> @enderror

        <button type="submit" class="btn">Kirim tautan reset</button>
    </form>
@endsection

@section('footer')
    <p class="foot"><a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
@endsection
