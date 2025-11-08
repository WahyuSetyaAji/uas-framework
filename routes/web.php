<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controller untuk User (tamu/pelanggan)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BlogController;

// Controller untuk Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminTestimoniController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminBlogController;

// =============================
// ROUTE UNTUK USER / PELANGGAN
// =============================

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Produk (menampilkan semua produk dari database)
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// Detail Produk
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// Halaman Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// Halaman Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


// =============================
// ROUTE AUTH DAN PROFILE USER
// =============================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =============================
// ROUTE UNTUK ADMIN
// =============================

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Produk (lengkap: index, create, store, edit, update, destroy)
    Route::resource('produk', AdminProdukController::class);

    // CRUD Testimoni
    Route::resource('testimoni', AdminTestimoniController::class);

    // Manajemen Order
    Route::get('order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}', [AdminOrderController::class, 'show'])->name('order.show');
    Route::put('order/{id}', [AdminOrderController::class, 'update'])->name('order.update');

    // Kelola Kontak (edit & update info kontak)
    Route::get('kontak', [AdminKontakController::class, 'edit'])->name('kontak.edit');
    Route::put('kontak', [AdminKontakController::class, 'update'])->name('kontak.update');

    // CRUD Blog
    Route::resource('blog', AdminBlogController::class);
});

// Route auth bawaan Laravel Breeze / Jetstream
require __DIR__.'/auth.php';
