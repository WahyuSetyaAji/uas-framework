@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Postingan Blog</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $blog->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea name="konten" id="konten" class="form-control" rows="6" required>{{ old('konten', $blog->konten) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    @if ($blog->gambar)
                        <img src="{{ asset('storage/'.$blog->gambar) }}" width="150" class="mb-2 rounded">
                    @else
                        <p class="text-muted">Tidak ada gambar</p>
                    @endif
                    <input type="file" name="gambar" id="gambar" class="form-control mt-2">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
