<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Pesan Sukses / Error -->
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded-lg" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- HEADER TABEL (Sesuai Request) -->
                    <div class="flex flex-col items-center justify-between px-4 py-3 mb-6 border border-gray-200 rounded-lg shadow-sm md:flex-row bg-gray-50">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-xl font-bold text-gray-800 md:text-2xl">Daftar Pengguna</h2>
                            <p class="text-sm text-gray-500">Kelola akun Admin & Superadmin</p>
                        </div>

                        <a href="{{ route('admin.users.create') }}"
                           class="flex items-center px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Pengguna
                        </a>
                    </div>

                    <!-- Tabel -->
                    <div class="w-full overflow-hidden border border-gray-200 rounded-lg shadow-sm">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                        <th class="px-4 py-3">Nama</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Role</th>
                                        <th class="px-4 py-3">Tanggal Dibuat</th>
                                        <th class="px-4 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($users as $user)
                                    <tr class="text-gray-700 transition-colors hover:bg-gray-50">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar Initials -->
                                                <div class="relative hidden w-8 h-8 mr-3 font-bold leading-8 text-center text-gray-500 bg-gray-200 rounded-full md:block">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $user->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                        <td class="px-4 py-3 text-xs">
                                            @if($user->role === 'superadmin')
                                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 border border-red-200 rounded-full">
                                                    Superadmin
                                                </span>
                                            @else
                                                <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 border border-blue-200 rounded-full">
                                                    Admin
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $user->created_at->format('d M Y') }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex items-center justify-center space-x-2 text-sm">
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                   class="p-2 text-sm font-medium leading-5 text-purple-600 transition-colors rounded-lg hover:bg-purple-100 focus:outline-none focus:shadow-outline-gray"
                                                   aria-label="Edit" title="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                    </svg>
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                @if(auth()->id() !== $user->id)
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="p-2 text-sm font-medium leading-5 text-red-600 transition-colors rounded-lg hover:bg-red-100 focus:outline-none focus:shadow-outline-gray"
                                                            aria-label="Delete" title="Hapus">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                @else
                                                <span class="p-2 text-gray-400 cursor-not-allowed" title="Anda sedang login">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination jika ada (Optional) -->
                        <div class="px-4 py-3 text-xs text-gray-500 border-t border-gray-200 bg-gray-50">
                            Menampilkan {{ $users->count() }} data pengguna.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
