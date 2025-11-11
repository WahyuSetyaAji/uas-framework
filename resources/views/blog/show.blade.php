<x-guest-layout>
    <div class="w-full">
        <div class="mb-4">
            <a href="{{ route('blog.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Kembali ke Daftar Blog</a>
        </div>

        <article class="rounded-lg bg-white p-6 shadow-md sm:p-8">
            <h1 class="mb-4 text-3xl font-bold text-gray-900">{{ $blog->judul }}</h1>

            <div class="mb-6 border-b pb-4 text-sm text-gray-500">
                Diposting pada {{ $blog->created_at->format('d M Y, H:i') }}
            </div>

            @if ($blog->gambar)
                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" class="mb-8 h-auto w-full rounded-lg object-cover shadow-lg" style="max-height: 400px;">
            @endif

            <div class="prose max-w-none">
                {!! $blog->konten !!}
            </div>
        </article>
    </div>
</x-guest-layout>
