<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman kontak untuk user (pelanggan).
     */
    public function index()
    {
        // 1. Ambil data kontak dengan tipe 'Customer Service'
        $kontak = DB::table('kontak')->where('tipe', 'cs')->first();

        // Cek ketersediaan kontak dan nomornya
        if (!$kontak || empty($kontak->no_kontak)) {
            return Redirect::back()->with('error', 'Layanan Customer Service sedang tidak tersedia. Mohon coba beberapa saat lagi atau hubungi melalui email.');
        }

        // 2. Logika Pembersihan dan Format Nomor WhatsApp
        $waNumber = $kontak->no_kontak;
        $cleanWaNumber = preg_replace('/[^0-9]/', '', $waNumber);

        $formattedWaNumber = $cleanWaNumber;

        // Cek dan ganti '0' di awal dengan '62'
        if (substr($cleanWaNumber, 0, 1) === '0') {
            $formattedWaNumber = '62' . substr($cleanWaNumber, 1);
        }

        // 3. Buat Link WhatsApp
        $waLink = "https://wa.me/{$formattedWaNumber}";

        // Kirim $kontak dan $waLink ke view
        return view('kontak.index', compact('kontak', 'waLink'));
    }
}
