<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Marketplace Student</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-wrap">
        <a href="{{ route('home') }}" class="brand">Marketplace Student</a>
        <div class="card">
            @if (session('status'))
                <div class="alert alert-ok">{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
        @yield('footer')
    </div>
</body>
</html>
