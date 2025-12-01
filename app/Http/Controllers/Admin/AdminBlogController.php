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
     * Metode pembantu untuk menghasilkan slug yang unik.
     */
    private function generateUniqueSlug(string $title, int $ignoreId = null): string
    {
        $slug = Str::slug($title, '-');
        $originalSlug = $slug;
        $count = 1;

        // Buat query dasar untuk memeriksa slug yang ada
        $query = Blog::where('slug', $slug);

        // Kecualikan ID saat melakukan update
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        // Loop hingga slug unik ditemukan
        while ($query->exists()) {
            $slug = $originalSlug . '-' . $count;

            // Perbarui query untuk memeriksa slug baru
            $query = Blog::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            $count++;
        }

        return $slug;
    }

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
            'judul' => 'required|string|max:255|unique:blogs,judul', // Menambahkan unique:blogs,judul (Opsional)
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gunakan metode pembantu untuk menghasilkan slug unik
        $slug = $this->generateUniqueSlug($request->judul);

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
            'judul' => 'required|string|max:255|unique:blogs,judul,' . $id, // Menambahkan unique:blogs,judul (Opsional)
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gunakan metode pembantu, dengan mengecualikan ID blog saat ini
        $slug = $this->generateUniqueSlug($request->judul, $blog->id);

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
