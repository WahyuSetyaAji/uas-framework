<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Display success message --}}
                    <x-auth-session-status class="mb-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3"
                        :status="session('success')" />

                    <div class="flex items-center justify-between mb-5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                        <h2 class="text-2xl font-bold">Tabel Produk</h2>
                        <a href="{{ route('admin.produk.create') }}" class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-md hover:bg-green-700">
                            + Tambah Produk
                        </a>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">#</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Nama Produk</th>
                                    {{-- <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Deskripsi</th> --}}
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Harga</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Gambar</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Stock</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Tanggal Ditambahkan</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($data as $index => $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->nama_produk }}</td>
                                        {{-- <td class="px-6 py-4 text-sm text-gray-700">{{ $item->deskripsi }}</td> --}}
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->harga }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            @if($item->gambar_produk)
                                                <img src="{{ asset($item->gambar_produk) }}"
                                                    alt="{{ $item->nama_produk }}" class="w-16 h-16 object-cover rounded">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->stock ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <span class="px-2 py-1 text-xs font-semibold rounded
                                                {{ $item->status === 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->tanggal_ditambahkan }}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.produk.edit', $item->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                                    Edit
                                                </a>

                                                <button type="button"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700"
                                                    onclick="confirmDelete({{ $item->id }}, '{{ route('admin.produk.destroy', $item->id) }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-sm text-center text-gray-500">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-admin-app-layout>
