<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Postingan Blog Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-sm sm:rounded-lg">

                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ old('judul') }}" required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konten (Trix Editor) --}}
                    <div class="mb-4">
                        <label for="x_konten" class="block mb-2 text-sm font-medium text-gray-700">Konten</label>
                        {{-- Input tersembunyi yang akan menyimpan data konten --}}
                        <input id="x_konten" type="hidden" name="konten" value="{{ old('konten') }}">
                        {{-- Trix Editor yang terikat ke input tersembunyi di atas --}}
                        <trix-editor input="x_konten" 
                                     class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[300px]">
                        </trix-editor>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="gambar" id="gambar"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md file:border-0 file:bg-gray-100 file:px-3 file:py-1 file:rounded-md file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200">
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol aksi --}}
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                                class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                            Simpan
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
