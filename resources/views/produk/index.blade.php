<x-guest-layout>
    <x-slot:title>
        Katalog Produk - Bowo Jok
    </x-slot:title>

    {{-- Hero Section --}}
    <section class="py-16 text-center text-white bg-gradient-to-r from-blue-900 to-red-600">
        <div class="container px-4 mx-auto">
            <h1 class="mb-3 text-4xl font-bold">Katalog Produk Bowo Jok</h1>
            <p class="text-lg">Temukan berbagai pilihan jok berkualitas tinggi untuk motor, mobil, bus, dan kapal.</p>
        </div>
    </section>

    <div class="container px-4 py-10 mx-auto">

        {{-- Search --}}
        <form action="{{ route('produk.index') }}" method="GET" class="flex justify-center mb-8">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari produk..."
                   class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-red-500 focus:outline-none">
            <button type="submit"
                    class="px-5 py-2 text-white transition bg-blue-900 rounded-r-lg hover:bg-red-600">
                Cari
            </button>
        </form>

        {{-- Grid Produk --}}
        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
            @forelse ($produk as $item)
                <div class="overflow-hidden transition bg-white shadow rounded-2xl hover:shadow-lg">
                    {{-- Cek gambar, gunakan placeholder jika kosong --}}
                    <img src="{{ asset($item->gambar_produk) }}"
                         alt="{{ $item->nama_produk }}"
                         class="object-cover w-full h-56">
                    <div class="p-5 text-center">
                        <h3 class="mb-2 text-lg font-semibold">{{ $item->nama_produk }}</h3>
                        <p class="mb-3 font-bold text-red-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('produk.show', $item->id) }}"
                           class="inline-block px-4 py-2 text-white transition bg-blue-900 rounded-lg hover:bg-red-600">
                           Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-10 text-center text-gray-500">
                    Tidak ada produk ditemukan.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center mt-10">
            {{ $produk->appends(request()->query())->links() }}
        </div>
    </div>
</x-guest-layout>
