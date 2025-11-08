<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        
        $produk = Produk::orderBy('tanggal_ditambahkan', 'desc')->take(6)->get();

        return view('welcome', compact('produk'));
    }
}
