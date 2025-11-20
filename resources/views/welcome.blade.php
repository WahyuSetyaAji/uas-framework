@extends('layouts.guest')

@section('title', 'Selamat Datang di Bowo Jok')

@section('content')

<!-- ============================
      HERO SLIDER PREMIUM
===============================-->
<section
    x-data="{
        current: 0,
        images: [
            '{{ asset('images/galeri/background/jokbckg.jpg') }}',
            '{{ asset('images/galeri/jok1.jpeg') }}',
            '{{ asset('images/galeri/jok2.jpg') }}'
        ],
        init() {
            setInterval(() => {
                this.current = (this.current + 1) % this.images.length
            }, 4500);
        }
    }"
    class="relative w-full min-h-[90vh] flex items-center justify-center overflow-hidden"
>

    <!-- Slider Images -->
    <template x-for="(img, index) in images" :key="index">
        <div
            class="absolute inset-0 bg-cover bg-center transition-all duration-700"
            x-show="current === index"
            x-transition.opacity
            :style="`background-image: url('${img}')`"
        ></div>
    </template>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- HERO TEXT -->
    <div class="relative z-10 text-center text-white px-6 max-w-3xl">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-xl tracking-wide leading-tight"
            x-transition.opacity.duration.800>
            Bowo Jok — Spesialis Jok Motor & Mobil
        </h1>

        <p class="text-lg md:text-2xl font-light mb-10 opacity-90">
            Kualitas Premium • Finishing Rapi • Kenyamanan Maksimal
        </p>

        <a href="{{ route('produk.index') }}"
           class="bg-red-600 hover:bg-red-700 transition px-10 py-4 rounded-xl text-lg font-semibold shadow-lg">
            Lihat Produk
        </a>
    </div>

    <!-- Slider Bullets -->
    <div class="absolute bottom-10 w-full flex justify-center space-x-3 z-10">
        <template x-for="(img, index) in images" :key="index">
            <button
                class="w-4 h-4 rounded-full border-2 border-white"
                :class="current === index ? 'bg-white' : 'bg-transparent'"
                @click="current = index"
            ></button>
        </template>
    </div>
</section>



<!-- ============================
      TENTANG KAMI PREMIUM
===============================-->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">

        <div class="space-y-6">
            <h2 class="text-4xl font-bold text-blue-900">
                Tentang Bowo Jok
            </h2>

            <p class="text-lg leading-relaxed text-gray-700">
                Dengan pengalaman bertahun-tahun dalam modifikasi jok kendaraan,
                Bowo Jok telah dipercaya pelanggan dari berbagai daerah.
                Kami menghadirkan pengerjaan detail, bahan premium, dan hasil yang elegan.
            </p>

            <p class="text-lg text-gray-700">
                Mulai dari jok motor, mobil keluarga, hingga kendaraan premium —
                semua dikerjakan dengan presisi untuk kenyamanan terbaik Anda.
            </p>

        </div>

        <div>
            <img
                src="{{ asset('images/galeri/background/bowojok.webp') }}"
                class="rounded-2xl shadow-xl w-full object-cover"
            >
        </div>

    </div>
</section>



<!-- ============================
      GALERI PREMIUM
===============================-->
<section class="py-24 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-center text-blue-900 mb-12">
            Galeri Jok Premium
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            @php
                $galeri = [
                    ['src' => 'images/galeri/jok1.jpeg', 'alt' => 'Jok 1'],
                    ['src' => 'images/galeri/jok2.jpg', 'alt' => 'Jok 2'],
                    ['src' => 'images/galeri/jok3.jpeg', 'alt' => 'Jok 3'],
                ];
            @endphp

            @foreach ($galeri as $index => $item)
                <div
                    class="rounded-2xl overflow-hidden shadow-lg cursor-pointer transform hover:scale-[1.03] transition duration-300"
                    onclick="openModal('{{ $index }}')">

                    <img
                        src="{{ asset($item['src']) }}"
                        alt="{{ $item['alt'] }}"
                        class="w-full h-56 object-cover"
                    >
                </div>
            @endforeach

        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
        <span class="absolute top-7 right-8 text-white text-4xl cursor-pointer" onclick="closeModal()">
            &times;
        </span>

        <img id="modal-img" src="" alt="" class="max-h-[90%] max-w-[90%] rounded-xl shadow-xl">
    </div>
</section>

<script>
    const galeri = @json($galeri);

    function openModal(index) {
        document.getElementById('modal-img').src = "{{ asset('') }}" + galeri[index].src;
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if(event.target === modal) closeModal();
    }
</script>



<!-- ============================
      TESTIMONI PREMIUM
===============================-->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-center text-blue-900 mb-14">
            Testimoni Pelanggan
        </h2>

        @if ($testimoni->isEmpty())
            <p class="text-center text-gray-500">Belum ada testimoni.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                @foreach ($testimoni as $item)
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition text-center">

                        <p class="text-gray-700 italic mb-6 leading-relaxed">
                            “{{ $item->komentar }}”
                        </p>

                        <div class="flex justify-center mb-4 text-yellow-400 text-xl">
                            @for ($i = 1; $i <= 5; $i++)
                                <span>{{ $i <= $item->rating ? '★' : '☆' }}</span>
                            @endfor
                        </div>

                        <h4 class="font-semibold text-blue-900 text-lg">
                            — {{ $item->nama_testimoni }}
                        </h4>

                        <small class="block text-gray-500 mt-3">
                            {{ \Carbon\Carbon::parse($item->tanggal_testimoni)->translatedFormat('d F Y') }}
                        </small>

                    </div>
                @endforeach

            </div>
        @endif

    </div>
</section>

@endsection
