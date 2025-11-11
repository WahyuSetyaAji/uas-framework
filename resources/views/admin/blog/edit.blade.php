<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Postingan Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ old('judul', $blog->judul) }}" required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konten --}}
                    <div class="mb-4">
                        <label for="konten" class="block mb-2 text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" id="konten" rows="6"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>{{ old('konten', $blog->konten) }}</textarea>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                        @if ($blog->gambar)
                            <img src="{{ asset('storage/'.$blog->gambar) }}" alt="Gambar Blog" class="w-32 h-32 object-cover rounded mb-2">
                        @else
                            <p class="text-gray-500 mb-2">Tidak ada gambar</p>
                        @endif
                        <input type="file" name="gambar" id="gambar"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md file:border-0 file:bg-gray-100 file:px-3 file:py-1 file:rounded-md file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200">
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol aksi --}}
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                            Update
                        </button>
                        <a href="{{ route('admin.blog.index') }}"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-admin-app-layout>
