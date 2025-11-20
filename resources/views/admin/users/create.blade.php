<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                                   placeholder="Contoh: Budi Santoso">
                            @error('name') <span class="block mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                                   placeholder="email@example.com">
                            @error('email') <span class="block mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Role (Peran)</label>
                            <select name="role" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                            </select>
                            @error('role') <span class="block mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                            @error('password') <span class="block mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Simpan Pengguna
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
