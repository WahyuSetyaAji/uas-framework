<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ openSidebar: true }" class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">

        {{-- Sidebar kiri --}}
        <aside class="fixed inset-y-0 left-0 bg-gray-900 transition-all duration-300" :class="openSidebar ? 'w-64' : 'w-20'">
            @include('layouts.admin.sidebar')
        </aside>

        {{-- Konten kanan --}}
        <div class="flex-1 flex flex-col transition-all duration-300" :class="openSidebar ? 'ml-64' : 'ml-20'">

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
