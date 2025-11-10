<x-app-layout>
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

                    {{-- Detail Order sebagai form readonly --}}
                    <form class="space-y-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6">

                        <div class="form-group">
                            <label for="nama_cus" class="block text-sm font-medium text-gray-700">Nama Customer</label>
                            <input type="text" id="nama_cus" name="nama_cus" value="{{ $order->nama_cus }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="no_cus" class="block text-sm font-medium text-gray-700">No. HP</label>
                            <input type="text" id="no_cus" name="no_cus" value="{{ $order->no_cus }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="produk" class="block text-sm font-medium text-gray-700">Produk</label>
                            <input type="text" id="produk" name="produk" value="{{ $order->produk->nama_produk ?? '-' }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="jenis_order" class="block text-sm font-medium text-gray-700">Jenis Order</label>
                            <input type="text" id="jenis_order" name="jenis_order" value="{{ $order->jenis_order }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="catatan_custom" class="block text-sm font-medium text-gray-700">Catatan Custom</label>
                            <textarea id="catatan_custom" name="catatan_custom"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                rows="3" disabled>{{ $order->catatan_custom ?? '-' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_order" class="block text-sm font-medium text-gray-700">Tanggal Order</label>
                            <input type="date" id="tanggal_order" name="tanggal_order" value="{{ $order->tanggal_order }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_booking" class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
                            <input type="date" id="tanggal_booking" name="tanggal_booking" value="{{ $order->tanggal_booking ?? '-' }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="jam_booking" class="block text-sm font-medium text-gray-700">Jam Booking</label>
                            <input type="time" id="jam_booking" name="jam_booking" value="{{ $order->jam_booking ?? '-' }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm bg-gray-100"
                                disabled>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
