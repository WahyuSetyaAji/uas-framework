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
        // ==========================================
        // 1. SEED USERS
        // ==========================================

        // A. Superadmin (Untuk fitur Kelola User)
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'superadmin',
            'created_at' => Carbon::now(),
        ]);

        // B. Admin Kece (Sesuai request Anda)
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
        ]);


        // ==========================================
        // 2. SEED PRODUK
        // ==========================================
        $produkId = DB::table('produk')->insertGetId([
            'nama_produk' => 'Jok Motor',
            'deskripsi' => 'Jok style klasik yang membara, bakarr!!.',
            'harga' => 3500000.00,
            'gambar_produk' => 'uploads/gambar/jok_membara.jpg',
            'stock' => 5,
            'status' => 'tersedia',
            'tanggal_ditambahkan' => Carbon::now()->toDateString(),
        ]);

        // ==========================================
        // 3. SEED TESTIMONI
        // ==========================================
        DB::table('testimoni')->insert([
            'nama_testimoni' => 'Siti Rahmawati',
            'produk_id' => $produkId,
            'komentar' => 'Hasil pemasangan sangat rapi dan kualitas joknya bagus.',
            'rating' => 5,
            'tanggal_testimoni' => Carbon::now()->toDateString(),
        ]);

        // ==========================================
        // 4. SEED KONTAK (FIXED)
        // ==========================================
        // Menggunakan nama kolom yang benar sesuai tabel migrasi Anda
        DB::table('kontak')->insert([
            'nama' => 'Admin1',
            'email_kontak' => 'bowojok@example.com',
            'alamat' => 'Jl. Example',
            'no_kontak' => '081234567890',
            'tipe' => 'cs',
        ]);

        // ==========================================
        // 5. SEED ORDER
        // ==========================================
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

        // ==========================================
        // 6. SEED BLOG
        // ==========================================
        DB::table('blogs')->insert([
            [
                'judul' => 'Tips Merawat Jok Motor Kulit Asli',
                'slug' => 'tips-merawat-jok-motor-kulit-asli',
                'konten' => '<p>Perawatan jok kulit asli berbeda dengan jok sintetis. Pastikan Anda membersihkannya dengan cairan khusus kulit, dan hindari paparan sinar matahari langsung terlalu lama.</p><h2>Langkah-langkah Perawatan Dasar:</h2><ol><li>Bersihkan debu dan kotoran.</li><li>Gunakan kondisioner kulit setiap bulan.</li><li>Jauhkan dari benda tajam.</li></ol>',
                'gambar' => 'blog/jok_perawatan.jpg',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'judul' => 'Perbedaan Jok Custom dan Jok Pabrikan',
                'slug' => 'perbedaan-jok-custom-dan-jok-pabrikan',
                'konten' => '<p>Jok custom menawarkan kenyamanan dan estetika yang sesuai dengan preferensi pribadi Anda. Sementara jok pabrikan didesain untuk kenyamanan rata-rata pengguna.</p><p><strong>Keunggulan Custom:</strong> desain unik, bahan premium, dan ergonomi yang disesuaikan.</p>',
                'gambar' => 'blog/jok_custom_vs_pabrik.jpg',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
        ]);
    }
}
