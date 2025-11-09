<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // User
        User::create([
            'name' => 'Admin Kece',
            'email' => 'adminkece@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
        ]);

        // Produk
        $produkId = DB::table('produk')->insertGetId([
            'nama_produk' => 'Jok Motor',
            'deskripsi' => 'Jok style klasik yang membara, bakarr!!.',
            'harga' => 3500000.00,
            'gambar_produk' => 'uploads/gambar/jok_membara.jpg',
            'stock' => 5,
            'status' => 'tersedia',
            'tanggal_ditambahkan' => Carbon::now()->toDateString(),
        ]);

        // Testimoni
        DB::table('testimoni')->insert([
        'nama_testimoni' => 'Siti Rahmawati',
        'produk_id' => $produkId, // pastikan $produkId didefinisikan di atas, misalnya hasil insert produk
        'komentar' => 'Hasil pemasangan sangat rapi dan kualitas joknya bagus.',
        'rating' => 5, // 🔹 kolom baru menggantikan gambar_testimoni
        'tanggal_testimoni' => Carbon::now()->toDateString(),
        ]);

        // Kontak
        DB::table('kontak')->insert([
            'email_kontak' => 'bowojokexample.com',
            'alamat' => 'Jl. example',
            'no_kontak' => '081234567890',
        ]);

        // Order
        DB::table('order')->insert([
            'nama_cus' => 'Budi Santoso',
            'no_cus' => '085678123456',
            'produk_id' => $produkId,
            'jenis_order' => 'paten',
            'catatan_custom' => null,
            'tanggal_order' => Carbon::now()->toDateString(),
            'tanggal_booking' => Carbon::now()->addDays(5)->toDateString(),
            'jam_booking' => '09:30:00',
        ]);
    }
}
