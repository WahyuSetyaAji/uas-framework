<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman kontak untuk user (pelanggan).
     */
    public function index()
    {
        // Ambil data pertama dari tabel kontak
        $kontak = DB::table('kontak')->first();

        // Kirim ke view kontak.index
        return view('kontak.index', compact('kontak'));
    }
}
