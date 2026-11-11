@extends('layouts.auth')
@section('title', 'Reset Password')

@section('content')
    <h1>Buat password baru</h1>
    <p class="sub">Password minimal 8 karakter.</p>

    <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $email) }}"
               class="{{ $errors->has('email') ? 'has-error' : '' }}" autocomplete="email">
        @error('email') <div class="field-error">{{ $message }}</div> @enderror

        <label for="password">Password baru</label>
        <input id="password" type="password" name="password"
               class="{{ $errors->has('password') ? 'has-error' : '' }}" autofocus autocomplete="new-password">
        @error('password') <div class="field-error">{{ $message }}</div> @enderror

        <label for="password_confirmation">Ulangi password baru</label>
        <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">

        <button type="submit" class="btn">Simpan password</button>
    </form>
@endsection
