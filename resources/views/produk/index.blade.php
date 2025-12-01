<x-guest-layout>
    <x-slot:title>
        Katalog Produk - Bowo Jok
    </x-slot:title>

    {{-- ==========================
         HERO PREMIUM
    ========================== --}}
    <section class="relative w-full h-64 mb-10 overflow-hidden md:h-80">
        {{-- Background Image --}}
        <img src="{{ asset('images/galeri/jok2.jpg') }}"
            alt="Produk Background"
            class="absolute inset-0 object-cover w-full h-full scale-125 opacity-90">

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
            <h1 class="text-4xl font-extrabold drop-shadow-lg md:text-5xl">
                Katalog Produk Kami
            </h1>
            <p class="mt-3 text-lg text-gray-200 md:text-xl">
                Temukan berbagai pilihan jok berkualitas tinggi untuk motor dan mobil.
            </p>
        </div>
    </section>

    {{-- ==========================
         SEARCH BAR PREMIUM
    ========================== --}}
    <div class="flex justify-center px-6 mb-12">
        <form action="{{ route('produk.index') }}" method="GET" class="w-full max-w-3xl">
            <div class="flex items-center overflow-hidden transition bg-white border shadow-md rounded-xl hover:shadow-lg">
                <input type="text" name="search" placeholder="Cari produk…" value="{{ request('search') }}"
                    class="w-full px-4 py-3 text-gray-700 focus:outline-none">

                <button type="submit" class="px-6 py-3 font-semibold text-white transition bg-blue-600 hover:bg-blue-700">
                    Cari
                </button>
            </div>
        </form>
    </div>

    {{-- ==========================
         PRODUK GRID PREMIUM
    ========================== --}}
    <div class="grid gap-10 px-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @forelse ($produk as $item)
            <div
                class="overflow-hidden transition duration-300 bg-white shadow-md rounded-2xl hover:shadow-xl hover:-translate-y-1">

                {{-- Gambar --}}
                @if ($item->gambar_produk)
                    <a href="{{ route('produk.show', $item->id) }}">
                        <div class="w-full h-48 overflow-hidden">
                            <img src="{{ asset($item->gambar_produk) }}"
                                class="object-cover w-full h-full transition duration-700 rounded-t-xl hover:scale-110">
                        </div>
                    </a>
                @endif

                {{-- Info --}}
                <div class="p-5">
                    <h3 class="mb-2 text-xl font-bold text-gray-800">
                        {{ $item->nama_produk }}
                    </h3>

                    <p class="mb-3 text-lg font-semibold text-red-600">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <a href="{{ route('produk.show', $item->id) }}"
                        class="inline-block px-5 py-2 text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-700">
                        Lihat Detail
                    </a>
                </div>

            </div>
        @empty
            <div class="col-span-full">
                <p class="text-center text-gray-500">Tidak ada produk ditemukan.</p>
            </div>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="px-6 mt-12 mb-10">
        {{ $produk->appends(request()->query())->links() }}
    </div>
</x-guest-layout>
