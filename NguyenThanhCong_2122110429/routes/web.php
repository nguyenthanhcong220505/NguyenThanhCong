<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController;

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductController;

Route::get('/', [HomeController::class, 'index']); //Trang chủ
Route::get('san-pham', [ProductController::class, 'index']); //Tất cả sản phẩm
Route::get('chi-tiet-san-pham/{slug}', [ProductController::class, 'product_detail']); //chi tiết sản phẩm
Route::get('lien-he', [ContactController::class, 'index']); //liên hệ

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']); //bang dieu khien -- home adim

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']); // danh sach danh muc
        Route::get('edit/{id}', [CategoryController::class, 'edit']); //edit danh muc
        Route::get('delete/{id}', [CategoryController::class, 'delete']); //edit danh muc
    });


    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index']); // danh sach hieu, them
        Route::get('edit/{id}', [BrandController::class, 'edit']); //edit thuong hieu
        Route::get('delete/{id}', [BrandController::class, 'delete']); //edit thuong hieu
    });


    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']); // danh sach hieu, them
        Route::get('insert', [ProductController::class, 'insert']); // danh sach hieu, them
        Route::get('edit/{id}', [ProductController::class, 'edit']); //edit thuong hieu
        Route::get('delete/{id}', [ProductController::class, 'delete']); //edit thuong hieu
    });
});
