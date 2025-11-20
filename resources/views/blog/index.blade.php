@extends('layouts.guest')

@section('content')
    {{-- =========================
      HERO SECTION PREMIUM
========================= --}}
    <section class="relative w-full h-64 md:h-80 overflow-hidden mb-10">
        <img src="{{ asset('images/galeri/background/jokbckg.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover scale-125 opacity-90">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 h-full flex flex-col items-center justify-center text-white text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold drop-shadow-lg">
                Blog Kami
            </h1>
            <p class="mt-3 text-lg md:text-xl text-gray-200">
                Artikel, tips, dan informasi seputar dunia jok premium
            </p>
        </div>
    </section>


    {{-- =========================
      SEARCH BAR PREMIUM
========================= --}}
    <div class="flex justify-center mb-10 px-4">
        <form action="{{ route('blog.index') }}" method="GET" class="w-full max-w-2xl">
            <div class="flex items-center overflow-hidden rounded-xl shadow-lg">
                <input type="text" name="search" placeholder="Cari artikel berdasarkan judul atau konten..."
                    value="{{ request('search') }}" class="w-full px-5 py-3 border-none focus:outline-none text-gray-700">

                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Cari
                </button>
            </div>

            @if (request('search'))
                <div class="mt-3 text-sm text-center text-gray-600">
                    Menampilkan hasil untuk: <b>{{ request('search') }}</b>
                    <a href="{{ route('blog.index') }}" class="text-blue-600 hover:text-blue-800 ml-1">
                        Reset
                    </a>
                </div>
            @endif
        </form>
    </div>


    {{-- =========================
      BLOG LIST PREMIUM
========================= --}}
    <div class="grid gap-10 px-4 md:grid-cols-2 lg:grid-cols-3">

        @forelse ($blogs as $blog)
            <article
                class="bg-white overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition hover:-translate-y-1">

                {{-- Gambar --}}
                @if ($blog->gambar)
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        <img src="{{ asset('storage/' . $blog->gambar) }}"
                            class="object-cover w-full h-48 hover:scale-105 transition duration-500">
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

                    <p class="mt-4 text-gray-700 leading-relaxed">
                        {{ Str::limit(strip_tags($blog->konten), 150) }}
                    </p>

                    <a href="{{ route('blog.show', $blog->slug) }}"
                        class="inline-block mt-4 text-blue-600 font-semibold hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>

            </article>
        @empty
            <div class="p-6 text-center bg-white rounded-xl shadow">
                <p class="text-gray-500">Belum ada postingan blog.</p>
            </div>
        @endforelse

    </div>


    {{-- =========================
      PAGINATION
========================= --}}
    <div class="mt-12 px-4">
        {{ $blogs->appends(request()->query())->links() }}
    </div>
@endsection
