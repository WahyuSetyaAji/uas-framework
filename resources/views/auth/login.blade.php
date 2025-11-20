<x-auth-layout>
    
    {{-- Hapus semua class background di sini, hanya pertahankan penempatan di tengah --}}
    <div class="flex justify-center items-center min-h-screen"> 

        {{-- Container Form Login: Card Putih --}}
        <div class="w-full max-w-sm bg-white rounded-xl shadow-2xl p-8 transform transition duration-300 z-10">
            
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
                    <x-input-label for="email" value="Email atau Username" class="text-gray-700"/>
                    <x-text-input id="email" type="email" name="email"
                        placeholder="Masukkan Email"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-500 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600"/>
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <x-input-label for="password" value="Kata Sandi" class="text-gray-700"/>
                    <x-text-input id="password" type="password" name="password"
                        placeholder="Masukkan Kata Sandi"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-500 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required autocomplete="current-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600"/>
                </div>

                {{-- Remember + Lupa Password --}}
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-gray-600 text-sm">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition duration-150">Lupa Kata Sandi?</a>
                    @endif
                </div>

                {{-- Tombol login --}}
                <button type="submit"
                    class="w-full py-3 font-bold rounded-lg text-white tracking-wider 
                           bg-gradient-to-r from-blue-600 to-cyan-500 
                           hover:from-blue-700 hover:to-cyan-600 transition duration-300 shadow-lg shadow-blue-500/50">
                    MASUK
                </button>

                <p class="text-center text-gray-500 text-sm mt-6">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-150">Daftar Sekarang</a>
                </p>

            </form>
        </div>
    </div>

</x-auth-layout>
