<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bowo Jok' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 bg-gray-50">

    {{-- Include Navigasi dari layouts/navigation.blade.php --}}
    @include('layouts.navigation')

    {{-- Main Content (dengan padding-top untuk navbar fixed) --}}
    <main class="min-h-screen pt-20 pb-10">
        {{ $slot }}
    </main>
    

    {{-- Footer --}}
    <footer class="py-6 mt-auto text-center text-white bg-gray-900">
        <p class="mb-0">&copy; {{ date('Y') }} Bowo Jok. Semua hak dilindungi.</p>
    </footer>

</body>
</html>
