<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Admin: Menampilkan daftar semua produk";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Admin: Menampilkan form tambah produk baru";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Admin: Logika menyimpan produk baru";
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
        return "Admin: Menampilkan form edit produk ID: $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Admin: Logika update produk ID: $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Admin: Logika hapus produk ID: $id";
    }
}
