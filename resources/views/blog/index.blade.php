<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-center text-gray-800">Blog Kami</h1>
        <p class="text-center text-gray-600">Lihat artikel dan update terbaru kami.</p>
    </div>

    {{-- START: Tambahkan Form Pencarian --}}
    <div class="flex justify-center mb-8">
        <form action="{{ route('blog.index') }}" method="GET" class="w-full max-w-lg">
            <div class="flex items-center overflow-hidden border border-gray-300 rounded-lg shadow-sm">
                {{-- Input pencarian: menggunakan request('search') agar nilai tetap ada --}}
                <input type="text" name="search" placeholder="Cari judul atau konten blog..."
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 border-none focus:outline-none focus:ring-0">
                <button type="submit"
                        class="px-4 py-2 text-white transition duration-150 bg-blue-600 hover:bg-blue-700">
                    Cari
                </button>
            </div>
            @if(request('search'))
                {{-- Tampilkan tombol Reset jika sedang ada pencarian aktif --}}
                <div class="mt-2 text-sm text-center text-gray-500">
                    Menampilkan hasil untuk: **{{ request('search') }}**.
                    <a href="{{ route('blog.index') }}" class="font-medium text-blue-600 hover:text-blue-800">Reset Pencarian</a>
                </div>
            @endif
        </form>
    </div>
    {{-- END: Tambahkan Form Pencarian --}}

    <div class="space-y-8">
        @forelse ($blogs as $blog)
            <article class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-xl">
                @if ($blog->gambar)
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        {{-- Asumsi gambar disimpan di storage/app/public/nama-file --}}
                        <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" class="object-cover w-full h-56">
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
                        <a href="{{ route('blog.show', $blog->slug) }}" class="font-semibold text-blue-600 hover:underline">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="p-6 text-center bg-white rounded-lg shadow-md">
                <p class="text-gray-500">
                    @if(request('search'))
                        {{-- Pesan jika pencarian tidak menemukan hasil --}}
                        Tidak ada postingan blog yang ditemukan untuk pencarian **"{{ request('search') }}"**.
                    @else
                        Belum ada postingan blog yang tersedia.
                    @endif
                </p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{-- memastikan parameter query (termasuk 'search') disertakan dalam link pagination --}}
        {{ $blogs->appends(request()->query())->links() }}
    </div>
</x-guest-layout>