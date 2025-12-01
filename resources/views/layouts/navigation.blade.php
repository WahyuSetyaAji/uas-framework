<nav x-data="{ open: false }"
    class="fixed top-0 w-full z-50 backdrop-blur-xl bg-white/10 border-b border-white/20 shadow-[0_4px_30px_rgba(0,0,0,0.2)] transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/galeri/logo/bjlogo.png') }}" alt="Bowo Jok Logo"
                        class="h-10 drop-shadow-lg">

                    <span class="text-2xl font-extrabold tracking-wide text-white drop-shadow-lg">
                        Bowo Jok
                    </span>
                </a>
            </div>

            <!-- DESKTOP MENU -->
            <div class="hidden md:flex items-center space-x-10 text-red-500 font-medium">

                <a href="{{ route('home') }}"
                    class="hover:text-red-300 transition {{ request()->routeIs('home') ? 'text-red-300 font-semibold' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('produk.index') }}"
                    class="hover:text-red-300 transition {{ request()->routeIs('produk.index') ? 'text-red-300 font-semibold' : '' }}">
                    Produk
                </a>

                <a href="{{ route('blog.index') }}"
                    class="hover:text-red-300 transition {{ request()->routeIs('blog.index') ? 'text-red-300 font-semibold' : '' }}">
                    Blog
                </a>

                <a href="{{ route('kontak.index') }}"
                    class="hover:text-red-300 transition {{ request()->routeIs('kontak.index') ? 'text-red-300 font-semibold' : '' }}">
                    Kontak
                </a>
            </div>

            <!-- MOBILE BUTTON -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-black focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" x-transition
        class="md:hidden px-4 pb-4 pt-3 space-y-3 bg-black/50 backdrop-blur-xl text-white font-medium">
        <a href="{{ route('home') }}" class="block py-1 hover:text-blue-300">Beranda</a>
        <a href="{{ route('produk.index') }}" class="block py-1 hover:text-blue-300">Produk</a>
        <a href="{{ route('blog.index') }}" class="block py-1 hover:text-blue-300">Blog</a>
        <a href="{{ route('kontak.index') }}" class="block py-1 hover:text-blue-300">Kontak</a>
    </div>
</nav>
