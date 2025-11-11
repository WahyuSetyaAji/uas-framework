<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data blog, urutkan dari yang terbaru, dan gunakan pagination
        $blogs = Blog::latest()->paginate(10);

        // Kirim data ke view 'blog.index'
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
