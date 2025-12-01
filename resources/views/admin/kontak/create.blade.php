<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Kontak Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.kontak.store') }}" method="POST">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email_kontak" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email_kontak" id="email_kontak"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('email_kontak') }}" required>
                        @error('email_kontak')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-4">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nomor Kontak --}}
                    <div class="mb-4">
                        <label for="no_kontak" class="block mb-2 text-sm font-medium text-gray-700">Nomor Kontak</label>
                        <input type="text" name="no_kontak" id="no_kontak"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('no_kontak') }}" required>
                        @error('no_kontak')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tipe --}}
                    <div class="mb-6">
                        <label for="tipe" class="block mb-2 text-sm font-medium text-gray-700">Tipe Kontak</label>
                        <select name="tipe" id="tipe"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="cs" {{ old('tipe') == 'cs' ? 'selected' : '' }}>Customer Service</option>
                            <option value="order" {{ old('tipe') == 'order' ? 'selected' : '' }}>Order</option>
                        </select>
                        @error('tipe')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                            Simpan
                        </button>
                        <a href="{{ route('admin.kontak.index') }}"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-admin-app-layout>
