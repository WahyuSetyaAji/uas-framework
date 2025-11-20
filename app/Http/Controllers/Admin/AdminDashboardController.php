<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\Blog;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hitung total data
        $totalProduk = Produk::count();
        $totalTestimoni = Testimoni::count();
        $totalBlog = Blog::count();
        $totalUser = User::count();

        // Ambil data terbaru (5 item terakhir)
        $testimoniTerbaru = Testimoni::with('produk')
            ->latest('tanggal_testimoni')
            ->take(5)
            ->get();

        $blogTerbaru = Blog::latest('created_at')
            ->take(5)
            ->get();

        // Produk Populer berdasarkan jumlah testimoni terbanyak
        $produkPopuler = Produk::withCount('testimoni') // hitung jumlah testimoni
            ->orderByDesc('testimoni_count') // urut dari terbanyak
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalTestimoni',
            'totalBlog',
            'testimoniTerbaru',
            'blogTerbaru',
            'totalUser',
            'produkPopuler'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
