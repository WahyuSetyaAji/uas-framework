<x-guest-layout>
    <x-slot:title>
        Blog Kami - Bowo Jok
    </x-slot:title>

    {{-- =========================
         HERO SECTION PREMIUM
    ========================= --}}
    <section class="relative w-full h-64 mb-10 overflow-hidden md:h-80">
        {{-- Background Image --}}
        <img src="{{ asset('images/galeri/background/jokbckg.jpg') }}"
            alt="Blog Background"
            class="absolute inset-0 object-cover w-full h-full scale-125 opacity-90">

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
            <h1 class="text-4xl font-extrabold drop-shadow-lg md:text-5xl">
                Blog Kami
            </h1>
            <p class="mt-3 text-lg text-gray-200 md:text-xl">
                Artikel, tips, dan informasi seputar dunia jok premium
            </p>
        </div>
    </section>

    <div class="container px-4 mx-auto">
        {{-- =========================
             SEARCH BAR PREMIUM
        ========================= --}}
        <div class="flex justify-center mb-10">
            <form action="{{ route('blog.index') }}" method="GET" class="w-full max-w-2xl">
                <div class="flex items-center overflow-hidden shadow-lg rounded-xl">
                    <input type="text" name="search" placeholder="Cari artikel berdasarkan judul atau konten..."
                        value="{{ request('search') }}"
                        class="w-full px-5 py-3 text-gray-700 border-none focus:outline-none focus:ring-0">

                    <button type="submit" class="px-6 py-3 font-semibold text-white transition bg-blue-600 hover:bg-blue-700">
                        Cari
                    </button>
                </div>

                @if (request('search'))
                    <div class="mt-3 text-sm text-center text-gray-600">
                        Menampilkan hasil untuk: <b>{{ request('search') }}</b>
                        <a href="{{ route('blog.index') }}" class="ml-1 text-blue-600 hover:text-blue-800">
                            Reset
                        </a>
                    </div>
                @endif
            </form>
        </div>

        {{-- =========================
             BLOG LIST PREMIUM
        ========================= --}}
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($blogs as $blog)
                <article class="overflow-hidden transition bg-white shadow-md rounded-2xl hover:shadow-2xl hover:-translate-y-1">

                    {{-- Gambar --}}
                    @if ($blog->gambar)
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img src="{{ asset('storage/' . $blog->gambar) }}"
                                alt="{{ $blog->judul }}"
                                class="object-cover w-full h-48 transition duration-500 hover:scale-105">
                        </a>
                    @else
                        {{-- Placeholder jika tidak ada gambar --}}
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <div class="flex items-center justify-center w-full h-48 bg-gray-200">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        </a>
                    @endif

                    {{-- Konten --}}
                    <div class="p-6">
                        <h2 class="text-2xl font-bold leading-snug">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="hover:text-blue-600">
                                {{ $blog->judul }}
                            </a>
                        </h2>

                        <p class="mt-2 text-sm text-gray-500">
                            Diposting pada {{ $blog->created_at->translatedFormat('d F Y') }}
                        </p>

                        <p class="mt-4 leading-relaxed text-gray-700">
                            {{ Str::limit(strip_tags($blog->konten), 150) }}
                        </p>

                        <a href="{{ route('blog.show', $blog->slug) }}"
                            class="inline-block mt-4 font-semibold text-blue-600 hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>

                </article>
            @empty
                <div class="p-6 text-center bg-white shadow col-span-full rounded-xl">
                    <p class="text-gray-500">Belum ada postingan blog.</p>
                </div>
            @endforelse

        </div>

        {{-- =========================
             PAGINATION
        ========================= --}}
        <div class="mt-12 mb-10">
            {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div>

</x-guest-layout>
