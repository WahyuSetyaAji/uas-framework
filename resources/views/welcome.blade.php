<x-guest-layout>
    <x-slot:title>
        Selamat Datang di Bowo Jok
    </x-slot:title>

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
                class="absolute inset-0 transition-all duration-700 bg-center bg-cover"
                x-show="current === index"
                x-transition.opacity
                :style="`background-image: url('${img}')`"
            ></div>
        </template>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- HERO TEXT -->
        <div class="relative z-10 max-w-3xl px-6 text-center text-white">
            <h1 class="mb-6 text-4xl font-extrabold leading-tight tracking-wide drop-shadow-xl md:text-6xl"
                x-transition.opacity.duration.800>
                Bowo Jok — Spesialis Jok Motor & Mobil
            </h1>

            <p class="mb-10 text-lg font-light opacity-90 md:text-2xl">
                Kualitas Premium • Finishing Rapi • Kenyamanan Maksimal
            </p>

            <a href="{{ route('produk.index') }}"
               class="px-10 py-4 text-lg font-semibold transition bg-red-600 shadow-lg hover:bg-red-700 rounded-xl">
                Lihat Produk
            </a>
        </div>

        <!-- Slider Bullets -->
        <div class="absolute z-10 flex justify-center w-full space-x-3 bottom-10">
            <template x-for="(img, index) in images" :key="index">
                <button
                    class="w-4 h-4 border-2 border-white rounded-full"
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
        <div class="grid items-center max-w-6xl gap-14 px-6 mx-auto md:grid-cols-2">

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
                    alt="Tentang Bowo Jok"
                    class="object-cover w-full shadow-xl rounded-2xl"
                >
            </div>

        </div>
    </section>

    <!-- ============================
          GALERI PREMIUM
    ===============================-->
    <section class="py-24 bg-gray-100">
        <div class="max-w-6xl px-6 mx-auto">

            <h2 class="mb-12 text-4xl font-bold text-center text-blue-900">
                Galeri Jok Premium
            </h2>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">

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
                            class="object-cover w-full h-56"
                        >
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 z-50 items-center justify-center hidden bg-black/70">
            <span class="absolute text-4xl text-white cursor-pointer top-7 right-8" onclick="closeModal()">
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
        <div class="max-w-6xl px-6 mx-auto">

            <h2 class="text-4xl font-bold text-center text-blue-900 mb-14">
                Testimoni Pelanggan
            </h2>

            @if ($testimoni->isEmpty())
                <p class="text-center text-gray-500">Belum ada testimoni.</p>
            @else
                <div class="grid grid-cols-1 gap-10 md:grid-cols-3">

                    @foreach ($testimoni as $item)
                        <div class="p-8 text-center transition shadow-lg bg-gray-50 rounded-2xl hover:shadow-xl">

                            <p class="mb-6 italic leading-relaxed text-gray-700">
                                “{{ $item->komentar }}”
                            </p>

                            <div class="flex justify-center mb-4 text-xl text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $item->rating ? '★' : '☆' }}</span>
                                @endfor
                            </div>

                            <h4 class="text-lg font-semibold text-blue-900">
                                — {{ $item->nama_testimoni }}
                            </h4>

                            <small class="block mt-3 text-gray-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_testimoni)->translatedFormat('d F Y') }}
                            </small>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </section>

</x-guest-layout>
