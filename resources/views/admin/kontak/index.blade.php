<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kelola Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Pesan sukses --}}
                    <x-auth-session-status class="mb-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3"
                        :status="session('success')" />

                    {{-- Header tabel + tombol tambah --}}
                    <div class="flex items-center justify-between mb-5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                        <h2 class="text-2xl font-bold">Tabel Kontak</h2>
                        <a href="{{ route('admin.kontak.create') }}"
                            class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-md hover:bg-green-700">
                            + Tambah Kontak Baru
                        </a>
                    </div>

                    {{-- Tabel kontak --}}
                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">#</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Nama</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Email</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">No Kontak</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Tipe</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($kontak as $index => $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + $kontak->firstItem() }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->nama }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->email_kontak }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->no_kontak }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 capitalize">{{ $item->tipe }}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.kontak.edit', $item->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                                    Edit
                                                </a>

                                                <button type="button"
                                                        class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700"
                                                        onclick="confirmDelete({{ $item->id }}, '{{ route('admin.kontak.destroy', $item->id) }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-sm text-center text-gray-500">
                                            Belum ada data kontak
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $kontak->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus kontak ini?')) {
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
