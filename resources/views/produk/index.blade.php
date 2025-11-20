@extends('layouts.guest')

@section('content')
    {{-- ==========================
      HERO PREMIUM
========================== --}}
    <section
        class="relative w-full py-20 bg-gradient-to-r from-blue-800 via-purple-700 to-red-600 text-white mb-14 shadow-lg">
        <div class="text-center px-6">
            <h1 class="text-4xl md:text-5xl font-extrabold drop-shadow-lg">
                Katalog Produk Bowo Jok
            </h1>
            <p class="mt-4 text-lg md:text-xl opacity-90">
                Temukan berbagai pilihan jok berkualitas tinggi untuk motor, mobil, bus, dan kapal.
            </p>
        </div>
    </section>

    {{-- ==========================
       SEARCH BAR PREMIUM
========================== --}}
    <div class="flex justify-center mb-12 px-6">
        <form action="{{ route('produk.index') }}" method="GET" class="w-full max-w-3xl">
            <div class="flex items-center border rounded-xl overflow-hidden bg-white shadow-md hover:shadow-lg transition">
                <input type="text" name="search" placeholder="Cari produk…" value="{{ request('search') }}"
                    class="w-full px-4 py-3 focus:outline-none text-gray-700">

                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">
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
                class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 hover:-translate-y-1">

                {{-- Gambar --}}
                @if ($item->gambar_produk)
                    <a href="{{ route('produk.show', $item->id) }}">
                        <div class="h-48 w-full overflow-hidden">
                            <img src="{{ asset($item->gambar_produk) }}"
                                class="object-cover w-full h-full rounded-t-xl hover:scale-110 transition duration-700">
                        </div>
                    </a>
                @endif

                {{-- Info --}}
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ $item->nama_produk }}
                    </h3>

                    <p class="text-red-600 font-semibold text-lg mb-3">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <a href="{{ route('produk.show', $item->id) }}"
                        class="inline-block py-2 px-5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                        Lihat Detail
                    </a>
                </div>

            </div>
        @empty
            <p class="text-center text-gray-500">Tidak ada produk ditemukan.</p>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-12 px-6">
        {{ $produk->links() }}
    </div>
@endsection
