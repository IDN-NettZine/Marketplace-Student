<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - Marketplace Student</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="page">
    <header class="topbar">
        <div class="topbar-in">
            <a href="{{ route('home') }}" class="brand">Marketplace Student</a>
            <nav>
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" style="margin-right:12px">Dashboard</a>
                    @endif
                    <span style="margin-right:12px">Halo, {{ auth()->user()->nama }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="margin-right:12px">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-outline" style="display:inline-block">Daftar</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="container">
        @if (session('status'))
            <div class="alert alert-ok">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
