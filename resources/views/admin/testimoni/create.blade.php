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

                        <h2 class="mb-5 text-2xl font-bold bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                            Tambah Testimoni Baru
                        </h2>

                        {{-- Form untuk tambah testimoni --}}
                        <form action="{{ route('admin.testimoni.store') }}" method="POST"
                            class="space-y-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6">
                            @csrf

                            {{-- Nama Testimoni --}}
                            <div class="form-group">
                                <label for="nama_testimoni" class="block text-sm font-medium text-gray-700">
                                    Nama Pengguna
                                </label>
                                <input type="text" id="nama_testimoni" name="nama_testimoni"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            {{-- Komentar --}}
                            <div class="form-group">
                                <label for="komentar" class="block text-sm font-medium text-gray-700">Komentar</label>

                                <textarea id="komentar" name="komentar" rows="3"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required></textarea>

                                <p id="wordCounter" class="text-sm text-gray-600 mt-1">0 / 100 kata</p>
                            </div>

                            {{-- Rating --}}
                            <div class="form-group">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                                <select id="rating" name="rating"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                    <option value="5" selected>⭐⭐⭐⭐⭐ (5)</option>
                                    <option value="4">⭐⭐⭐⭐ (4)</option>
                                    <option value="3">⭐⭐⭐ (3)</option>
                                    <option value="2">⭐⭐ (2)</option>
                                    <option value="1">⭐ (1)</option>
                                </select>
                            </div>

                            {{-- Tanggal Testimoni --}}
                            <div class="form-group">
                                <label for="tanggal_testimoni" class="block text-sm font-medium text-gray-700">
                                    Tanggal Testimoni
                                </label>
                                <input type="date" id="tanggal_testimoni" name="tanggal_testimoni"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm
                                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    value="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                            </div>

                            {{-- Tombol --}}
                            <div class="flex justify-between mt-6">
                                <a href="{{ route('admin.testimoni.index') }}"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200
                                            border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none
                                            focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                    Batal
                                </a>

                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600
                                            border border-transparent rounded-md shadow-sm hover:bg-indigo-700
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Script Batasi 100 Kata --}}
                    <script>
                        const textarea = document.getElementById("komentar");
                        const counter = document.getElementById("wordCounter");
                        const maxWords = 100;

                        textarea.addEventListener("input", function () {
                            let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);

                            if (words.length > maxWords) {
                                textarea.value = words.slice(0, maxWords).join(" ");
                                words = words.slice(0, maxWords);
                            }

                            counter.textContent = `${words.length} / ${maxWords} kata`;

                            if (words.length >= maxWords) {
                                counter.classList.remove("text-gray-600");
                                counter.classList.add("text-red-600", "font-semibold");
                            } else {
                                counter.classList.remove("text-red-600", "font-semibold");
                                counter.classList.add("text-gray-600");
                            }
                        });
                    </script>

                    @vite('resources/js/app.js')
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
