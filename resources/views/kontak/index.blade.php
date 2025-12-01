<x-guest-layout>
    <x-slot:title>
        Kontak - Bowo Jok
    </x-slot:title>

    <section class="min-h-screen py-20 bg-gradient-to-r from-blue-100 via-white to-red-100">
        <div class="container px-6 mx-auto">

            <h2 class="mb-12 text-4xl font-extrabold text-center text-blue-900">
                Hubungi Kami
            </h2>

            <div class="grid items-start grid-cols-1 gap-12 lg:grid-cols-3">

                {{-- MAP --}}
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9066671354885!2d106.97374187475104!3d-6.276001093712801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d966478aee5%3A0xaf2566d4109f896!2sBowo%20Jok!5e0!3m2!1sid!2sid!4v1763582500790!5m2!1sid!2sid"
                        width="100%" height="380" class="border-2 border-red-400 shadow-xl rounded-2xl" allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

                {{-- INFORMASI --}}
                <div class="space-y-6">

                    <h3 class="text-2xl font-bold text-gray-900">
                        Bowo Jok
                    </h3>

                    <p class="text-lg leading-relaxed">
                        {{ $kontak->alamat ?? 'Jl. Raya Pekayon, RT.004/RW.1, Jaka Setia, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17147' }}
                    </p>

                    <div>
                        <h4 class="font-semibold">Phone</h4>
                        <p class="text-xl font-bold text-red-600">
                            {{ $kontak->no_kontak ?? '-' }}
                        </p>
                    </div>

                </div>

                {{-- EMAIL + FOLLOW --}}
                <div class="space-y-8">

                    <div>
                        <h4 class="text-lg font-semibold">Email</h4>
                        <p class="text-lg font-medium text-red-600">
                            {{ $kontak->email_kontak ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold">Follow Us</h4>

                        <div class="flex items-center gap-5 mt-3 text-gray-700">

                            {{-- YouTube SVG --}}
                            <a href="https://www.youtube.com/@bowojok" target="_blank"
                                class="transition hover:text-red-600">
                                <svg width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h-.002C3.637 1.999 0 2.468 0 8s3.637 6.001 8.049 6.001h.002C12.463 14.001 16.1 13.532 16.1 8s-3.637-6.001-8.049-6.001zM6 11.2V4.8l5 3.2-5 3.2z" />
                                </svg>
                            </a>

                            {{-- Instagram SVG --}}
                            <a href="https://www.instagram.com/bowojok" target="_blank"
                                class="transition hover:text-pink-500">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.65-1.34 3-3 3H7c-1.66 0-3-1.35-3-3V7c0-1.66 1.34-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z" />
                                </svg>
                            </a>

                            {{-- Facebook SVG --}}
                            <a href="https://www.facebook.com/galeri.b.jok" target="_blank"
                                class="transition hover:text-blue-600">
                                <svg width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.94 6.588H7.468V5.266c0-.31.206-.383.35-.383h1.106V3h-1.52C6.179 3 5.5 3.734 5.5 5.08v1.508H4v1.92h1.5V13h1.968V8.508H9l.234-1.92H8.94z" />
                                </svg>
                            </a>

                        </div>
                    </div>

                    {{-- WA BUTTON --}}
                    <a href="{{ $waLink }}"
                        class="inline-block px-6 py-3 font-semibold text-white transition-transform bg-green-500 rounded-full shadow-lg hover:bg-green-600 hover:scale-105">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
