<nav class="flex flex-col w-20 h-full text-gray-200 transition-all duration-300 bg-gray-900 md:w-64 shrink-0">

    {{-- Logo Section --}}
    <div class="flex items-center justify-center h-16 px-6 bg-gray-900 border-b border-gray-800 md:justify-start">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 group">
            {{-- Icon Logo (Visible on Mobile & Desktop) --}}
            <div class="p-2 bg-blue-600 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>

            {{-- Text Logo (Hidden on Mobile) --}}
            <span class="hidden text-xl font-bold text-white md:block">
                Admin Panel
            </span>
        </a>
    </div>

    {{-- Menu Items --}}
    <div class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">

        {{-- Section: General --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">General</p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center justify-center px-3 py-3 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">

                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="hidden md:inline">Dashboard</span>
            </a>
        </div>

        {{-- Section: Management --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">Management</p>

            {{-- Produk --}}
            <a href="{{ route('admin.produk.index') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.produk.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="hidden md:inline">Produk</span>
            </a>

            {{-- Order --}}
            <a href="{{ route('admin.order.index') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.order.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="hidden md:inline">Order</span>
            </a>

            {{-- Blog --}}
            <a href="{{ route('admin.blog.index') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.blog.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="hidden md:inline">Blog</span>
            </a>

            {{-- Testimoni --}}
            <a href="{{ route('admin.testimoni.index') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.testimoni.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
                <span class="hidden md:inline">Testimoni</span>
            </a>

            {{-- Kontak --}}
            <a href="{{ route('admin.kontak.index') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('admin.kontak.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="hidden md:inline">Kontak</span>
            </a>
        </div>

        {{-- Section: User --}}
        <div>
            <p class="hidden mb-3 text-xs font-semibold text-gray-500 uppercase md:block">Account</p>

            <a href="{{ route('profile.edit') }}"
               class="flex items-center justify-center px-3 py-3 mb-2 text-sm font-medium transition-colors rounded-md md:justify-start group
               {{ request()->routeIs('profile.edit') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="hidden md:inline">Profile</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center justify-center w-full px-3 py-3 text-sm font-medium text-red-400 transition-colors rounded-md md:justify-start hover:bg-red-500 hover:text-white group">
                    <svg class="w-6 h-6 transition-colors md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                    <span class="hidden md:inline">Logout</span>
                </button>
            </form>
        </div>

    </div>
</nav>
