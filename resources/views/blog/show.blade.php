<x-guest-layout>
    <div class="w-full max-w-5xl mx-auto">
        {{-- Back Button dengan Design Modern --}}
        <div class="mb-8">
            <a href="{{ route('blog.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-full shadow-sm group hover:border-blue-500 hover:text-blue-600 hover:shadow-md">
                <svg class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="font-medium">Kembali ke Blog</span>
            </a>
        </div>

<<<<<<< Updated upstream
        <article class="overflow-hidden bg-white shadow-xl rounded-2xl">
            
            {{-- Hero Section (Gambar Besar) --}}
            @if ($blog->gambar)
                <div class="relative w-full h-96">
                    <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" 
=======
        <article class="overflow-hidden bg-white shadow-2xl rounded-3xl">

            {{-- Hero Image dengan Overlay Modern --}}
            @if ($blog->gambar)
                <div class="relative w-full overflow-hidden h-96 md:h-[500px]">
                    <img src="{{ asset('storage/' . $blog->gambar) }}"
                         alt="{{ $blog->judul }}"
>>>>>>> Stashed changes
                         class="object-cover w-full h-full">
                    {{-- Gradient Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                    {{-- Title Overlay pada Image untuk efek dramatis --}}
                    <div class="absolute inset-x-0 bottom-0 p-6 md:p-12">
                        <div class="max-w-4xl">
                            <div class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-sm font-semibold text-white rounded-full backdrop-blur-md bg-white/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $blog->created_at->format('d F Y') }}
                            </div>
                            <h1 class="text-3xl font-black leading-tight text-white md:text-5xl lg:text-6xl drop-shadow-lg">
                                {{ $blog->judul }}
                            </h1>
                        </div>
                    </div>
                </div>
            @else
                {{-- Header tanpa gambar --}}
                <div class="p-8 md:p-12 bg-gradient-to-br from-blue-50 to-purple-50">
                    <div class="max-w-4xl mx-auto">
                        <div class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $blog->created_at->format('d F Y') }}
                        </div>
                        <h1 class="text-4xl font-black leading-tight text-gray-900 md:text-5xl lg:text-6xl">
                            {{ $blog->judul }}
                        </h1>
                    </div>
                </div>
            @endif

<<<<<<< Updated upstream
            <div class="p-6 sm:p-10 lg:p-16">
                
                {{-- Judul dan Metadata --}}
                <header class="pb-6 mb-8 border-b">
                    <h1 class="text-4xl font-extrabold leading-tight text-gray-900 sm:text-5xl">
                        {{ $blog->judul }}
                    </h1>
                    <div class="flex items-center mt-3 space-x-2 text-base text-gray-500">
                        <span>Diposting pada **{{ $blog->created_at->format('d F Y') }}**</span>
=======
            {{-- Content Section --}}
            <div class="p-6 md:p-12 lg:p-16">
                <div class="max-w-4xl mx-auto">

                    {{-- Metadata Bar --}}
                    <div class="flex flex-wrap items-center gap-4 pb-8 mb-8 border-b-2 border-gray-100">
                        <div class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-full">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">
                                {{ $blog->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-full">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">
                                {{ str_word_count(strip_tags($blog->konten)) }} kata
                            </span>
                        </div>
                    </div>

                    {{-- Blog Content dengan Typography yang Indah --}}
                    <div class="prose prose-lg prose-blue max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-img:rounded-2xl prose-img:shadow-lg">
                        {!! $blog->konten !!}
                    </div>

                    {{-- Share Section --}}
                    <div class="pt-12 mt-12 border-t-2 border-gray-100">
                        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                            <p class="text-lg font-semibold text-gray-700">
                                Bagikan artikel ini:
                            </p>
                            <div class="flex gap-3">
                                {{-- Facebook --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog->slug)) }}"
                                   target="_blank"
                                   class="flex items-center justify-center w-12 h-12 text-white transition-all duration-200 transform bg-blue-600 rounded-full hover:bg-blue-700 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                {{-- Twitter/X --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog->slug)) }}&text={{ urlencode($blog->judul) }}"
                                   target="_blank"
                                   class="flex items-center justify-center w-12 h-12 text-white transition-all duration-200 transform bg-black rounded-full hover:bg-gray-800 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                    </svg>
                                </a>
                                {{-- WhatsApp --}}
                                <a href="https://wa.me/?text={{ urlencode($blog->judul . ' ' . route('blog.show', $blog->slug)) }}"
                                   target="_blank"
                                   class="flex items-center justify-center w-12 h-12 text-white transition-all duration-200 transform bg-green-500 rounded-full hover:bg-green-600 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
>>>>>>> Stashed changes
                    </div>

                </div>
            </div>
        </article>

        {{-- Navigation ke artikel lain (opsional, bisa ditambahkan jika perlu) --}}
        <div class="grid grid-cols-1 gap-6 mt-12 md:grid-cols-2">
            {{-- Bisa ditambahkan prev/next article navigation di sini --}}
        </div>
    </div>
</x-guest-layout>