<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-between mb-5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                        <h2 class="text-2xl font-bold">Tabel Order</h2>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">#</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Nama Customer</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">No. HP</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Produk</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Jenis Order</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Tanggal Order</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($orders as $index => $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->nama_cus }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->no_cus }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->produk->nama_produk ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->jenis_order }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->tanggal_order }}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('admin.order.show', $order->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                                                    Detail
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                <button type="button"
                                                        class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700"
                                                        onclick="confirmDelete({{ $order->id }}, '{{ route('admin.order.destroy', $order->id) }}')">
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
