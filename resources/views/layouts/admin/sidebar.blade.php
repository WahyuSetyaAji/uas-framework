<div class="w-20 text-gray-200 transition-all duration-300 bg-gray-900 md:w-64" x-data="{ openSidebar: true }">
    {{-- Logo --}}
    <div class="flex items-center px-6 py-6 border-b border-gray-800">
        {{-- Tombol hamburger untuk mobile --}}
        <svg class="w-6 h-6 text-gray-200 cursor-pointer md:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            @click="openSidebar = !openSidebar">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        {{-- Text hanya muncul di desktop --}}
        <h2 class="hidden ml-3 text-xl font-semibold leading-tight text-gray-200 cursor-pointer md:block"
            @click="openSidebar = !openSidebar" x-show="openSidebar">
            Admin Panel
        </h2>

        {{-- Icon kecil saat sidebar collapse --}}
        <svg class="hidden w-6 h-6 ml-3 text-gray-200 cursor-pointer md:block" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" x-show="!openSidebar" @click="openSidebar = !openSidebar">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8M4 18h16" />
        </svg>
    </div>

    {{-- Menu Sections --}}
    <div class="px-4 py-6 space-y-6">

        {{-- Section: 1 (General) --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">General</p>

            {{-- Link ke Home (Website Utama) --}}
            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center justify-center px-3 py-3 text-sm rounded-md md:justify-start hover:bg-gray-800">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
                </svg>
                <span class="hidden md:inline">Home</span>
            </a>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="hidden md:inline">Dashboard</span>
            </a>
        </div>

        {{-- Section: Superadmin Area (KHUSUS SUPERADMIN) --}}
        @if(Auth::user()->role === 'superadmin')
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-red-400 uppercase md:block">Superadmin</p>

            {{-- Kelola User --}}
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800 text-red-100
                {{ request()->routeIs(['admin.users.*']) ? 'bg-gray-800' : '' }}">
                <!-- Icon User Group -->
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="hidden md:inline">Kelola User</span>
            </a>
        </div>
        @endif

        {{-- Section: 2 (Menu) --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">Menu</p>

            {{-- Produk --}}
            <a href="{{ route('admin.produk.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800
                {{ request()->routeIs(['admin.produk.*']) ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V7a2 2 0 00-2-2h-3l-2-2H7l-2 2H2v6h18z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6" />
                </svg>
                <span class="hidden md:inline">Produk</span>
            </a>

            {{-- Order --}}
            <a href="{{ route('admin.order.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800
                {{ request()->routeIs(['admin.order.*']) ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 9H4L3 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 21h14a2 2 0 002-2v-4H3v4a2 2 0 002 2z" />
                </svg>
                <span class="hidden md:inline">Order</span>
            </a>

            {{-- Blog --}}
            <a href="{{ route('admin.blog.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800
                {{ request()->routeIs(['admin.blog.*']) ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4h9M12 12h9M3 6h.01M3 12h.01M3 18h.01" />
                </svg>
                <span class="hidden md:inline">Blog</span>
            </a>

            {{-- Testimoni --}}
            <a href="{{ route('admin.testimoni.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800
                {{ request()->routeIs(['admin.testimoni.*']) ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8
                        4.03-8 9-8 9 3.582 9 8z" />
                </svg>
                <span class="hidden md:inline">Testimoni</span>
            </a>
        </div>

        {{-- Section: 3 (About/Profile) --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">About</p>

            {{-- Kontak --}}
            <a href="{{ route('admin.kontak.index') }}"
                class="flex items-center justify-center md:justify-start px-3 py-3 rounded-md text-sm hover:bg-gray-800
                {{ request()->routeIs(['admin.kontak.*']) ? 'bg-gray-800' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14l-7-4-7 4V5z" />
                </svg>
                <span class="hidden md:inline">Kontak</span>
            </a>

            {{-- Profile --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center justify-center px-3 py-3 text-sm rounded-md md:justify-start hover:bg-gray-800">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="  round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4
                        1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8
                        1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
                <span class="hidden md:inline">Profile</span>
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center w-full px-3 py-3 text-sm text-left rounded-md md:justify-start hover:bg-gray-800">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0
                            01-2 2H5a2 2 0 01-2-2V7a2 2 0
                            012-2h6a2 2 0 012 2v1" />
                    </svg>
                    <span class="hidden md:inline">Logout</span>
                </button>
            </form>
        </div>

    </div>
</div>
