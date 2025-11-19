<x-guest-layout>
    {{-- Hero Section --}}
    <div class="mb-12 text-center">
        <h1 class="mb-4 text-4xl font-black text-transparent md:text-5xl bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
            Blog Kami
        </h1>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">
            Temukan artikel menarik, tips, dan update terbaru dari kami
        </p>
    </div>

    {{-- Search Bar dengan Design Modern --}}
    <div class="flex justify-center mb-12">
        <form action="{{ route('blog.index') }}" method="GET" class="w-full max-w-2xl">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text"
                       name="search"
                       placeholder="Cari judul atau konten blog..."
                       value="{{ request('search') }}"
                       class="w-full py-4 pl-12 pr-32 text-gray-700 transition duration-200 border-2 border-gray-200 rounded-full focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                <button type="submit"
                        class="absolute px-6 py-2 text-white transition duration-200 transform -translate-y-1/2 bg-blue-600 rounded-full right-2 top-1/2 hover:bg-blue-700 hover:scale-105 active:scale-95">
                    Cari
                </button>
            </div>

            @if(request('search'))
                <div class="flex items-center justify-center gap-2 mt-4 text-sm">
                    <span class="text-gray-600">Hasil pencarian:</span>
                    <span class="px-3 py-1 font-semibold text-blue-700 bg-blue-100 rounded-full">{{ request('search') }}</span>
                    <a href="{{ route('blog.index') }}"
                       class="flex items-center gap-1 px-3 py-1 text-gray-600 transition duration-150 bg-gray-100 rounded-full hover:bg-gray-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Reset
                    </a>
                </div>
            @endif
        </form>
    </div>

    {{-- Blog Grid dengan Card Modern --}}
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($blogs as $blog)
            <article class="relative overflow-hidden transition-all duration-300 transform bg-white shadow-lg group rounded-2xl hover:shadow-2xl hover:-translate-y-2">
                @if ($blog->gambar)
                    <a href="{{ route('blog.show', $blog->slug) }}" class="relative block overflow-hidden">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('storage/' . $blog->gambar) }}"
                                 alt="{{ $blog->judul }}"
                                 class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100"></div>
                        </div>
                        {{-- Date Badge --}}
                        <div class="absolute flex items-center gap-2 px-3 py-1 text-sm font-semibold text-white bg-blue-600 rounded-full top-4 right-4 backdrop-blur-sm bg-opacity-90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $blog->created_at->format('d M Y') }}
                        </div>
                    </a>
                @else
                    {{-- Placeholder jika tidak ada gambar --}}
                    <div class="flex items-center justify-center h-56 bg-gradient-to-br from-blue-100 to-purple-100">
                        <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                @endif

                <div class="p-6">
                    <h2 class="mb-3 text-xl font-bold leading-tight">
                        <a href="{{ route('blog.show', $blog->slug) }}"
                           class="text-gray-900 transition-colors duration-200 hover:text-blue-600">
                            {{ $blog->judul }}
                        </a>
                    </h2>

                    <p class="mb-4 text-gray-600 line-clamp-3">
                        {{ Str::limit(strip_tags($blog->konten), 120) }}
                    </p>

                    <a href="{{ route('blog.show', $blog->slug) }}"
                       class="inline-flex items-center gap-2 font-semibold text-blue-600 transition-all duration-200 group-hover:gap-3 hover:text-blue-700">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-full">
                <div class="flex flex-col items-center justify-center p-12 bg-white shadow-lg rounded-2xl">
                    <div class="flex items-center justify-center w-20 h-20 mb-4 bg-gray-100 rounded-full">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-gray-700">
                        @if(request('search'))
                            Tidak ada hasil untuk "{{ request('search') }}"
                        @else
                            Belum ada postingan blog
                        @endif
                    </p>
                    <p class="mt-2 text-gray-500">
                        @if(request('search'))
                            Coba kata kunci lain atau reset pencarian
                        @else
                            Postingan pertama akan segera hadir!
                        @endif
                    </p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination dengan Design Modern --}}
    <div class="mt-12">
        {{ $blogs->appends(request()->query())->links() }}
    </div>
</x-guest-layout>
