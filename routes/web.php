<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;

// Trang chủ (công khai)
Route::get('/', function () {
    return view('welcome');
})->name('home');


// Routes chỉ dành cho Admin (phải đăng nhập + có role admin)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Dashboard quản trị
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Quản lý sản phẩm
    Route::resource('admin/products', ProductController::class)->names('admin.products');
});


// Routes dành cho người dùng đã đăng nhập (bất kể role)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
