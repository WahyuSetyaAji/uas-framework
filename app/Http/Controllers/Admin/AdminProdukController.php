<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produk::all();
        return view('admin.produk.index', compact('data')); // , compact('data')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $validasi_data = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,tidak tersedia',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tanggal_ditambahkan' => 'required|date',
        ]);

         // Handle file upload
        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $filename);
            $validasi_data['gambar_produk'] = 'uploads/produk/' . $filename;
        }

        // Proses simpan data ke dalam database
        produk::create($validasi_data);

        return redirect()->route("admin.produk.index")->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Admin: Menampilkan detail produk ID: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view("admin.produk.edit", compact("produk"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:tersedia,tidak tersedia',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tanggal_ditambahkan' => 'required|date',
        ]);

        $produk = Produk::findOrFail($id);

        $data = $request->only(['nama_produk', 'deskripsi', 'harga', 'stock', 'status']);

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $filename);
            $data['gambar_produk'] = 'uploads/produk/' . $filename;
        }

        $produk->update($data);

        return redirect()->route("admin.produk.index")->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('produk')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
        } else {
            return redirect()->route('admin.produk.index')->with('error', 'Produk tidak ditemukan!');
        }
    }
}
