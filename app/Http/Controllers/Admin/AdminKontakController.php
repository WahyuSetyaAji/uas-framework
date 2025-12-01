<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\Support\Facades\DB;

class AdminKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::orderBy('id', 'asc')->paginate(5);
        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $validasi_data = $request->validate([
            'nama' => 'required|string|max:100',
            'email_kontak' => 'required|email|max:100',
            'alamat' => 'required|string',
            'no_kontak' => 'required|string|max:20',
            'tipe' => 'required|in:cs,order',
        ]);

        // Simpan data ke database
        Kontak::create($validasi_data);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil ditambahkan!');
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
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email_kontak' => 'required|email|max:100',
            'alamat' => 'required|string',
            'no_kontak' => 'required|string|max:20',
            'tipe' => 'required|in:cs,order',
        ]);

        $kontak = Kontak::findOrFail($id);

        $data = $request->only(['nama', 'email_kontak', 'alamat', 'no_kontak', 'tipe']);
        $kontak->update($data);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('kontak')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil dihapus!');
        } else {
            return redirect()->route('admin.kontak.index')->with('error', 'Kontak tidak ditemukan!');
        }
    }
}
