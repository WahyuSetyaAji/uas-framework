@extends('layouts.guest')

@section('title', 'Kontak - Bowo Jok')

@section('content')
<section class="py-20 bg-gradient-to-r from-blue-100 via-white to-red-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold text-blue-900 mb-12">Hubungi Kami</h2>

        @if($kontak)
            <div class="max-w-lg mx-auto bg-white border-2 border-red-500 rounded-2xl shadow-lg p-8 hover:scale-105 transition-transform duration-300">
                <div class="space-y-6">
                    <p class="flex items-center justify-center gap-3 text-gray-800 font-semibold text-lg">
                        <i class="bi bi-geo-alt-fill text-red-500 text-xl"></i>
                        {{ $kontak->alamat }}
                    </p>
                    <p class="flex items-center justify-center gap-3 text-gray-800 font-semibold text-lg">
                        <i class="bi bi-envelope-fill text-blue-500 text-xl"></i>
                        {{ $kontak->email_kontak }}
                    </p>
                    <p class="flex items-center justify-center gap-3 text-gray-800 font-semibold text-lg">
                        <i class="bi bi-telephone-fill text-green-500 text-xl"></i>
                        {{ $kontak->no_kontak }}
                    </p>
                </div>
            </div>
        @else
            <p class="text-gray-500 mt-4 text-lg">Data kontak belum tersedia.</p>
        @endif

        <div class="mt-12 flex flex-wrap justify-center gap-6">
            <a href="https://www.facebook.com/galeri.b.jok?locale=id_ID" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full shadow-lg flex items-center gap-3 transition-transform hover:scale-105">
                <i class="bi bi-facebook text-2xl"></i> Facebook
            </a>
            <a href="https://wa.me/6281295588338" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg flex items-center gap-3 transition-transform hover:scale-105">
                <i class="bi bi-whatsapp text-2xl"></i> WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
