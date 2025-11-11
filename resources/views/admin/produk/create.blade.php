<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kelola Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">

                        <h2 class="mb-5 text-2xl font-bold bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                            Buat Produk Baru
                        </h2>

                        {{-- Form to create a new product --}}
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6">

                            @csrf <!-- Laravel CSRF protection -->

                            <div class="form-group">
                                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                <input type="text" id="nama_produk" name="nama_produk"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="3"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                                <input type="number" step="0.01" id="harga" name="harga"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="gambar_produk" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                                <input type="file" id="gambar_produk" name="gambar_produk"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <small class="text-gray-500">Opsional, bisa dikosongkan</small>
                            </div>

                            <div class="form-group">
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" id="stock" name="stock"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    min="0" value="0" required>
                            </div>

                            <div class="form-group">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status" name="status"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                    <option value="tersedia" selected>Tersedia</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_ditambahkan" class="block text-sm font-medium text-gray-700">Tanggal Ditambahkan</label>
                                <input type="date" id="tanggal_ditambahkan" name="tanggal_ditambahkan"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    value="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                            </div>

                            <div class="flex justify-between mt-6">
                                <a href="{{ route('admin.produk.index') }}"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                    Cancel
                                </a>

                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit
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
