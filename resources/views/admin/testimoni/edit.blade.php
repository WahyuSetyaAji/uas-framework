<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kelola Testimoni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mx-auto mt-5">

                        {{-- Pesan sukses --}}
                        <x-auth-session-status class="mb-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3"
                            :status="session('success')" />

                        <h2 class="mb-5 text-2xl font-bold bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                            Edit Testimoni
                        </h2>

                        {{-- Form Edit Testimoni --}}
                        <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST"
                                class="space-y-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6">
                            @csrf
                            @method('PUT')

                            {{-- Nama Testimoni --}}
                            <div class="form-group">
                                <label for="nama_testimoni" class="block text-sm font-medium text-gray-700">
                                    Nama Pengguna
                                </label>
                                <input type="text" id="nama_testimoni" name="nama_testimoni"
                                    value="{{ old('nama_testimoni', $testimoni->nama_testimoni) }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            {{-- Komentar --}}
                            <div class="form-group">
                                <label for="komentar" class="block text-sm font-medium text-gray-700">
                                    Komentar
                                </label>
                                <textarea id="komentar" name="komentar" rows="3"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>{{ old('komentar', $testimoni->komentar) }}</textarea>
                            </div>

                            {{-- Rating --}}
                            <div class="form-group">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                                <select id="rating" name="rating"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                    <option value="5" {{ old('rating', $testimoni->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5)</option>
                                    <option value="4" {{ old('rating', $testimoni->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4)</option>
                                    <option value="3" {{ old('rating', $testimoni->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3)</option>
                                    <option value="2" {{ old('rating', $testimoni->rating) == 2 ? 'selected' : '' }}>⭐⭐ (2)</option>
                                    <option value="1" {{ old('rating', $testimoni->rating) == 1 ? 'selected' : '' }}>⭐ (1)</option>
                                </select>
                            </div>

                            {{-- Tanggal Testimoni --}}
                            <div class="form-group">
                                <label for="tanggal_testimoni" class="block text-sm font-medium text-gray-700">
                                    Tanggal Testimoni
                                </label>
                                <input type="date" id="tanggal_testimoni" name="tanggal_testimoni"
                                    value="{{ old('tanggal_testimoni', $testimoni->tanggal_testimoni) }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex justify-between mt-6">
                                <a href="{{ route('admin.testimoni.index') }}"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200
                                            border border-transparent rounded-md shadow-sm hover:bg-gray-300
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                    Batal
                                </a>

                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600
                                            border border-transparent rounded-md shadow-sm hover:bg-indigo-700
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update
                                </button>
                            </div>

                        </form>
                    </div>

                    @vite('resources/js/app.js')
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
