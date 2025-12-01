<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // Ditambahkan parameter Request
    {
        $query = Blog::latest();

        // START: Logika Pencarian
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            
            // Filter berdasarkan judul ATAU konten (case insensitive)
            $query->where(function($q) use ($searchTerm) {
                $q->where('judul', 'like', '%' . $searchTerm . '%')
                  ->orWhere('konten', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil data blog, urutkan dari yang terbaru, dan gunakan pagination
        // withQueryString() memastikan parameter 'search' dibawa ke link pagination
        $blogs = $query->paginate(10)->withQueryString();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Cari blog berdasarkan slug. Jika tidak ketemu, akan otomatis 404
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Kirim data ke view 'blog.show'
        return view('blog.show', compact('blog'));
    }
}