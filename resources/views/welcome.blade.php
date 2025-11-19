<x-guest-layout>
    <x-slot:title>
        Selamat Datang di Bowo Jok
    </x-slot:title>

    <section class="flex flex-col items-center justify-center min-h-screen text-center text-white bg-gradient-to-r from-blue-900 to-red-600">
        <div class="px-6 mt-24">
            <h1 class="mb-4 text-4xl font-bold drop-shadow-lg md:text-5xl">Selamat Datang di Bowo Jok</h1>
            <p class="mb-8 text-xl font-medium md:text-2xl">Spesialis Jok Motor dan Mobil — Nyaman, Kuat, dan Bergaya</p>
            <a href="{{ route('produk.index') }}"
                class="px-8 py-3 font-semibold text-blue-900 transition bg-white rounded-lg hover:bg-gray-200">
                Lihat Produk
            </a>
        </div>
    </section>

    <section class="py-20 px-6 text-gray-800 bg-white">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold text-blue-900">Tentang Bowo Jok</h2>
            <p class="text-lg leading-relaxed">
                Bowo Jok telah melayani pelanggan dari seluruh Indonesia dengan hasil pengerjaan jok berkualitas tinggi.
                Kami menggunakan bahan premium dan teknik modern untuk memberikan kenyamanan serta tampilan elegan pada
                setiap kendaraan Anda.
            </p>
        </div>
    </section>

    <section class="py-20 text-gray-800 bg-gray-100">
        <div class="max-w-6xl px-6 mx-auto">
            <h2 class="mb-10 text-3xl font-bold text-center text-blue-900">Galeri Jok</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
                @php
                    $galeri = [
                        ['src' => 'images/galeri/jok1.jpeg', 'alt' => 'Jok 1'],
                        ['src' => 'images/galeri/jok2.jpg', 'alt' => 'Jok 2'],
                        ['src' => 'images/galeri/jok3.jpeg', 'alt' => 'Jok 3'],
                    ];
                @endphp

                @foreach ($galeri as $index => $item)
                    <div class="overflow-hidden transition shadow-lg cursor-pointer rounded-2xl hover:scale-105"
                        onclick="openModal('{{ $index }}')">
                        <img src="{{ asset($item['src']) }}" alt="{{ $item['alt'] }}" class="object-cover w-full h-56">
                    </div>
                @endforeach
            </div>
        </div>

        <div id="modal" class="fixed inset-0 items-center justify-center hidden z-50 bg-black bg-opacity-70">
            <span class="absolute text-3xl text-white cursor-pointer top-5 right-5" onclick="closeModal()">&times;</span>
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

        window.onclick = function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>

    <section class="py-20 text-gray-800 bg-white">
        <div class="max-w-6xl px-6 mx-auto">
            <h2 class="mb-10 text-3xl font-bold text-center text-blue-900">Testimoni Pelanggan</h2>

            @if ($testimoni->isEmpty())
                <p class="text-center text-gray-500">Belum ada testimoni.</p>
            @else
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    @foreach ($testimoni as $item)
                        <div class="p-6 text-center shadow bg-gray-50 rounded-2xl">
                            <p class="mb-4 italic text-gray-600">“{{ $item->komentar }}”</p>
                            <div class="flex justify-center mb-3 text-xl text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $item->rating) ★ @else ☆ @endif
                                @endfor
                            </div>
                            <h4 class="font-semibold text-blue-900">— {{ $item->nama_testimoni }}</h4>
                            <small class="block mt-2 text-gray-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_testimoni)->translatedFormat('d F Y') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-guest-layout>
