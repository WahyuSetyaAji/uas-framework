@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Manajemen Blog</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">+ Tambah Postingan Baru</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="30">No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Slug</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + $blogs->firstItem() }}</td>
                            <td>{{ $blog->judul }}</td>
                            <td>
                                @if ($blog->gambar)
                                    <img src="{{ asset('storage/'.$blog->gambar) }}" width="100" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $blog->slug }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus postingan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada postingan blog</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
