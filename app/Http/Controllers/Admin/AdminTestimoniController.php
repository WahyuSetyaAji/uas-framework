<?php

namespace App\Http\Controllers\Admin; // <- tambahkan .Admin di sini!

use App\Http\Controllers\Controller; // <- tambahkan ini juga
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminTestimoniController extends Controller
{
    /**
     * Tampilkan semua testimoni.
     */
    public function index()
    {
        $data = Testimoni::all();
        return view('admin.testimoni.index', compact('data'));
    }

    /**
     * Tampilkan form untuk tambah testimoni baru.
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Simpan testimoni baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_testimoni' => 'required|max:100',
            'komentar' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create($request->all());

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk testimoni tertentu.
     */
    public function edit(string $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * Update data testimoni di database.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_testimoni' => 'required|max:100',
            'komentar' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Hapus testimoni dari database.
     */
    public function destroy(string $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
