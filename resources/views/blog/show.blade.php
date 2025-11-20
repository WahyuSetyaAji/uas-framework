@extends('layouts.guest')

@section('content')

{{-- =========================
      HERO IMAGE
========================= --}}
@if ($blog->gambar)
<section class="relative w-full h-80 md:h-[420px] overflow-hidden mb-10">
    <img src="{{ asset('storage/' . $blog->gambar) }}"
         class="absolute inset-0 w-full h-full object-cover scale-110 opacity-90">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 h-full flex items-end pb-10">
        <div class="px-6 md:px-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-xl">
                {{ $blog->judul }}
            </h1>
            <p class="mt-3 text-gray-200">
                Diposting pada {{ $blog->created_at->translatedFormat('d F Y') }}
            </p>
        </div>
    </div>
</section>
@endif


<div class="px-4 md:px-10 lg:px-20">

    {{-- Kembali --}}
    <a href="{{ route('blog.index') }}"
       class="inline-block mb-6 text-gray-600 hover:text-blue-600 transition">
        &larr; Kembali ke Daftar Blog
    </a>

    <article class="bg-white shadow-xl rounded-2xl p-6 md:p-10 lg:p-16">

        {{-- =========================
              KONTEN BLOG
        ========================= --}}
        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            {!! $blog->konten !!}
        </div>

        {{-- =========================
              SHARE BUTTONS
        ========================= --}}
        <div class="mt-10 border-t pt-6">
            <h3 class="text-xl font-bold mb-4">Bagikan Artikel</h3>

            <div class="flex flex-wrap gap-3">

                {{-- WhatsApp --}}
                <a href="https://wa.me/?text={{ urlencode($blog->judul . ' - ' . url()->current()) }}"
                   target="_blank"
                   class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Bagikan via WhatsApp
                </a>

                {{-- Facebook --}}
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                   target="_blank"
                   class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
                    Facebook
                </a>

                {{-- Copy Link --}}
                <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link disalin!')"
                        class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition">
                    Salin Link
                </button>

            </div>
        </div>


        {{-- =========================
              NEXT / PREVIOUS
        ========================= --}}
        <div class="mt-14 flex justify-between">

            {{-- Previous --}}
            @if($prev)
            <a href="{{ route('blog.show', $prev->slug) }}"
               class="text-blue-600 hover:underline">
                &larr; {{ $prev->judul }}
            </a>
            @else
            <span></span>
            @endif

            {{-- Next --}}
            @if($next)
            <a href="{{ route('blog.show', $next->slug) }}"
               class="text-blue-600 hover:underline">
                {{ $next->judul }} →
            </a>
            @endif

        </div>

    </article>
</div>


{{-- =========================
      RELATED POSTS
========================= --}}
@if($relatedBlogs->count())
<section class="mt-16 px-4 md:px-10 lg:px-20">

    <h2 class="text-3xl font-bold mb-6 text-gray-900">Artikel Terkait</h2>

    <div class="grid md:grid-cols-3 gap-8">

        @foreach($relatedBlogs as $rel)
            <a href="{{ route('blog.show', $rel->slug) }}"
               class="block bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition p-4">

                <div class="h-40 overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $rel->gambar) }}"
                         class="w-full h-full object-cover hover:scale-110 transition">
                </div>

                <h3 class="mt-4 font-bold text-lg text-gray-800">
                    {{ $rel->judul }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    {{ $rel->created_at->translatedFormat('d F Y') }}
                </p>
            </a>
        @endforeach

    </div>
</section>
@endif

@endsection
