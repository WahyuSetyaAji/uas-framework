@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah Postingan Blog Baru</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea name="konten" id="konten" class="form-control" rows="6" required>{{ old('konten') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
