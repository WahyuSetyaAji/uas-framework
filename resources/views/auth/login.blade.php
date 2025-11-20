<x-auth-layout>

<div class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-black via-gray-900 to-gray-800">

    <div class="w-full max-w-md p-8 border shadow-2xl bg-white/10 backdrop-blur-xl rounded-2xl border-white/10">

        <h2 class="mb-2 text-3xl font-extrabold tracking-wide text-center text-white">
            Selamat Datang
        </h2>
        <p class="mb-8 text-lg font-semibold text-center text-blue-300">
            Masuk ke Bowo Jok
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <x-input-label for="email" class="text-white"/>

                <x-text-input id="email" type="email" name="email"
                    class="w-full text-white placeholder-gray-300 border rounded-lg bg-white/10 border-white/20 focus:ring-0 focus:border-blue-500"
                    required autofocus autocomplete="username"/>

                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300"/>
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <x-input-label for="password" class="text-white"/>

                <x-text-input id="password" type="password" name="password"
                    class="w-full text-white border rounded-lg bg-white/10 border-white/20 focus:ring-0 focus:border-blue-500"
                    required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300"/>
            </div>

            {{-- Remember + Lupa Password --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-white">
                    <input type="checkbox" name="remember"
                        class="text-blue-500 bg-gray-700 border-gray-300 rounded focus:ring-0">
                    <span class="ml-2">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-blue-300 hover:text-blue-400">
                        Lupa Kata Sandi?
                    </a>
                @endif
            </div>

            {{-- Tombol login --}}
            <button type="submit"
                class="w-full py-3 font-semibold text-white transition rounded-lg bg-gradient-to-r from-blue-700 via-black to-red-700 hover:opacity-90">
                MASUK
            </button>
        </form>
    </div>
</div>

</x-auth-layout>
