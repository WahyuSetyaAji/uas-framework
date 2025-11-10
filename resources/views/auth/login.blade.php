<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="p-8 bg-white rounded-2xl shadow-xl w-96">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-1">Selamat Datang</h2>
            <p class="text-lg font-semibold text-indigo-600 text-center mb-6">di Bowo Jok</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Kata Sandi')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800"
                            href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <x-primary-button class="w-full justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-md">
                    {{ __('MASUK') }}
                </x-primary-button>

                <p class="text-sm text-gray-500 text-center mt-4">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:text-indigo-800">Daftar Sekarang</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
