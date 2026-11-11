@extends('layouts.auth')
@section('title', 'Buat Akun')

@section('content')
    <h1>Buat akun</h1>
    <p class="sub">Gunakan email kampus dan NIM untuk verifikasi mahasiswa.</p>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <label for="nama">Nama lengkap</label>
        <input id="nama" type="text" name="nama" value="{{ old('nama') }}"
            class="{{ $errors->has('nama') ? 'has-error' : '' }}" autofocus autocomplete="name">
        @error('nama')
            <div class="field-error">{{ $message }}</div>
        @enderror

        <label for="email">Email kampus</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
            class="{{ $errors->has('email') ? 'has-error' : '' }}" autocomplete="email">
        @error('email')
            <div class="field-error">{{ $message }}</div>
        @enderror

        <div class="grid2">
            <div>
                <label for="nim">NIM</label>
                <input id="nim" type="text" name="nim" value="{{ old('nim') }}"
                    class="{{ $errors->has('nim') ? 'has-error' : '' }}">
                @error('nim')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="no_hp">No. HP</label>
                <input id="no_hp" type="tel" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx"
                    class="{{ $errors->has('no_hp') ? 'has-error' : '' }}">
                @error('no_hp')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <label for="password">Password</label>
        <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'has-error' : '' }}"
            autocomplete="new-password">
        @error('password')
            <div class="field-error">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Ulangi password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">

        <button type="submit" class="btn">Daftar</button>
    </form>
@endsection

@section('footer')
    <p class="foot">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
@endsection
