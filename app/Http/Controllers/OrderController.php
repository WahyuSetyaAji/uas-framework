<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Kontak;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($produk_id)
    {
        // Temukan produk yang sedang dipesan (untuk pre-select di dropdown)
        $produk = Produk::findOrFail($produk_id);

        // Ambil semua produk untuk dropdown
        $semuaProduk = Produk::all();

        return view('order.create', compact('produk', 'semuaProduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ===========================================
        // VALIDASI DINAMIS
        // ===========================================
        $request->validate([
            'nama_cus'        => 'required|string|max:255',
            'no_cus'          => 'required|string|max:20',
            'produk_id'       => 'required|exists:produk,id',
            'catatan_custom'  => 'nullable|string',

            // Field penentu: 'tempat' atau 'kirim'
            'booking_method'  => 'required|in:tempat,kirim',

            // required_if: alamat wajib jika booking_method = kirim
            'alamat'          => 'required_if:booking_method,kirim|nullable|string',
        ]);

        // Ambil data produk
        $produk = Produk::findOrFail($request->produk_id);

        // ===========================================
        // SIMPAN DATA KE DATABASE
        // ===========================================
        $order = Order::create([
            'nama_cus'        => $request->nama_cus,
            'no_cus'          => $request->no_cus,
            'produk_id'       => $request->produk_id,
            'catatan_custom'  => $request->catatan_custom,
            'tanggal_order'   => now(),

            // Menyimpan field dinamis
            'booking_method'  => $request->booking_method,
            'alamat'          => $request->alamat,
        ]);

        // ===========================================
        // FORMAT DAN REDIRECT KE WHATSAPP
        // ===========================================
        $pesan = $this->formatWhatsAppMessage($request, $produk);

        // Ambil SEMUA kontak dengan tipe 'order'
        $adminKontakList = Kontak::where('tipe', 'order')->get();

        // Cek apakah daftar Admin ditemukan dan tidak kosong
        if ($adminKontakList->isNotEmpty()) {

            // Random Pick No Admin
            $randomKontak = $adminKontakList->random();

            // Cek apakah nomor kontak Admin yang terpilih ada
            if ($randomKontak && $randomKontak->no_kontak) {

                // Ambil nomor HP dan bersihkan karakter non-numerik
                $raw_number = preg_replace('/[^0-9]/', '', $randomKontak->no_kontak);

                // Logika format +62
                if (substr($raw_number, 0, 1) === '0') {
                    $admin = '62' . substr($raw_number, 1);
                } elseif (substr($raw_number, 0, 2) !== '62') {
                    $admin = '62' . $raw_number;
                } else {
                    $admin = $raw_number;
                }
            } else {
                return redirect()->back()->with('error', 'Nomor kontak Admin Order tidak ditemukan atau tidak valid. Silakan coba lagi nanti.')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Admin Order belum diatur. Silakan hubungi pengelola website.')->withInput();
        }

        return redirect("https://wa.me/$admin?text=$pesan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Helper method untuk memformat pesan WA
     */
    private function formatWhatsAppMessage(Request $request, Produk $produk)
    {
        $pesan =
            "Halo Bowo Jok,%0A" .
            "Saya ingin memesan:%0A%0A" .
            "Model: " . urlencode($produk->nama_produk) . "%0A" .
            "Nama: " . urlencode($request->nama_cus) . "%0A" .
            "No WA: " . urlencode($request->no_cus) . "%0A" .
            "Catatan: " . urlencode($request->catatan_custom ?? '-') . "%0A";

        // Logika metode pemesanan
        if ($request->booking_method === "tempat") {
            $pesan .=
                "Metode Pemesanan: Pasang Di Tempat%0A";
        } else { // Jika nilainya 'kirim' (Online)
            $pesan .=
                "Metode Pemesanan: Via Online%0A" .
                "Alamat Pengiriman: " . urlencode($request->alamat) . "%0A";
        }

        return $pesan;
    }
}
