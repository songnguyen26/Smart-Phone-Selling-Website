<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//user Controller path
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;

//admin Controller path
use App\Http\Controllers\backend\DashboardController;

//user route
Route::get('/',[HomeController::class,"index"])->name("site.home");
Route::get('san-pham',[ProductController::class,"index"])->name("site.product");
Route::get('chi-tiet-san-pham/{slug}',[ProductController::class,"productDetail"])->name("site.product.detail");
Route::get('lien-he',[ContactController::class,"index"])->name("site.contact");
//admin route
route::prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, "index"])->name('admin.dashboard');

    route::prefix('product')->group(function(){

        Route::get('/', [App\Http\Controllers\frontend\ProductController::class, "index"])->name('admin.product.index' );
        Route::get('create', [ProductController::class, "create"])->name('admin.product.create' );
        Route::get('{id}/edit', [ProductController::class, "edit"])->name('admin.product.edit' );
        Route::get('delete/{id}', [ProductController::class, "delete"])->name('admin.product.delete' );
    });
    route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, "index"])->name('admin.category.index' );
        Route::get('create', [CategoryController::class, "create"])->name('admin.category.create' );
        Route::get('{id}/edit', [CategoryController::class, "edit"])->name('admin.category.edit' );
        Route::get('delete/{id}', [CategoryController::class, "delete"])->name('admin.category.delete' );
    });
    route::prefix('brand')->group(function(){
        Route::get('/', [BrandController::class, "index"])->name('admin.brand.index' );
        Route::get('create', [BrandController::class, "create"])->name('admin.brand.create' );
        Route::get('{id}/edit', [BrandController::class, "edit"])->name('admin.brand.edit' );
        Route::get('delete/{id}', [BrandController::class, "delete"])->name('admin.brand.delete' );
    });
});