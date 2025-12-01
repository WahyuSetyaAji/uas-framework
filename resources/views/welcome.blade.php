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
<section class="py-24 bg-gray-100">
    <div class="max-w-6xl px-6 mx-auto">

        <h2 class="text-4xl font-bold text-center text-blue-900 mb-14">
            Testimoni Pelanggan
        </h2>

        @if ($testimoni->isEmpty())
            <p class="text-center text-gray-500">Belum ada testimoni.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 place-items-center">

                @php
                    $colors = [
                        ['border' => 'border-red-600', 'bg' => 'bg-red-600', 'text' => 'text-red-600'],
                        ['border' => 'border-blue-600', 'bg' => 'bg-blue-600', 'text' => 'text-blue-600'],
                        ['border' => 'border-gray-800', 'bg' => 'bg-gray-800', 'text' => 'text-gray-800'],
                    ];
                @endphp

                @foreach ($testimoni as $index => $item)
                    @php
                        $colorIndex = $index % 3;
                        $color = $colors[$colorIndex];
                    @endphp

                    <div class="relative pb-8 w-full max-w-sm cursor-pointer" onclick="openTestimoni({{ $index }})">
                        <!-- Main Card -->
                        <div class="bg-white rounded-2xl p-6 border-t-4 {{ $color['border'] }} shadow-lg relative transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                            
                            <!-- Quote Icon -->
                            <svg class="w-6 h-6 {{ $color['text'] }} mb-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                            </svg>
                            
                            <!-- Name -->
                            <h3 class="font-bold text-lg mb-1 {{ $color['text'] }}">
                                {{ $item->nama_testimoni }}
                            </h3>
                            
                            <!-- Date -->
                            <p class="text-gray-500 text-sm mb-4">
                                {{ \Carbon\Carbon::parse($item->tanggal_testimoni)->translatedFormat('d F Y') }}
                            </p>
                            
                            <!-- Comment -->
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                "{{ $item->komentar }}"
                            </p>
                            
                            <!-- Stars -->
                            <div class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $item->rating)
                                        <svg class="w-4 h-4 text-yellow-500 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        
                        <!-- Avatar Circle -->
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 {{ $color['bg'] }} rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>

    <!-- Modal Background -->
    <div id="testimoniModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4" onclick="closeTestimoni()">
        <div class="relative max-w-2xl w-full" onclick="event.stopPropagation()">
            <!-- Modal Content -->
            <div id="modalContent" class="bg-white rounded-3xl p-10 border-t-8 shadow-2xl relative transform transition-all duration-500 scale-0">
                
                <!-- Close Button -->
                <button onclick="closeTestimoni()" class="absolute top-4 right-4 w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Quote Icon -->
                <svg id="modalQuote" class="w-12 h-12 mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                </svg>
                
                <!-- Name -->
                <h3 id="modalName" class="font-bold text-3xl mb-2"></h3>
                
                <!-- Date -->
                <p id="modalDate" class="text-gray-500 text-lg mb-6"></p>
                
                <!-- Comment -->
                <p id="modalComment" class="text-gray-700 text-lg leading-relaxed mb-6 italic"></p>
                
                <!-- Stars -->
                <div id="modalStars" class="flex gap-2 justify-center"></div>

                <!-- Avatar Circle (Larger) -->
                <div id="modalAvatar" class="absolute -bottom-10 -right-10 w-32 h-32 rounded-full border-4 border-white shadow-2xl flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <script>
        const testimoniData = @json($testimoni->values());
        const colors = [
            {border: 'border-red-600', bg: 'bg-red-600', text: 'text-red-600'},
            {border: 'border-blue-600', bg: 'bg-blue-600', text: 'text-blue-600'},
            {border: 'border-gray-800', bg: 'bg-gray-800', text: 'text-gray-800'}
        ];

        function openTestimoni(index) {
            const item = testimoniData[index];
            const color = colors[index % 3];
            const modal = document.getElementById('testimoniModal');
            const modalContent = document.getElementById('modalContent');
            
            // Set content
            document.getElementById('modalName').textContent = item.nama_testimoni;
            document.getElementById('modalName').className = `font-bold text-3xl mb-2 ${color.text}`;
            
            document.getElementById('modalDate').textContent = new Date(item.tanggal_testimoni).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            document.getElementById('modalComment').textContent = `"${item.komentar}"`;
            
            document.getElementById('modalQuote').className = `w-12 h-12 mb-4 ${color.text}`;
            
            // Set border color
            modalContent.className = `bg-white rounded-3xl p-10 border-t-8 ${color.border} shadow-2xl relative transform transition-all duration-500 scale-100`;
            
            // Set avatar color
            const avatarColors = {
                'border-red-600': 'bg-red-600',
                'border-blue-600': 'bg-blue-600',
                'border-gray-800': 'bg-gray-800'
            };
            document.getElementById('modalAvatar').className = `absolute -bottom-10 -right-10 w-32 h-32 ${avatarColors[color.border]} rounded-full border-4 border-white shadow-2xl flex items-center justify-center`;
            
            // Set stars
            let starsHTML = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= item.rating) {
                    starsHTML += `<svg class="w-6 h-6 text-yellow-500 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>`;
                } else {
                    starsHTML += `<svg class="w-6 h-6 text-gray-300 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>`;
                }
            }
            document.getElementById('modalStars').innerHTML = starsHTML;
            
            // Show modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeTestimoni() {
            const modal = document.getElementById('testimoniModal');
            const modalContent = document.getElementById('modalContent');
            
            // Scale down animation
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeTestimoni();
            }
        });
    </script>
</section>
</x-guest-layout>
