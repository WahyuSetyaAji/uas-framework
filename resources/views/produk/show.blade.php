@extends('layouts.app')

@section('title', $produk->nama_produk)

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-blue-900 mb-6">Detail Produk</h2>

    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col md:flex-row gap-6">
        <!-- Gambar Produk -->
        <div class="md:w-1/3 flex-shrink-0">
            <img src="{{ asset($produk->gambar_produk) }}"
                 alt="{{ $produk->nama_produk }}"
                 class="w-full h-64 object-cover rounded-xl">
        </div>

        <!-- Info Produk -->
        <div class="md:w-2/3 flex flex-col justify-between">
            <div>
                <h3 class="text-2xl font-semibold mb-2">{{ $produk->nama_produk }}</h3>
                <p class="text-xl text-gray-700 mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-gray-800 mb-4">{{ $produk->deskripsi }}</p>
                <p class="mb-1"><span class="font-semibold">Stok:</span> {{ $produk->stock }}</p>
                <p class="mb-4"><span class="font-semibold">Status:</span> {{ ucfirst($produk->status) }}</p>
            </div>

            <!-- Tombol Kembali -->
            <div>
                <a href="{{ route('produk.index') }}"
                   class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-lg transition">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
