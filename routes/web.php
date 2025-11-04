<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminTestimoniController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminBlogController;

// Route::get('/', function () {
//     return view('welcome');
// });

// ROUTE USER (PELANGGAN/TAMU)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE ADMIN
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('produk', AdminProdukController::class);

    Route::resource('testimoni', AdminTestimoniController::class);

    Route::get('order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}', [AdminOrderController::class, 'show'])->name('order.show');
    Route::put('order/{id}', [AdminOrderController::class, 'update'])->name('order.update');

    Route::get('kontak', [AdminKontakController::class, 'edit'])->name('kontak.edit');
    Route::put('kontak', [AdminKontakController::class, 'update'])->name('kontak.update');

    Route::resource('blog', AdminBlogController::class);

});

require __DIR__.'/auth.php';
