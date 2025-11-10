@extends('layouts.guest')

@section('title', 'Katalog Produk - Bowo Jok')

@section('content')
<section class="py-16 bg-gradient-to-r from-blue-900 to-red-600 text-white text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-3">Katalog Produk Bowo Jok</h1>
        <p class="text-lg">Temukan berbagai pilihan jok berkualitas tinggi untuk motor, mobil, bus, dan kapal.</p>
    </div>
</section>

<div class="container mx-auto px-4 py-10">

    {{-- Search --}}
    <form action="{{ route('produk.index') }}" method="GET" class="flex justify-center mb-8">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari produk..."
               class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-red-500 focus:outline-none">
        <button type="submit"
                class="bg-blue-900 text-white px-5 py-2 rounded-r-lg hover:bg-red-600 transition">
            Cari
        </button>
    </form>

    {{-- Grid Produk --}}
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
        @forelse ($produk as $item)
            <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="{{ asset($item->gambar_produk) }}"
                     alt="{{ $item->nama_produk }}"
                     class="w-full h-56 object-cover">
                <div class="p-5 text-center">
                    <h3 class="font-semibold text-lg mb-2">{{ $item->nama_produk }}</h3>
                    <p class="text-red-600 font-bold mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('produk.show', $item->id) }}"
                       class="inline-block bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                       Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500 py-10">
                Tidak ada produk ditemukan.
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-10 flex justify-center">
        {{ $produk->links() }}
    </div>
</div>
@endsection
