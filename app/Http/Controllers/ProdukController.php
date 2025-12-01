<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        // fitur search berdasarkan nama_produk dan deskripsi
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_produk', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $produk = $query->paginate(9); // 9 produk per halaman
        return view('produk.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // ✅ tampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // ✅ simpan produk baru ke database + upload foto
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // simpan gambar ke folder public/images/produk
        $gambarName = time() . '.' . $request->gambar_produk->extension();
        $request->gambar_produk->move(public_path('images/produk'), $gambarName);

        // simpan ke database
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar_produk' => $gambarName,
            'tanggal_ditambahkan' => now(),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}
