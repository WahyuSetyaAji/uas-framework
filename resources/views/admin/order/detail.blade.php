<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol kembali --}}
                    <a href="{{ route('admin.order.index') }}"
                        class="inline-block mb-6 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Kembali
                    </a>

                    <h3 class="mb-4 text-2xl font-bold text-gray-800">Detail Pemesanan #{{ $order->id }}</h3>
                    <hr class="mb-6">

                    {{-- Detail Order sebagai form readonly --}}
                    <form class="space-y-6 bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6">

                        {{-- INFORMASI DASAR --}}
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2">Informasi Dasar</h4>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="form-group">
                                <label for="nama_cus" class="block text-sm font-medium text-gray-700">Nama Customer</label>
                                <input type="text" id="nama_cus" name="nama_cus" value="{{ $order->nama_cus }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="no_cus" class="block text-sm font-medium text-gray-700">No. HP / WhatsApp</label>
                                <input type="text" id="no_cus" name="no_cus" value="{{ $order->no_cus }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_order" class="block text-sm font-medium text-gray-700">Tanggal Order</label>
                                <input type="text" id="tanggal_order" name="tanggal_order" value="{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d F Y') }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                    disabled>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="form-group">
                                <label for="produk" class="block text-sm font-medium text-gray-700">Model Produk Dipilih</label>
                                <input type="text" id="produk" name="produk" value="{{ $order->produk->nama_produk ?? 'Produk Dihapus' }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="status_order_view" class="block text-sm font-medium text-gray-700">Status Order</label>
                                <div class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 flex items-center h-10">
                                    @if ($order->status_order == 'pending')
                                        <span class="px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">Menunggu</span>
                                    @elseif ($order->status_order == 'processing')
                                        <span class="px-2 py-1 text-sm font-semibold text-blue-800 bg-blue-200 rounded-full">Diproses</span>
                                    @elseif ($order->status_order == 'completed')
                                        <span class="px-2 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Selesai</span>
                                    @elseif ($order->status_order == 'canceled')
                                        <span class="px-2 py-1 text-sm font-semibold text-red-800 bg-red-200 rounded-full">Batal</span>
                                    @else
                                        <span class="px-2 py-1 text-sm font-semibold text-gray-800 bg-gray-200 rounded-full">Unknown</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- INFORMASI PEMESANAN BARU --}}
                        <h4 class="pt-4 text-lg font-semibold text-gray-700 border-b pb-2">Metode dan Detail Pemesanan</h4>

                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700">Metode Pemesanan</label>
                            <input type="text" value="{{ $order->booking_method == 'tempat' ? 'Pasang Di Tempat' : 'Online' }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100 font-bold {{ $order->booking_method == 'tempat' ? 'text-blue-600' : 'text-green-600' }}"
                                disabled>
                        </div>

                        {{-- Field Alamat hanya muncul jika metodenya KIRIM --}}
                        @if ($order->booking_method == 'kirim')
                            <div class="form-group">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                                <textarea id="alamat" name="alamat"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                    rows="3" disabled>{{ $order->alamat ?? 'Tidak ada alamat tercatat.' }}</textarea>
                            </div>
                        @endif

                        {{-- CATATAN --}}
                        <h4 class="pt-4 text-lg font-semibold text-gray-700 border-b pb-2">Catatan Tambahan</h4>

                        <div class="form-group">
                            <label for="catatan_custom" class="block text-sm font-medium text-gray-700">Catatan Tambahan Customer</label>
                            <textarea id="catatan_custom" name="catatan_custom"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                rows="3" disabled>{{ $order->catatan_custom ?? 'Tidak ada catatan tambahan.' }}</textarea>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
