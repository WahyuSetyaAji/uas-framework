<x-auth-layout>

<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-black via-gray-900 to-gray-800 px-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl shadow-2xl rounded-2xl p-8 border border-white/10">
        
        <h2 class="text-3xl font-extrabold text-center text-white tracking-wide mb-2">
            Selamat Datang
        </h2>
        <p class="text-lg text-center font-semibold text-blue-300 mb-8">
            Masuk ke Bowo Jok
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <x-input-label for="email" class="text-white"/>

                <x-text-input id="email" type="email" name="email"
                    class="w-full bg-white/10 border border-white/20 text-white placeholder-gray-300
                           rounded-lg focus:ring-0 focus:border-blue-500"
                    required autofocus autocomplete="username"/>

                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300"/>
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <x-input-label for="password" class="text-white"/>

                <x-text-input id="password" type="password" name="password"
                    class="w-full bg-white/10 border border-white/20 text-white
                           rounded-lg focus:ring-0 focus:border-blue-500"
                    required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300"/>
            </div>

            {{-- Remember + Lupa Password --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-white text-sm">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 bg-gray-700 text-blue-500 focus:ring-0">
                    <span class="ml-2">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-blue-300 hover:text-blue-400 text-sm">
                        Lupa Kata Sandi?
                    </a>
                @endif
            </div>

            {{-- Tombol login --}}
            <button type="submit"
                class="w-full py-3 font-semibold rounded-lg text-white 
                       bg-gradient-to-r from-blue-700 via-black to-red-700
                       hover:opacity-90 transition">
                MASUK
            </button>

            <p class="text-center text-gray-300 text-sm mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-300 hover:text-blue-400 font-semibold">
                    Daftar Sekarang
                </a>
            </p>

        </form>
    </div>
</div>

</x-auth-layout>
