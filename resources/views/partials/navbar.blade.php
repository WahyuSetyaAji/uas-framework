<nav class="bg-blue-900 text-white fixed w-full top-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-white">
                    Bowo Jok
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="hover:text-gray-200 {{ request()->routeIs('home') ? 'font-semibold text-white' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('produk.index') }}" class="hover:text-gray-200 {{ request()->routeIs('produk.index') ? 'font-semibold text-white' : '' }}">
                    Produk
                </a>
                <a href="{{ route('blog.index') }}" class="hover:text-gray-200 {{ request()->routeIs('blog.index') ? 'font-semibold text-white' : '' }}">
                    Blog
                </a>
                <a href="{{ route('kontak.index') }}" class="hover:text-gray-200 {{ request()->routeIs('kontak.index') ? 'font-semibold text-white' : '' }}">
                    Kontak
                </a>
                <a href="{{ route('login') }}" class="hover:text-gray-200 font-semibold text-white" >Login</a>
            </div>

            <!-- Mobile Button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-blue-800 px-4 pb-4 space-y-2">
        <a href="{{ route('home') }}" class="block py-2 hover:text-gray-200">Beranda</a>
        <a href="{{ route('produk.index') }}" class="block py-2 hover:text-gray-200">Produk</a>
        <a href="{{ route('blog.index') }}" class="block py-2 hover:text-gray-200">Blog</a>
        <a href="{{ route('kontak.index') }}" class="block py-2 hover:text-gray-200">Kontak</a>
        <a href="{{ route('login') }}" class="block py-2 hover:text-gray-200">Kontak</a>
    </div>
</nav>
