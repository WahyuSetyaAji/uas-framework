<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-center text-gray-800">Blog Kami</h1>
        <p class="text-center text-gray-600">Lihat artikel dan update terbaru kami.</p>
    </div>

    <div class="space-y-8">
        @forelse ($blogs as $blog)
            <article class="overflow-hidden rounded-lg bg-white shadow-md transition-shadow duration-300 hover:shadow-xl">
                @if ($blog->gambar)
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        {{-- Asumsi gambar disimpan di storage/app/public/nama-file --}}
                        <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" class="h-56 w-full object-cover">
                    </a>
                @endif
                <div class="p-6">
                    <h2 class="text-2xl font-semibold">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-gray-900 hover:text-blue-700">
                            {{ $blog->judul }}
                        </a>
                    </h2>
                    <div class="mt-2 text-sm text-gray-500">
                        Diposting pada {{ $blog->created_at->format('d M Y') }}
                    </div>
                    <p class="mt-3 text-gray-700">
                        {{-- Menampilkan cuplikan konten (150 karakter), hapus tag HTML --}}
                        {{ Str::limit(strip_tags($blog->konten), 150) }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-600 font-semibold hover:underline">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg bg-white p-6 text-center shadow-md">
                <p class="text-gray-500">Belum ada postingan blog yang tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $blogs->links() }}
    </div>
</x-guest-layout>
