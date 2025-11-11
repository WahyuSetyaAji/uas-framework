<x-admin-app-layout>
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
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalProduk }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Total Blog</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalBlog }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Total Testimoni</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalTestimoni }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-sm font-medium text-gray-500">Produk Populer</h2>
                    <ul class="divide-y divide-gray-200 mt-2 text-gray-700 text-sm">
                        @forelse($produkPopuler as $produk)
                            <li class="py-1">{{ $produk->nama_produk }} ({{ $produk->testimoni_count }} testimoni)
                            </li>
                        @empty
                            <li class="py-1 text-gray-500">Belum ada produk populer.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Shortcut Actions -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Quick Actions</h2>
                <div class="flex flex-wrap gap-4">

                    <!-- Tambah Produk -->
                    <a href="{{ route('admin.produk.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Tambah Produk
                    </a>

                    <!-- Tambah Blog -->
                    <a href="{{ route('admin.blog.create') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Tambah Blog
                    </a>

                    <!-- Tambah Testimoni -->
                    <a href="{{ route('admin.testimoni.create') }}"
                        class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                        Tambah Testimoni
                    </a>

                    <!-- Kelola Produk -->
                    <a href="{{ route('admin.produk.index') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Kelola Produk
                    </a>

                    <!-- Kelola Order -->
                    <a href="{{ route('admin.order.index') }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                        Kelola Order
                    </a>

                    <!-- Kelola Blog -->
                    <a href="{{ route('admin.blog.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Kelola Blog
                    </a>

                    <!-- Kelola Testimoni -->
                    <a href="{{ route('admin.testimoni.index') }}"
                        class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                        Kelola Testimoni
                    </a>

                    <!-- Kelola Kontak -->
                    <a href="{{ route('admin.kontak.index') }}"
                        class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 transition">
                        Kelola Kontak
                    </a>
                </div>
            </div>

            <!-- Konten Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Blog Terbaru -->
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Blog Terbaru</h2>
                    <ul class="divide-y divide-gray-200 text-gray-700">
                        @forelse($blogTerbaru as $blog)
                            <li class="py-2">{{ $blog->judul }}</li>
                        @empty
                            <li class="py-2 text-gray-500">Belum ada blog terbaru.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Testimoni Terbaru -->
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Testimoni Terbaru</h2>
                    <ul class="divide-y divide-gray-200 text-gray-700">
                        @forelse($testimoniTerbaru as $testimoni)
                            <li class="py-2">
                                <strong>{{ $testimoni->nama_testimoni }}</strong> —
                                {{ $testimoni->komentar }}<br>
                                <small class="text-gray-500">
                                    Rating: {{ $testimoni->rating }} ⭐ |
                                    Produk: {{ $testimoni->produk->nama_produk ?? 'N/A' }}
                                </small>
                            </li>
                        @empty
                            <li class="py-2 text-gray-500">Belum ada testimoni terbaru.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-admin-app-layout>
