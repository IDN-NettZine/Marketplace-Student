@extends('layouts.auth')
@section('title', 'Login Admin')

@section('content')
    <h1>Login admin</h1>
    <p class="sub">Khusus pengelola Marketplace Student.</p>

    <form method="POST" action="{{ route('admin.login') }}" novalidate>
        @csrf

        <label for="email">Email admin</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
               class="{{ $errors->has('email') ? 'has-error' : '' }}" autofocus autocomplete="email">
        @error('email') <div class="field-error">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password"
               class="{{ $errors->has('password') ? 'has-error' : '' }}" autocomplete="current-password">
        @error('password') <div class="field-error">{{ $message }}</div> @enderror

        <button type="submit" class="btn">Masuk sebagai admin</button>
    </form>
@endsection
