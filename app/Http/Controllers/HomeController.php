<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Testimoni; // tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        // ambil 6 produk terbaru
        $produk = Produk::orderBy('tanggal_ditambahkan', 'desc')->take(6)->get();

        // ambil semua testimoni, urutkan dari yang terbaru
        $testimoni = Testimoni::latest('tanggal_testimoni')->get();

        // kirim variabel produk & testimoni ke view welcome.blade.php
        return view('welcome', compact('produk', 'testimoni'));
    }
}
