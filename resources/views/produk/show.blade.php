<x-guest-layout>
    <x-slot:title>
        {{ $produk->nama_produk }} - Bowo Jok
    </x-slot:title>

    {{-- ============================
         NAVBAR DARK GLASS KHUSUS HALAMAN INI
         (Meng-override style navbar bawaan guest layout)
    ============================ --}}
    <style>
        nav {
            background: rgba(0, 0, 0, 0.8) !important; /* Sedikit lebih gelap agar kontras */
            backdrop-filter: blur(20px) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        nav a {
            color: white !important;
        }

        nav a:hover {
            color: #60A5FA !important; /* blue-400 */
        }

        /* Override warna background mobile menu jika dibuka */
        nav div[x-show="open"] {
            background: rgba(0, 0, 0, 0.95) !important;
        }
    </style>

    <div class="min-h-screen py-10 bg-gray-100">

        {{-- ===================== HEADER KATALOG ===================== --}}
        <div class="px-4 mb-8 mx-auto max-w-6xl">
            <div class="overflow-hidden bg-white border border-gray-200 shadow-md rounded-t-3xl">

                {{-- HEADER BRAND + TITLE --}}
                <div class="relative px-6 py-6 md:py-8"
                    style="background-image: radial-gradient(circle at top left, rgba(239,68,68,0.12) 0, transparent 60%),
                                  radial-gradient(circle at bottom right, rgba(37,99,235,0.12) 0, transparent 60%);">
                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                        {{-- LOGO + BRAND --}}
                        <div class="flex items-center gap-4">
                            <div class="p-2 bg-black shadow-lg rounded-xl">
                                {{-- Pastikan path logo ini benar, jika tidak ada gunakan teks alternatif --}}
                                <img src="{{ asset('images/galeri/logo/bowojok-logo.jpg') }}"
                                     alt="Logo"
                                     class="object-contain w-16 h-16"
                                     onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'text-white font-bold text-2xl px-2\'>BJ</span>'">
                            </div>
                            <div>
                                <p class="text-xs tracking-[0.25em] uppercase text-gray-500">
                                    BOWO JOK
                                </p>
                                <p class="text-lg font-semibold text-gray-900 md:text-xl">
                                    Luxury Seat & Interior
                                </p>
                            </div>
                        </div>

                        {{-- PRODUCT CATALOG --}}
                        <div class="text-left md:text-right">
                            <p class="text-xs tracking-[0.35em] text-gray-500 uppercase">
                                PRODUCT
                            </p>
                            <p class="text-3xl md:text-4xl font-extrabold tracking-[0.18em] text-gray-900 uppercase">
                                CATALOG
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CATEGORY TAB --}}
                <div class="flex text-xs font-semibold tracking-wide uppercase md:text-sm">
                    <div class="flex-1 py-3 text-white text-center bg-red-600">
                        JOK PREMIUM
                    </div>
                </div>

            </div>
        </div>

        {{-- ===================== KONTEN PRODUK ===================== --}}
        <div class="px-4 mx-auto max-w-6xl">
            <div class="p-6 bg-white border border-gray-200 shadow-xl rounded-b-3xl md:p-10">

                <div class="grid grid-cols-1 gap-10 md:grid-cols-2">

                    {{-- ========= GAMBAR + ZOOM ========= --}}
                    <div class="relative w-full cursor-pointer group h-fit" onclick="openImageModal()">

                        <img src="{{ asset($produk->gambar_produk) }}"
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-[380px] object-cover rounded-2xl shadow-md transition group-hover:scale-[1.01]">

                        <!-- Overlay -->
                        <div class="absolute inset-0 transition rounded-2xl bg-black/0 group-hover:bg-black/15"></div>

                        <!-- Tooltip -->
                        <div class="absolute px-3 py-1 text-xs transition bg-white/90 text-gray-800 shadow-md opacity-0 bottom-4 right-4 rounded-lg md:text-sm group-hover:opacity-100">
                            Klik untuk perbesar
                        </div>
                    </div>


                    {{-- ========= DETAIL PRODUK ========= --}}
                    <div class="flex flex-col justify-between">

                        {{-- Nama + Harga --}}
                        <div>
                            <h1 class="mb-1 text-2xl font-extrabold tracking-wide text-gray-900 md:text-3xl">
                                {{ $produk->nama_produk }}
                            </h1>

                            <p class="mb-4 text-xl font-bold text-red-600 md:text-2xl">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>

                            {{-- Tabel Dimensi & Stok --}}
                            <div class="grid grid-cols-2 gap-4 p-4 mb-6 text-sm bg-gray-50 rounded-xl md:text-base">
                                <div>
                                    <p class="mb-1 text-xs tracking-wide text-gray-500 uppercase">Dimensi</p>
                                    <p class="font-medium text-gray-800">
                                        {{ $produk->dimensi ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="mb-1 text-xs tracking-wide text-gray-500 uppercase">Stok</p>
                                    <p class="font-medium text-gray-800">
                                        {{ $produk->stock }}
                                    </p>
                                </div>
                            </div>

                            {{-- Fitur Produk --}}
                            <h2 class="text-sm md:text-base font-bold text-gray-900 tracking-[0.18em] uppercase mb-3">
                                Fitur Produk
                            </h2>

                            @php
                                // Memecah deskripsi berdasarkan bullet point atau koma jika ada
                                $fitur = preg_split('/[•,]/', $produk->deskripsi, -1, PREG_SPLIT_NO_EMPTY);
                                // Jika hasil split kosong (tidak ada pemisah), gunakan array asli
                                if (empty($fitur)) {
                                    $fitur = [$produk->deskripsi];
                                }
                            @endphp

                            <div class="grid grid-cols-1 mb-6 gap-y-2 gap-x-6 text-sm md:text-base text-gray-700 md:grid-cols-2">
                                @foreach ($fitur as $item)
                                    <div class="flex items-start gap-2">
                                        <span class="mt-[2px] text-red-500 text-xs">●</span>
                                        <span>{{ trim($item) }}</span>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Status --}}
                            <div class="space-y-1 text-sm text-gray-800 md:text-base">
                                <p><span class="font-semibold">Stok:</span> {{ $produk->stock }}</p>
                                <p><span class="font-semibold">Status:</span>
                                    <span class="{{ $produk->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $produk->stock > 0 ? 'Tersedia' : 'Habis' }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex flex-wrap gap-3 mt-8">
                            <a href="{{ route('produk.index') }}"
                                class="inline-block px-8 py-3 font-semibold text-white transition bg-gray-900 shadow-md rounded-xl hover:bg-gray-800">
                                Kembali
                            </a>

                            {{-- Tombol WA Tambahan --}}
                            <a href="https://wa.me/6281295588338?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama_produk) }}"
                               target="_blank"
                               class="inline-block px-8 py-3 font-semibold text-white transition bg-green-600 shadow-md rounded-xl hover:bg-green-700">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Footer ZigZag --}}
                <div class="h-3 mt-10 bg-gradient-to-r from-red-600 via-blue-700 to-red-600 rounded-b-2xl"></div>
            </div>
        </div>
    </div>

    {{-- ===================== MODAL FULLSCREEN GAMBAR ===================== --}}
    <div id="imageModal" class="fixed inset-0 z-50 items-center justify-center hidden p-4 bg-black/80 backdrop-blur-sm">

        <button class="absolute text-white transition top-6 right-8 text-4xl hover:text-red-500 focus:outline-none" onclick="closeImageModal()">
            &times;
        </button>

        <img id="modalImage" src="{{ asset($produk->gambar_produk) }}"
            class="max-h-[90vh] max-w-[95vw] rounded-xl shadow-2xl object-contain bg-white">
    </div>

    <script>
        function openImageModal() {
            document.getElementById('imageModal').style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Mencegah scroll saat modal terbuka
        }

        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
            document.body.style.overflow = 'auto'; // Mengaktifkan scroll kembali
        }

        // Close modal on click outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    </script>

</x-guest-layout>
