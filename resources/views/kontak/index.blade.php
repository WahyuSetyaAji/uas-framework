<x-guest-layout>
    <x-slot:title>
        Kontak - Bowo Jok
    </x-slot:title>

    <section class="py-20 bg-gradient-to-r from-blue-100 via-white to-red-100">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-12 text-4xl font-extrabold text-blue-900">Hubungi Kami</h2>

            @if($kontak)
                <div class="max-w-lg p-8 mx-auto transition-transform duration-300 bg-white border-2 border-red-500 shadow-lg rounded-2xl hover:scale-105">
                    <div class="space-y-6">
                        <p class="flex items-center justify-center gap-3 text-lg font-semibold text-gray-800">
                            <i class="text-xl text-red-500 bi bi-geo-alt-fill"></i>
                            {{ $kontak->alamat }}
                        </p>
                        <p class="flex items-center justify-center gap-3 text-lg font-semibold text-gray-800">
                            <i class="text-xl text-blue-500 bi bi-envelope-fill"></i>
                            {{ $kontak->email_kontak }}
                        </p>
                        <p class="flex items-center justify-center gap-3 text-lg font-semibold text-gray-800">
                            <i class="text-xl text-green-500 bi bi-telephone-fill"></i>
                            {{ $kontak->no_kontak }}
                        </p>
                    </div>
                </div>
            @else
                <p class="mt-4 text-lg text-gray-500">Data kontak belum tersedia.</p>
            @endif

            <div class="flex flex-wrap justify-center gap-6 mt-12">
                <a href="https://www.facebook.com/galeri.b.jok?locale=id_ID" target="_blank" class="flex items-center gap-3 px-6 py-3 font-semibold text-white transition-transform bg-blue-600 rounded-full shadow-lg hover:bg-blue-700 hover:scale-105">
                    <i class="text-2xl bi bi-facebook"></i> Facebook
                </a>
                <a href="https://wa.me/6281295588338" target="_blank" class="flex items-center gap-3 px-6 py-3 font-semibold text-white transition-transform bg-green-500 rounded-full shadow-lg hover:bg-green-600 hover:scale-105">
                    <i class="text-2xl bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
