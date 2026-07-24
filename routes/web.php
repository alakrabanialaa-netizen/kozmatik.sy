<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ConsultationController;
// إدارة الاستشارات الطبية في لوحة التحكم
Route::resource('consultations', ConsultationController::class)->only(['index', 'show', 'destroy']);
Route::post('/consultation/send', [ConsultationController::class, 'store'])->name('consultation.send');

// --- صفحات الواجهة الأمامية للمتجر ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/catalog', [ShopController::class, 'catalog'])->name('catalog');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// السلة والشراء
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');

// --- لوحة التحكم (Admin Panel) ---
Route::prefix('admin')->name('admin.')->group(function () {
    // الرئيسية والمحاسبة والمستودع
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // إدارة المنتجات
    Route::resource('products', ProductController::class);

    // إدارة الأقسام
    Route::resource('categories', CategoryController::class);

    // إدارة الطلبات
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'update', 'destroy']);
});