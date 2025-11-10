<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                Selamat datang di dashboard, {{ Auth::user()->name }}! Anda masuk sebagai {{ Auth::user()->role }}.
            </div>

            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Total Produk</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">0</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Total Blog</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">0</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Total Testimoni</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">0</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Produk Populer</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">-</p>
                </div>
            </div>

            <!-- Shortcut Actions -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Quick Actions</h2>
                <div class="flex flex-wrap gap-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded cursor-not-allowed">Tambah Produk</button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded cursor-not-allowed">Tambah Blog</button>
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded cursor-not-allowed">Tambah Testimoni</button>
                    <button class="px-4 py-2 bg-gray-600 text-white rounded cursor-not-allowed">Edit Kontak</button>
                </div>
            </div>

            <!-- Konten Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Blog Terbaru -->
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Blog Terbaru</h2>
                    <ul class="divide-y divide-gray-200 text-gray-500">
                        <li class="py-2">Belum ada blog terbaru.</li>
                    </ul>
                </div>

                <!-- Testimoni Terbaru -->
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Testimoni Terbaru</h2>
                    <ul class="divide-y divide-gray-200 text-gray-500">
                        <li class="py-2">Belum ada testimoni terbaru.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
