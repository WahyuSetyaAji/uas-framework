<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminDashboardController;
// Controller untuk User (tamu/pelanggan)
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminTestimoniController;
use App\Http\Controllers\Admin\AdminUserController;
// Controller untuk Admin
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =============================
// ROUTE UNTUK USER / PELANGGAN
// =============================

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// Halaman Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// Halaman Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Halaman Order (user)
Route::get('/order/create/{produk_id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

// =============================
// ROUTE AUTH DAN PROFILE USER
// =============================

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
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Produk
    Route::resource('produk', AdminProdukController::class);

    // CRUD Testimoni
    Route::resource('testimoni', AdminTestimoniController::class);

    // Manajemen Order
    Route::get('order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}', [AdminOrderController::class, 'show'])->name('order.show');
    Route::delete('order/{id}', [AdminOrderController::class, 'destroy'])->name('order.destroy');

    // ➕ Import & Export Excel (TAMBAHAN)
    Route::post('order-export', [AdminOrderController::class, 'export'])->name('order.export');
    Route::post('order-import', [AdminOrderController::class, 'import'])->name('order.import');

    // Kelola Kontak
    Route::resource('kontak', AdminKontakController::class);

    // CRUD Blog
    Route::resource('blog', AdminBlogController::class);

    // Kelola Akun Admin/User
    Route::resource('users', AdminUserController::class);
});

// Auth routes
require __DIR__.'/auth.php';
