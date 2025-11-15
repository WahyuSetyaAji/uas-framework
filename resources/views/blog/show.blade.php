<x-guest-layout>
    <div class="w-full">
        <div class="mb-4">
            {{-- Tombol kembali --}}
            <a href="{{ route('blog.index') }}" class="text-base font-medium text-gray-600 transition duration-150 hover:text-blue-600">
                &larr; Kembali ke Daftar Blog
            </a>
        </div>

        <article class="overflow-hidden bg-white shadow-xl rounded-2xl">
            
            {{-- Hero Section (Gambar Besar) --}}
            @if ($blog->gambar)
                <div class="relative w-full h-96">
                    <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" 
                         class="object-cover w-full h-full">
                    {{-- Efek overlay untuk judul --}}
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
            @endif

            <div class="p-6 sm:p-10 lg:p-16">
                
                {{-- Judul dan Metadata --}}
                <header class="pb-6 mb-8 border-b">
                    <h1 class="text-4xl font-extrabold leading-tight text-gray-900 sm:text-5xl">
                        {{ $blog->judul }}
                    </h1>
                    <div class="flex items-center mt-3 space-x-2 text-base text-gray-500">
                        <span>Diposting pada **{{ $blog->created_at->format('d F Y') }}**</span>
                    </div>
                </header>

                {{-- Konten Blog --}}
                <div class="prose prose-lg text-gray-800 max-w-none"> {{-- Prose class membuat styling dasar untuk konten HTML --}}
                    {!! $blog->konten !!}
                </div>
            </div>
        </article>
    </div>
</x-guest-layout>