@extends('layouts.guest')

@section('title', 'Selamat Datang di Bowo Jok')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-900 to-red-600 text-white flex flex-col items-center justify-center text-center min-h-screen">
    <div class="px-6 mt-24">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Selamat Datang di Bowo Jok</h1>
        <p class="text-xl md:text-2xl font-medium mb-8">Spesialis Jok Motor dan Mobil — Nyaman, Kuat, dan Bergaya</p>
        <a href="{{ route('produk.index') }}" class="bg-white text-blue-900 font-semibold px-8 py-3 rounded-lg hover:bg-gray-200 transition">
            Lihat Produk
        </a>
    </div>
</section>

<!-- Tentang Kami -->
<section class="bg-white text-gray-800 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Tentang Bowo Jok</h2>
        <p class="text-lg leading-relaxed">
            Bowo Jok telah melayani pelanggan dari seluruh Indonesia dengan hasil pengerjaan jok berkualitas tinggi.
            Kami menggunakan bahan premium dan teknik modern untuk memberikan kenyamanan serta tampilan elegan pada setiap kendaraan Anda.
        </p>
    </div>
</section>

<!-- Galeri Jok -->
<section class="bg-gray-100 text-gray-800 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-10">Galeri Jok</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @php
                $galeri = [
                    ['src' => 'images/galeri/jok1.jpeg', 'alt' => 'Jok 1'],
                    ['src' => 'images/galeri/jok2.jpg', 'alt' => 'Jok 2'],
                    ['src' => 'images/galeri/jok3.jpeg', 'alt' => 'Jok 3'],
                ];
            @endphp

            @foreach ($galeri as $index => $item)
                <div class="rounded-2xl overflow-hidden shadow-lg cursor-pointer hover:scale-105 transition"
                     onclick="openModal('{{ $index }}')">
                    <img src="{{ asset($item['src']) }}" alt="{{ $item['alt'] }}" class="w-full h-56 object-cover">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
        <span class="absolute top-5 right-5 text-white text-3xl cursor-pointer" onclick="closeModal()">&times;</span>
        <img id="modal-img" src="" alt="" class="max-h-[90%] max-w-[90%] rounded-lg shadow-lg">
    </div>
</section>

<script>
    const galeri = @json($galeri);

    function openModal(index) {
        const modal = document.getElementById('modal');
        const modalImg = document.getElementById('modal-img');
        modalImg.src = "{{ asset('') }}" + galeri[index].src;
        modal.style.display = 'flex';
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.style.display = 'none';
    }

    // Klik di luar gambar untuk tutup modal
    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if(event.target === modal){
            closeModal();
        }
    }
</script>


<!-- Testimoni Pelanggan -->
<section class="bg-white text-gray-800 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-10">Testimoni Pelanggan</h2>

        @if ($testimoni->isEmpty())
            <p class="text-center text-gray-500">Belum ada testimoni.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($testimoni as $item)
                    <div class="bg-gray-50 p-6 rounded-2xl shadow text-center">
                        {{-- Komentar --}}
                        <p class="text-gray-600 italic mb-4">“{{ $item->komentar }}”</p>

                        {{-- Bintang Rating --}}
                        <div class="flex justify-center mb-3 text-yellow-400 text-xl">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->rating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>

                        {{-- Nama pelanggan --}}
                        <h4 class="font-semibold text-blue-900">— {{ $item->nama_testimoni }}</h4>

                        {{-- Tanggal --}}
                        <small class="block text-gray-500 mt-2">
                            {{ \Carbon\Carbon::parse($item->tanggal_testimoni)->translatedFormat('d F Y') }}
                        </small>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>


@endsection
