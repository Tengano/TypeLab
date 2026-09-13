<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\TrackingController;

use App\Http\Controllers\ProductController as PublicProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;

// Trang chủ (công khai)
Route::get('/', [PublicProductController::class, 'home'])->name('home');

// Danh sách & Chi tiết sản phẩm
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [PublicProductController::class, 'show'])->name('products.show');

// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Tra cứu đơn hàng / Ticket sửa chữa (không cần đăng nhập)
Route::prefix('tracking')->name('tracking.')->group(function () {
    Route::get('/', [TrackingController::class, 'index'])->name('index');
    Route::get('/search', [TrackingController::class, 'search'])->name('search');
});


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
    
    // Yêu thích (Wishlist)
    Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists.index');
    Route::post('/wishlists/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlists.toggle');
    
    // Thanh toán
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});

require __DIR__.'/auth.php';
