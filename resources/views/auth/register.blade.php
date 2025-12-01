<x-auth-layout>

<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-black via-gray-900 to-gray-800 px-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl shadow-2xl rounded-2xl p-8 border border-white/10">

        <h2 class="text-3xl font-extrabold text-center text-white tracking-wide mb-2">
            Buat Akun Baru
        </h2>
        <p class="text-lg text-center font-semibold text-blue-300 mb-8">
            Bergabung dengan Bowo Jok
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-5">
                <x-input-label for="name" class="text-white"/>
                <x-text-input id="name" name="name" type="text"
                    class="w-full bg-white/20 border border-white/20 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300"/>
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <x-input-label for="email" class="text-white"/>
                <x-text-input id="email" name="email" type="email"
                    class="w-full bg-white/20 border border-white/20 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300"/>
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <x-input-label for="password" class="text-white"/>
                <x-text-input id="password" name="password" type="password"
                    class="w-full bg-white/20 border border-white/20 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300"/>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">
                <x-input-label for="password_confirmation" class="text-white"/>
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="w-full bg-white/20 border border-white/20 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300"/>
            </div>

            {{-- Tombol daftar --}}
            <button type="submit"
                class="w-full py-3 font-semibold rounded-lg text-white 
                       bg-gradient-to-r from-blue-700 via-black to-red-700
                       hover:opacity-90 transition">
                DAFTAR
            </button>

            <p class="text-center text-gray-300 text-sm mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-300 hover:text-blue-400 font-semibold">
                    Masuk Sekarang
                </a>
            </p>

        </form>
    </div>

</div>
</x-auth-layout>

