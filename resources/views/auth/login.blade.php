@extends('layouts.auth')
@section('title', 'Masuk')

@section('content')
    <h1>Masuk</h1>
    <p class="sub">Belanja dan berjualan dengan satu akun.</p>

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
               class="{{ $errors->has('email') ? 'has-error' : '' }}" autofocus autocomplete="email">
        @error('email') <div class="field-error">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password"
               class="{{ $errors->has('password') ? 'has-error' : '' }}" autocomplete="current-password">
        @error('password') <div class="field-error">{{ $message }}</div> @enderror

        <div class="row">
            <span class="check">
                <input id="remember" type="checkbox" name="remember" value="1">
                <label for="remember">Ingat saya</label>
            </span>
            <a href="{{ route('password.request') }}">Lupa password?</a>
        </div>

        <button type="submit" class="btn">Masuk</button>
    </form>
@endsection

@section('footer')
    <p class="foot">Belum punya akun? <a href="{{ route('register') }}">Buat akun</a></p>
@endsection
