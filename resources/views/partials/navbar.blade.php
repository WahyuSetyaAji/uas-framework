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

                <a href="{{ route('produk.index') }}" class="hover:text-gray-200 {{ request()->routeIs('produk.*') ? 'font-semibold text-white' : '' }}">
                    Produk
                </a>

                <a href="{{ route('blog.index') }}" class="hover:text-gray-200 {{ request()->routeIs('blog.*') ? 'font-semibold text-white' : '' }}">
                    Blog
                </a>

                <a href="{{ route('kontak.index') }}" class="hover:text-gray-200 {{ request()->routeIs('kontak.*') ? 'font-semibold text-white' : '' }}">
                    Kontak
                </a>

                {{-- Jika BELUM login → tampil Login --}}
                @guest
                    <a href="{{ route('login') }}" class="hover:text-gray-200">
                        Login
                    </a>
                @endguest

                {{-- Jika SUDAH login → ganti jadi Dashboard + Logout --}}
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-200">
                        Dashboard
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="hover:text-red-300">
                            Logout
                        </button>
                    </form>
                @endauth

            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
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

        @guest
            <a href="{{ route('login') }}" class="block py-2 hover:text-gray-200">Login</a>
        @endguest

        @auth
            <a href="{{ route('admin.dashboard') }}" class="block py-2 hover:text-gray-200">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-left w-full py-2 hover:text-red-300">
                    Logout
                </button>
            </form>
        @endauth

    </div>
</nav>
