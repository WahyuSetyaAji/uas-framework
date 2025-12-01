<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/galeri/logo/bjlogo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-white via-blue-50 to-blue-100">
    {{ $slot }}
</body>
</html>
