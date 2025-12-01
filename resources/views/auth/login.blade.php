<x-auth-layout>

    <div class="flex justify-center items-center min-h-screen">

        {{-- Card Form Login --}}
        <div class="w-full max-w-sm bg-white rounded-xl shadow-2xl p-8 z-10">

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Selamat Datang
            </h2>
            <p class="text-md text-center font-light text-blue-600 mb-8">
                Akses Admin Panel Anda
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-5">
                    <x-input-label for="email" value="Email atau Username" class="text-gray-700" />

                    <input id="email" type="email" name="email"
                        placeholder="Masukkan Email"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-500 
                               rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required autofocus autocomplete="username">

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <x-input-label for="password" value="Kata Sandi" class="text-gray-700" />

                    <div class="relative">
                        <input id="password" type="password" name="password"
                            placeholder="Masukkan Kata Sandi"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-500 
                                   pr-10 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required autocomplete="current-password">

                        {{-- Toggle Password --}}
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-blue-600">

                            {{-- Eye Open --}}
                            <svg id="eyeOpen" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 
                                    4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            {{-- Eye Closed --}}
                            <svg id="eyeClosed" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.828c-1.393.593-2.903.9-4.436.9-4.477 
                                    0-8.268-2.943-9.542-7 1.274-4.057 
                                    5.065-7 9.542-7 1.625 0 3.161.328 
                                    4.542.923" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2 2m-2-2l-2-2m2 2l2 2" />
                            </svg>

                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                {{-- Lupa Password --}}
                <div class="flex items-center justify-end mb-6">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-blue-600 hover:text-blue-800 font-medium transition">
                            Lupa Kata Sandi?
                        </a>
                    @endif
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full py-3 font-bold rounded-lg text-white tracking-wider 
                           bg-gradient-to-r from-blue-600 to-cyan-500 
                           hover:from-blue-700 hover:to-cyan-600 transition shadow-lg shadow-blue-500/50">
                    MASUK
                </button>

            </form>

        </div>
    </div>

    {{-- JS Toggle Password --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            togglePassword.addEventListener('click', () => {
                const type = passwordInput.type === "password" ? "text" : "password";
                passwordInput.type = type;

                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        });
    </script>

</x-auth-layout>
