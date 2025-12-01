<x-guest-layout>
    <x-slot:title>
        Form Pemesanan - {{ $produk->nama_produk }}
    </x-slot:title>

    {{-- CONTAINER UTAMA FORM: Menggunakan mt-20 untuk menggeser form ke bawah --}}
    <div class="max-w-3xl p-6 mx-auto mt-20 mb-20 bg-white rounded-2xl shadow-lg">
        <h2 class="mb-4 text-3xl font-bold text-black-900">Form Pemesanan</h2>

        {{-- Menampilkan pesan error validasi dari Controller --}}
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Info Produk --}}
        <p class="mb-6 text-gray-700">
            Anda sedang memesan:
            <span id="namaProdukDipilih" class="font-semibold">{{ $produk->nama_produk }}</span>
        </p>

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form id="orderForm" method="POST" action="{{ route('order.store') }}" class="space-y-4">
            @csrf
            {{-- Pilih Model Jok --}}
            <div>
                <label for="selectProduk" class="font-semibold">Pilih Model Jok</label>
                <select id="selectProduk" name="produk_id"
                    class="w-full p-3 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('produk_id') border-red-500 @enderror"
                    required>
                    @foreach ($semuaProduk as $p)
                        <option value="{{ $p->id }}" data-nama="{{ $p->nama_produk }}"
                            {{ old('produk_id', $p->id) == $produk->id ? 'selected' : '' }}>
                            {{ $p->nama_produk }}
                        </option>
                    @endforeach
                </select>
                @error('produk_id')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label for="nama_cus" class="font-semibold">Nama Lengkap</label>
                <input type="text" id="nama_cus" name="nama_cus" value="{{ old('nama_cus') }}"
                    class="w-full p-3 mt-1 border rounded-lg @error('nama_cus') border-red-500 @enderror"
                    placeholder="Masukkan nama Anda" required>
                @error('nama_cus')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- No WhatsApp --}}
            <div>
                <label for="no_cus" class="font-semibold">Nomor WhatsApp</label>
                <input type="text" id="no_cus" name="no_cus" value="{{ old('no_cus') }}"
                    class="w-full p-3 mt-1 border rounded-lg @error('no_cus') border-red-500 @enderror"
                    placeholder="Contoh: 0812xxxxxxx" required>
                @error('no_cus')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Catatan Tambahan --}}
            <div id="catatan_custom_wrapper">
                <label for="catatan_custom" class="font-semibold">Catatan Tambahan</label>
                <textarea name="catatan_custom" id="catatan_custom"
                    class="w-full p-3 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('catatan_custom') border-red-500 @enderror"
                    rows="4" placeholder="Contoh: request warna jok, bahan, tipe kulit...">{{ old('catatan_custom') }}</textarea>
                @error('catatan_custom')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Metode Pemesanan --}}
            <div>
                <label for="booking_method" class="font-semibold">Metode Pemesanan</label>
                <select name="booking_method" id="booking_method"
                    class="w-full p-3 mt-1 border rounded-lg @error('booking_method') border-red-500 @enderror"
                    required>
                    <option value="tempat" {{ old('booking_method') == 'tempat' ? 'selected' : '' }}>Pasang Di tempat
                    </option>
                    <option value="kirim" {{ old('booking_method') == 'kirim' ? 'selected' : '' }}>Online</option>
                </select>
                @error('booking_method')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Alamat (Hanya tampil/required jika booking_method = kirim) --}}
            <div id="alamat_wrapper" class="{{ old('booking_method') == 'kirim' ? '' : 'hidden' }}">
                <label for="alamat" class="font-semibold">Alamat Pengiriman</label>
                <textarea name="alamat" id="alamat"
                    class="w-full p-3 mt-1 border rounded-lg @error('alamat') border-red-500 @enderror" rows="3"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('produk.index') }}"
                    class="px-6 py-3 font-semibold text-gray-700 bg-gray-200 rounded-lg transition hover:bg-gray-300">
                    Kembali
                </a>

                <button type="submit"
                    class="px-6 py-3 font-semibold text-white bg-green-600 rounded-lg transition hover:bg-green-700">
                    Lanjutkan ke WhatsApp
                </button>
            </div>

        </form>
    </div>

    {{-- JS UNTUK LOGIKA TAMPILAN DINAMIS --}}
    <script>
        const bookingMethod = document.getElementById("booking_method");
        const alamatWrapper = document.getElementById("alamat_wrapper");
        const alamatInput = document.getElementById("alamat"); // <-- BARU: Ambil input alamat
        const selectProduk = document.getElementById("selectProduk");
        const namaProdukDipilih = document.getElementById("namaProdukDipilih");

        // Fungsi untuk memperbarui tampilan field
        function updateFormFields() {
            const isTempat = bookingMethod.value === "tempat";

            // Mengatur Tampilan field Alamat
            if (isTempat) {
                alamatWrapper.classList.add("hidden");
                alamatInput.removeAttribute("required"); // Hapus required
            } else { // Jika 'kirim' (Online)
                alamatWrapper.classList.remove("hidden");
                alamatInput.setAttribute("required", "required"); // Tambah required
            }
        }

        // 1. Update nama produk di atas saat dropdown berubah
        selectProduk.addEventListener("change", function() {
            let namaProduk = this.options[this.selectedIndex].getAttribute("data-nama");
            namaProdukDipilih.textContent = namaProduk;
        });

        // 2. Perbarui tampilan saat Metode Pemesanan berubah
        bookingMethod.addEventListener("change", updateFormFields);

        // 3. Panggil saat halaman dimuat untuk menangani status 'old()'
        updateFormFields();
    </script>

</x-guest-layout>
