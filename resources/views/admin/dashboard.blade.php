<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

            <div class="flex items-center justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">
                        Selamat datang, <strong>{{ Auth::user()->name }}</strong>!
                    </h3>
                    <p class="text-sm text-gray-600">
                        Anda masuk menggunakan email: {{ Auth::user()->email }}
                    </p>
                </div>

                <div>
                    @if(Auth::user()->role === 'superadmin')
                        <span class="px-4 py-2 text-xs font-bold tracking-wider text-white bg-red-600 rounded-md shadow-lg md:text-sm">
                            👑 SUPERADMIN ACCESS
                        </span>
                    @else
                        <span class="px-4 py-2 text-xs font-bold tracking-wider text-white bg-blue-600 rounded-md shadow-lg md:text-sm">
                            🛡️ ADMIN PANEL
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                {{-- KARTU KHUSUS SUPERADMIN: TOTAL USER --}}
                @if(Auth::user()->role === 'superadmin')
                <div class="p-4 border-l-4 border-red-500 rounded-lg shadow bg-red-50">
                    <h2 class="text-sm font-medium text-red-600 uppercase">Total Admin / User</h2>
                    {{-- Menggunakan count() langsung agar tidak perlu ubah controller --}}
                    <p class="mt-2 text-2xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
                    <p class="mt-1 text-xs text-gray-500">Akun terdaftar dalam sistem</p>
                </div>
                @endif

                {{-- Total Produk --}}
                <div class="p-4 bg-white rounded-lg shadow">
                    <h2 class="text-sm font-medium text-gray-500">Total Produk</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalProduk }}</p>
                </div>

                {{-- Total Blog --}}
                <div class="p-4 bg-white rounded-lg shadow">
                    <h2 class="text-sm font-medium text-gray-500">Total Blog</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalBlog }}</p>
                </div>

                {{-- Total Testimoni --}}
                <div class="p-4 bg-white rounded-lg shadow">
                    <h2 class="text-sm font-medium text-gray-500">Total Testimoni</h2>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $totalTestimoni }}</p>
                </div>

                {{-- Produk Populer --}}
                <div class="p-4 bg-white rounded-lg shadow lg:col-span-4">
                    <h2 class="mb-2 text-sm font-medium text-gray-500">Produk Populer (Berdasarkan Ulasan)</h2>
                    <ul class="text-sm text-gray-700 divide-y divide-gray-200">
                        @forelse($produkPopuler as $produk)
                            <li class="flex justify-between py-2">
                                <span>{{ $produk->nama_produk }}</span>
                                <span class="px-2 py-0.5 bg-green-100 text-green-800 rounded-full text-xs">
                                    {{ $produk->testimoni_count }} Testimoni
                                </span>
                            </li>
                        @empty
                            <li class="py-1 text-gray-500">Belum ada produk populer.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow">
                <h2 class="pb-2 mb-4 text-lg font-semibold border-b">Quick Actions</h2>
                <div class="flex flex-wrap gap-3">

                    {{-- TOMBOL KHUSUS SUPERADMIN: KELOLA USER --}}
                    @if(Auth::user()->role === 'superadmin')
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center px-4 py-2 text-white transition bg-red-600 rounded shadow-md hover:bg-red-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Kelola User
                    </a>
                    @endif

                    <a href="{{ route('admin.produk.create') }}"
                        class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">
                        + Produk
                    </a>

                    <a href="{{ route('admin.blog.create') }}"
                        class="px-4 py-2 text-white transition bg-green-600 rounded hover:bg-green-700">
                        + Blog
                    </a>

                    <a href="{{ route('admin.testimoni.create') }}"
                        class="px-4 py-2 text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                        + Testimoni
                    </a>

                    <div class="mx-2 border-l border-gray-300"></div>

                    <a href="{{ route('admin.order.index') }}"
                        class="px-4 py-2 text-white transition bg-gray-600 rounded hover:bg-gray-700">
                        List Order
                    </a>

                    <a href="{{ route('admin.kontak.index') }}"
                        class="px-4 py-2 text-white transition rounded bg-cyan-600 hover:bg-cyan-700">
                        Inbox Kontak
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="p-4 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold">Blog Terbaru</h2>
                        <a href="{{ route('admin.blog.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    <ul class="text-gray-700 divide-y divide-gray-200">
                        @forelse($blogTerbaru as $blog)
                            <li class="flex items-center justify-between py-3">
                                <span>{{ $blog->judul }}</span>
                                <span class="text-xs text-gray-500">{{ $blog->created_at->format('d M Y') }}</span>
                            </li>
                        @empty
                            <li class="py-2 text-gray-500">Belum ada blog terbaru.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="p-4 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold">Testimoni Terbaru</h2>
                        <a href="{{ route('admin.testimoni.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    <ul class="text-gray-700 divide-y divide-gray-200">
                        @forelse($testimoniTerbaru as $testimoni)
                            <li class="py-3">
                                <div class="flex justify-between">
                                    <strong class="text-gray-800">{{ $testimoni->nama_testimoni }}</strong>
                                    <span class="text-sm text-yellow-500">{{ str_repeat('★', $testimoni->rating) }}</span>
                                </div>
                                <p class="mt-1 text-sm italic text-gray-600">"{{ Str::limit($testimoni->komentar, 60) }}"</p>
                                <small class="block mt-1 text-gray-400">
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
