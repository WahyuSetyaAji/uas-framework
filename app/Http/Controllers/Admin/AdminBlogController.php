<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Tampilkan daftar semua postingan blog.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Tampilkan form tambah postingan blog baru.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Simpan postingan blog baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = Str::slug($request->judul, '-');
        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('blog', 'public');
        }

        Blog::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Postingan blog berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit postingan.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update postingan blog.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = Str::slug($request->judul, '-');

        if ($request->hasFile('gambar')) {
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $blog->gambar = $request->file('gambar')->store('blog', 'public');
        }

        $blog->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'gambar' => $blog->gambar,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Hapus postingan blog.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Postingan berhasil dihapus!');
    }
}
