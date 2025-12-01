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
        $waLink = '#';

        // Cek ketersediaan kontak dan nomornya
        if ($kontak && !empty($kontak->no_kontak)) {
            // 2. Logika Pembersihan dan Format Nomor WhatsApp
            $waNumber = $kontak->no_kontak;

            // Bersihkan nomor dari karakter non-digit
            $cleanWaNumber = preg_replace('/[^0-9]/', '', $waNumber);

            $formattedWaNumber = $cleanWaNumber;

            // Cek dan ganti '0' di awal dengan '62'
            if (substr($cleanWaNumber, 0, 1) === '0') {
                $formattedWaNumber = '62' . substr($cleanWaNumber, 1);
            }

            // 3. Buat Link WhatsApp
            $waLink = "https://wa.me/{$formattedWaNumber}";
        } else {
            $kontak = (object)[
                'no_kontak' => '-',
                'email_kontak' => '-',
                'alamat' => 'Alamat tidak tersedia.',
            ];
        }

        return view('kontak.index', compact('kontak', 'waLink'));
    }
}
