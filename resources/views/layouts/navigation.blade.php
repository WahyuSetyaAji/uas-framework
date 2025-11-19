<nav x-data="{ open: false }" class="fixed top-0 z-50 w-full text-white shadow bg-blue-900">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-white hover:text-gray-200 transition">
                    Bowo Jok
                </a>
            </div>

            <div class="items-center hidden space-x-8 md:flex">
                <a href="{{ route('home') }}" class="hover:text-gray-200 transition {{ request()->routeIs('home') ? 'font-bold text-white border-b-2 border-white pb-1' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('produk.index') }}" class="hover:text-gray-200 transition {{ request()->routeIs('produk.*') ? 'font-bold text-white border-b-2 border-white pb-1' : '' }}">
                    Produk
                </a>
                <a href="{{ route('blog.index') }}" class="hover:text-gray-200 transition {{ request()->routeIs('blog.*') ? 'font-bold text-white border-b-2 border-white pb-1' : '' }}">
                    Blog
                </a>
                <a href="{{ route('kontak.index') }}" class="hover:text-gray-200 transition {{ request()->routeIs('kontak.index') ? 'font-bold text-white border-b-2 border-white pb-1' : '' }}">
                    Kontak
                </a>

                @auth
                    <a href="{{ url('/admin/dashboard') }}" class="px-4 py-2 font-semibold text-blue-900 bg-white rounded hover:bg-gray-100 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-200 transition">
                        Login
                    </a>
                @endauth
            </div>

            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none hover:text-gray-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" style="display: none;" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" style="display: none;" class="px-4 pb-4 space-y-2 bg-blue-800 md:hidden transition-all duration-300">
        <a href="{{ route('home') }}" class="block py-2 hover:text-gray-200 {{ request()->routeIs('home') ? 'font-bold' : '' }}">Beranda</a>
        <a href="{{ route('produk.index') }}" class="block py-2 hover:text-gray-200 {{ request()->routeIs('produk.*') ? 'font-bold' : '' }}">Produk</a>
        <a href="{{ route('blog.index') }}" class="block py-2 hover:text-gray-200 {{ request()->routeIs('blog.*') ? 'font-bold' : '' }}">Blog</a>
        <a href="{{ route('kontak.index') }}" class="block py-2 hover:text-gray-200 {{ request()->routeIs('kontak.index') ? 'font-bold' : '' }}">Kontak</a>

        @auth
            <a href="{{ url('/admin/dashboard') }}" class="block py-2 font-bold text-yellow-400 hover:text-yellow-300">Dashboard Admin</a>
        @else
            <a href="{{ route('login') }}" class="block py-2 font-semibold hover:text-gray-200">Login</a>
        @endauth
    </div>
</nav>
