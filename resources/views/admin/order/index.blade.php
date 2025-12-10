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

                    <x-auth-session-status class="mb-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3"
                        :status="session('success')" />

                    <div
                        class="flex items-center justify-between mb-5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm px-4 py-3">
                        <h2 class="text-2xl font-bold">Tabel Order</h2>
                        {{-- Tombol Import & Export Excel --}}
                        <div class="flex items-center space-x-3">
                            {{-- Export Button --}}
                            <form action="{{ route('admin.order.export') }}" method="POST">
                                @csrf
                                <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                    Export Excel
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                        #</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                        Nama Customer</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                        Produk</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                        Metode Pemesanan</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                        Status Order</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase">
                                        Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($orders as $index => $order)
                                    <tr class="hover:bg-gray-50">
                                        {{-- Menampilkan Terkait Order --}}
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->nama_cus }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $order->produk->nama_produk ?? '-' }}</td>

                                        {{-- Menampilkan Metode Pemesanan --}}
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            @if ($order->booking_method == 'tempat')
                                                <span class="font-semibold text-blue-600">Pasang Di Tempat</span>
                                            @else
                                                <span class="font-semibold text-green-600">Online</span>
                                            @endif
                                        </td>

                                        {{-- Menampilkan Status Order --}}
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{-- Inisialisasi Alpine component untuk setiap baris order --}}
                                            <div x-data="{
                                                editing: false,
                                                currentStatus: '{{ $order->status_order }}',
                                                tempStatus: '{{ $order->status_order }}'
                                            }">

                                                {{-- MODE TAMPIL --}}
                                                <template x-if="!editing">
                                                    <div class="flex items-center space-x-2">
                                                        {{-- Status Badge --}}
                                                        <span
                                                            x-text="currentStatus === 'pending' ? 'Menunggu' : (currentStatus === 'processing' ? 'Diproses' : (currentStatus === 'completed' ? 'Selesai' : (currentStatus === 'canceled' ? 'Batal' : 'Unknown')))"
                                                            :class="{
                                                                'text-yellow-800 bg-yellow-200': currentStatus === 'pending',
                                                                'text-blue-800 bg-blue-200': currentStatus === 'processing',
                                                                'text-green-800 bg-green-200': currentStatus === 'completed',
                                                                'text-red-800 bg-red-200': currentStatus === 'canceled',
                                                                'text-gray-800 bg-gray-200': currentStatus === 'Unknown',
                                                            }"
                                                            class="px-2 py-1 text-sm font-semibold rounded-full capitalize">
                                                        </span>

                                                        {{-- Icon Edit --}}
                                                        <button @click="editing = true; tempStatus = currentStatus"
                                                            class="text-gray-500 hover:text-blue-500 p-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </template>

                                                {{-- MODE EDIT --}}
                                                <template x-if="editing">
                                                    <div class="flex items-center space-x-1">
                                                        {{-- Dropdown Status --}}
                                                        <select x-model="tempStatus"
                                                            class="form-select border-gray-300 rounded-md py-1 text-sm bg-white">
                                                            <option value="pending">Menunggu</option>
                                                            <option value="processing">Diproses</option>
                                                            <option value="completed">Selesai</option>
                                                            <option value="canceled">Batal</option>
                                                        </select>

                                                        {{-- Icon Simpan/OK --}}
                                                        <button @click="saveStatus({{ $order->id }}, tempStatus, $data)"
                                                            class="text-green-600 hover:text-green-700 p-1"
                                                            title="Simpan Status">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 13.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>

                                                        {{-- Icon Batal --}}
                                                        <button @click="editing = false; tempStatus = currentStatus"
                                                            class="text-red-600 hover:text-red-700 p-1"
                                                            title="Batal Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </td>

                                        {{-- Menampilkan Aksi --}}
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('admin.order.show', $order->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                                                    Detail
                                                </a>

                                                {{-- Tombol Hapus (Menggunakan confirmDelete JS) --}}
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
                                        <td colspan="8" class="px-6 py-4 text-sm text-center text-gray-500">
                                            Tidak ada data order.
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

    {{-- Script untuk Delete Confirmation --}}
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

    {{-- Script untuk Update Status Order --}}
    <script>
        function saveStatus(orderId, newStatus, alpineScope) {
            // Ambil token CSRF. Pastikan ada meta tag CSRF di header.
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/order/${orderId}/update-status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => {
                if (response.ok) {
                    // Update berhasil: gunakan alpineScope yang dikirimkan dari @click
                    alpineScope.currentStatus = newStatus;
                    alpineScope.editing = false;
                    alert('Status order #' + orderId + ' berhasil diperbarui!');
                } else {
                    // Gagal: kembalikan ke status lama dan matikan mode edit
                    alpineScope.tempStatus = alpineScope.currentStatus;
                    alpineScope.editing = false;
                    alert('Gagal mengupdate status. Silakan cek koneksi atau log server.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Gagal total (jaringan/server error)
                alpineScope.tempStatus = alpineScope.currentStatus;
                alpineScope.editing = false;
                alert('Terjadi kesalahan jaringan atau server.');
            });
        }
    </script>
</x-admin-app-layout>
