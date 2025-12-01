<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bowo Jok' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/galeri/logo/bjlogo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans">

    {{-- Include Navigasi dari layouts/navigation.blade.php --}}
    @include('layouts.navigation')

    {{-- Main Content (dengan padding-top untuk navbar fixed) --}}
    <main class="min-h-screen">
        {{ $slot }}
    </main>


    {{-- Footer --}}
    <footer
        class="py-6 mt-auto text-center font-medium border-t-4">
        <p class="mb-0 text-gray-900">Copyright &copy; {{ date('Y') }} Bowo Jok. Semua hak dilindungi.</p>
    </footer>

</body>

</html>
