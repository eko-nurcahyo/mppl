<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UNP Berbagi')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Tambahkan link css lain di sini jika perlu --}}
    @yield('head')
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- Tambahkan script js lain di sini jika perlu --}}
    @yield('script')
</body>
</html>
