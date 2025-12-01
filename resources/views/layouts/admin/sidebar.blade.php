<div class="relative flex flex-col h-full text-gray-200 bg-gray-900">
    {{-- Header Sidebar --}}
    <div class="flex items-center justify-between px-4 py-4 border-b border-gray-800 lg:px-6">
        {{-- Logo/Title - Hidden on mobile when sidebar closed --}}
        <h2 class="text-xl font-semibold leading-tight text-gray-200 transition-opacity duration-300"
            :class="{ 'opacity-0 lg:opacity-100': !openSidebar, 'opacity-100': openSidebar }"
            x-show="openSidebar || window.innerWidth >= 1024">
            Admin Panel
        </h2>

        {{-- Toggle Button --}}
        <button @click="openSidebar = !openSidebar"
            class="p-2 text-gray-200 transition-colors rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700"    aria-label="Toggle Sidebar">
            {{-- Hamburger Icon (shown when sidebar is open) --}}
            <svg x-show="openSidebar" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            {{-- Menu Icon (shown when sidebar is closed) --}}
            <svg x-show="!openSidebar" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Menu Sections --}}
    <div class="flex-1 px-3 py-6 space-y-6 overflow-y-auto lg:px-4">

        {{-- Section: General --}}
        <div>
            <p class="px-3 mb-3 text-xs font-semibold text-gray-500 uppercase transition-opacity duration-300"
                :class="{ 'opacity-0 lg:opacity-100': !openSidebar, 'opacity-100': openSidebar }"
                x-show="openSidebar || window.innerWidth >= 1024">
                General
            </p>

            {{-- Link ke Home --}}
            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Home
                </span>
            </a>

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Dashboard
                </span>
            </a>
        </div>

        {{-- Section: Superadmin Area --}}
        @if (Auth::user()->role === 'superadmin')
            <div>
                <p class="px-3 mb-3 text-xs font-semibold text-red-400 uppercase transition-opacity duration-300"
                    :class="{ 'opacity-0 lg:opacity-100': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Superadmin
                </p>

                {{-- Kelola User --}}
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg text-red-100 group hover:bg-gray-800
                {{ request()->routeIs(['admin.users.*']) ? 'bg-gray-800 text-red-300' : '' }}"
                    :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                    <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-red-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                        :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                        x-show="openSidebar || window.innerWidth >= 1024">
                        Kelola User
                    </span>
                </a>
            </div>
        @endif

        {{-- Section: Menu --}}
        <div>
            <p class="px-3 mb-3 text-xs font-semibold text-gray-500 uppercase transition-opacity duration-300"
                :class="{ 'opacity-0 lg:opacity-100': !openSidebar, 'opacity-100': openSidebar }"
                x-show="openSidebar || window.innerWidth >= 1024">
                Menu
            </p>

            {{-- Produk --}}
            <a href="{{ route('admin.produk.index') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs(['admin.produk.*']) ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Produk
                </span>
            </a>

            {{-- Order --}}
            <a href="{{ route('admin.order.index') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs(['admin.order.*']) ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Order
                </span>
            </a>

            {{-- Blog --}}
            <a href="{{ route('admin.blog.index') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs(['admin.blog.*']) ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Blog
                </span>
            </a>

            {{-- Testimoni --}}
            <a href="{{ route('admin.testimoni.index') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs(['admin.testimoni.*']) ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Testimoni
                </span>
            </a>
        </div>

        {{-- Section: About --}}
        <div>
            <p class="px-3 mb-3 text-xs font-semibold text-gray-500 uppercase transition-opacity duration-300"
                :class="{ 'opacity-0 lg:opacity-100': !openSidebar, 'opacity-100': openSidebar }"
                x-show="openSidebar || window.innerWidth >= 1024">
                About
            </p>

            {{-- Kontak --}}
            <a href="{{ route('admin.kontak.index') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800
                {{ request()->routeIs(['admin.kontak.*']) ? 'bg-gray-800 text-blue-400' : '' }}"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Kontak
                </span>
            </a>

            {{-- Profile --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center px-3 py-3 mb-2 text-sm transition-all duration-200 rounded-lg group hover:bg-gray-800"
                :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-blue-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                    :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                    x-show="openSidebar || window.innerWidth >= 1024">
                    Profile
                </span>
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center w-full px-3 py-3 text-sm text-left transition-all duration-200 rounded-lg group hover:bg-gray-800 hover:text-red-400"
                    :class="{ 'justify-center lg:justify-start': !openSidebar, 'justify-start': openSidebar }">
                    <svg class="flex-shrink-0 w-6 h-6 transition-colors group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="ml-3 transition-opacity duration-300 whitespace-nowrap"
                        :class="{ 'opacity-0 lg:opacity-100 lg:inline': !openSidebar, 'opacity-100': openSidebar }"
                        x-show="openSidebar || window.innerWidth >= 1024">
                        Logout
                    </span>
                </button>
            </form>
        </div>

    </div>
</div>
