<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    {{-- Container Utama: Flex Row agar Sidebar & Konten Berdampingan --}}
    <div class="flex min-h-screen">

        {{-- Sidebar Navigation --}}
        {{-- Kita memanggil file navigation.blade.php yang baru saja kita ubah --}}
        <aside class="flex-shrink-0">
            @include('layouts.admin.navigation')
        </aside>

        {{-- Konten Kanan --}}
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">

            {{-- Header Dashboard (Opsional: Judul Halaman) --}}
            @isset($header)
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Main Content Scrollable --}}
            <main class="flex-1 p-6 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>
