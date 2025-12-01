<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

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

        return redirect()->route("admin.produk.index")->with('success', 'Produk berhasil dibuat!');
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
        // Validasi data input
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

        // Siapkan data yang akan diupdate
        $data = $request->only(['nama_produk', 'deskripsi', 'harga', 'stock', 'status', 'tanggal_ditambahkan']);

        // --- LOGIKA MENGGANTI DAN MENGHAPUS GAMBAR LAMA ---
        if ($request->hasFile('gambar_produk')) {

            // 1. Simpan path gambar lama untuk dihapus nanti
            $oldImagePath = $produk->gambar_produk;

            // 2. Proses unggah gambar baru
            $file = $request->file('gambar_produk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $filename);

            // 3. Update data dengan path gambar baru
            $data['gambar_produk'] = 'uploads/produk/' . $filename;

            // 4. Hapus gambar lama dari server jika path-nya ada dan file-nya ditemukan
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        }
        // --- AKHIR LOGIKA GAMBAR ---

        // Lakukan proses update database
        $produk->update($data);

        return redirect()->route("admin.produk.index")->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Dapatkan model produk
        $produk = Produk::findOrFail($id); // Ini akan melempar 404 jika tidak ditemukan

        // 2. Hapus file gambar terkait
        if ($produk->gambar_produk) {
            $imagePath = public_path($produk->gambar_produk);

            // Cek keberadaan file sebelum menghapus
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // 3. Hapus data dari database
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
