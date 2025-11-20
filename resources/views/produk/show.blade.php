@extends('layouts.app')

@section('title', $produk->nama_produk)

@section('content')

    {{-- ============================
     NAVBAR DARK GLASS KHUSUS HALAMAN INI
============================ --}}
    <style>
        nav {
            background: rgba(0, 0, 0, 0.35) !important;
            backdrop-filter: blur(20px) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        nav a {
            color: white !important;
        }

        nav a:hover {
            color: #60A5FA !important;
        }
    </style>


    <div class="bg-gray-100 min-h-screen py-10">

        {{-- ===================== HEADER KATALOG ===================== --}}
        <div class="max-w-6xl mx-auto px-4 mb-8">
            <div class="rounded-t-3xl bg-white overflow-hidden shadow-md border border-gray-200">

                {{-- HEADER BRAND + TITLE --}}
                <div class="relative px-6 py-6 md:py-8"
                    style="background-image: radial-gradient(circle at top left, rgba(239,68,68,0.12) 0, transparent 60%),
                                  radial-gradient(circle at bottom right, rgba(37,99,235,0.12) 0, transparent 60%);">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        {{-- LOGO + BRAND --}}
                        <div class="flex items-center gap-4">
                            <div class="bg-black rounded-xl p-2 shadow-lg">
                                <img src="{{ asset('images/galeri/logo/bowojok-logo.jpg') }}"
                                    class="w-16 h-16 object-contain">
                            </div>
                            <div>
                                <p class="text-xs tracking-[0.25em] uppercase text-gray-500">
                                    BOWO JOK
                                </p>
                                <p class="text-lg md:text-xl font-semibold text-gray-900">
                                    Luxury Seat & Interior
                                </p>
                            </div>
                        </div>

                        {{-- PRODUCT CATALOG --}}
                        <div class="text-right">
                            <p class="text-xs tracking-[0.35em] text-gray-500 uppercase">
                                PRODUCT
                            </p>
                            <p class="text-3xl md:text-4xl font-extrabold tracking-[0.18em] text-gray-900 uppercase">
                                CATALOG
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CATEGORY TAB (SISA 1 SAJA - JOK PREMIUM) --}}
                <div class="flex text-xs md:text-sm font-semibold tracking-wide uppercase">
                    <div class="flex-1 text-center bg-red-600 text-white py-3">
                        JOK PREMIUM
                    </div>
                </div>

            </div>
        </div>




        {{-- ===================== KONTEN PRODUK ===================== --}}
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white rounded-b-3xl shadow-xl p-6 md:p-10 border border-gray-200">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    {{-- ========= GAMBAR + ZOOM ========= --}}
                    <div class="relative group cursor-pointer w-full h-fit" onclick="openImageModal()">

                        <img src="{{ asset($produk->gambar_produk) }}"
                            class="w-full h-[380px] object-cover rounded-2xl shadow-md transition group-hover:scale-[1.01]">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/15 transition rounded-2xl"></div>

                        <!-- Tooltip -->
                        <div
                            class="absolute bottom-4 right-4 bg-white/90 text-gray-800 px-3 py-1 rounded-lg
                text-xs md:text-sm shadow-md opacity-0 group-hover:opacity-100 transition">
                            Klik untuk perbesar
                        </div>
                    </div>


                    {{-- ========= DETAIL PRODUK ========= --}}
                    <div class="flex flex-col justify-between">

                        {{-- Nama + Harga --}}
                        <div>
                            <h1 class="text-2xl md:text-3xl font-extrabold tracking-wide text-gray-900 mb-1">
                                {{ $produk->nama_produk }}
                            </h1>

                            <p class="text-xl md:text-2xl font-bold text-red-600 mb-4">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>

                            {{-- Tabel Dimensi & Stok --}}
                            <div class="grid grid-cols-2 gap-4 bg-gray-50 rounded-xl p-4 mb-6 text-sm md:text-base">
                                <div>
                                    <p class="text-gray-500 uppercase tracking-wide text-xs mb-1">Dimensi</p>
                                    <p class="text-gray-800 font-medium">
                                        {{ $produk->dimensi ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-gray-500 uppercase tracking-wide text-xs mb-1">Stok</p>
                                    <p class="text-gray-800 font-medium">
                                        {{ $produk->stock }}
                                    </p>
                                </div>
                            </div>

                            {{-- Fitur Produk --}}
                            <h2 class="text-sm md:text-base font-bold text-gray-900 tracking-[0.18em] uppercase mb-3">
                                Fitur Produk
                            </h2>

                            @php
                                $fitur = preg_split('/[•,]/', $produk->deskripsi, -1, PREG_SPLIT_NO_EMPTY);
                            @endphp

                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6 text-sm md:text-base text-gray-700 mb-6">
                                @foreach ($fitur as $item)
                                    <div class="flex items-start gap-2">
                                        <span class="mt-[2px] text-red-500 text-xs">●</span>
                                        <span>{{ trim($item) }}</span>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Status --}}
                            <div class="space-y-1 text-sm md:text-base text-gray-800">
                                <p><span class="font-semibold">Stok:</span> {{ $produk->stock }}</p>
                                <p><span class="font-semibold">Status:</span> {{ ucfirst($produk->status) }}</p>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="{{ route('produk.index') }}"
                                class="inline-block px-8 py-3 bg-gray-900 text-white font-semibold rounded-xl shadow-md hover:bg-gray-800 transition">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Footer ZigZag --}}
                <div class="mt-10 h-3 bg-gradient-to-r from-red-600 via-blue-700 to-red-600 rounded-b-2xl"></div>
            </div>
        </div>
    </div>



    {{-- ===================== MODAL FULLSCREEN GAMBAR ===================== --}}
    <div id="imageModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 p-4">

        <span class="absolute top-6 right-8 text-white text-4xl cursor-pointer" onclick="closeImageModal()">&times;</span>

        <img id="modalImage" src="{{ asset($produk->gambar_produk) }}"
            class="max-h-[85vh] max-w-[90vw] rounded-xl shadow-xl object-contain">
    </div>

    <script>
        function openImageModal() {
            document.getElementById('imageModal').style.display = 'flex';
        }

        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
    </script>

@endsection
