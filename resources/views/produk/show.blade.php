<x-guest-layout>
    <x-slot:title>
        {{ $produk->nama_produk }} - Bowo Jok
    </x-slot:title>

    <div class="max-w-6xl px-4 py-10 mx-auto">
        <h2 class="mb-6 text-3xl font-bold text-blue-900">Detail Produk</h2>

        <div class="flex flex-col gap-6 p-6 bg-white shadow-lg rounded-2xl md:flex-row">
            <div class="flex-shrink-0 md:w-1/3">
                <img src="{{ asset($produk->gambar_produk) }}"
                     alt="{{ $produk->nama_produk }}"
                     class="object-cover w-full h-64 rounded-xl">
            </div>

            <div class="flex flex-col justify-between md:w-2/3">
                <div>
                    <h3 class="mb-2 text-2xl font-semibold">{{ $produk->nama_produk }}</h3>
                    <p class="mb-4 text-xl text-gray-700">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <p class="mb-4 text-gray-800">{{ $produk->deskripsi }}</p>
                    <p class="mb-1"><span class="font-semibold">Stok:</span> {{ $produk->stock }}</p>
                    <p class="mb-4"><span class="font-semibold">Status:</span> {{ ucfirst($produk->status) }}</p>
                </div>

                <div class="flex gap-4 mt-4">
                    <a href="{{ route('produk.index') }}"
                       class="inline-block px-6 py-3 font-semibold text-gray-800 transition bg-gray-300 rounded-lg hover:bg-gray-400">
                        Kembali
                    </a>

                    {{-- Tombol Chat WA (Ide tambahan agar user bisa langsung beli) --}}
                    <a href="https://wa.me/6281295588338?text=Halo%20Bowo%20Jok,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama_produk) }}"
                       target="_blank"
                       class="inline-block px-6 py-3 font-semibold text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                        <i class="bi bi-whatsapp"></i> Pesan via WA
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
