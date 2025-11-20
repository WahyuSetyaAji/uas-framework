<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::latest();

        // 🔍 Pencarian judul / konten
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul', 'like', '%'.$searchTerm.'%')
                    ->orWhere('konten', 'like', '%'.$searchTerm.'%');
            });
        }

        // Pagination + search persist
        $blogs = $query->paginate(10)->withQueryString();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Ambil artikel berdasarkan slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // -------------------------------
        // 🔥 NEXT & PREVIOUS POST
        // -------------------------------
        $prev = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        // -------------------------------
        // 🔥 RELATED POSTS (3 artikel lain)
        // -------------------------------
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs', 'prev', 'next'));
    }
}
