<?php

use Illuminate\Support\Facades\Route;

//user Controller path
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanPhamController;
use App\Http\Controllers\frontend\ContactController as LienHeController;

//admin Controller path
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;

//user route
Route::get('/',[HomeController::class,"index"])->name("site.home");
Route::get('san-pham',[SanPhamController::class,"index"])->name("site.product");
Route::get('chi-tiet-san-pham/{slug}',[ProductController::class,"productDetail"])->name("site.product.detail");
Route::get('lien-he',[LienHeController::class,"index"])->name("site.contact");
//admin route
route::prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, "index"])->name('admin.dashboard');
    //1. Banner
    route::prefix('banner')->group(function(){
        Route::get('/', [BannerController::class, "index"])->name('admin.banner.index' );//danh sach
        Route::get('trash', [BannerController::class, "trash"])->name('admin.banner.trash' );//thung rac
        Route::get('show', [BannerController::class, "show"])->name('admin.banner.show' );//chi tiet

        Route::post('store', [BannerController::class, "store"])->name('admin.banner.store' );//xu ly them
        Route::get('edit/{id}', [BannerController::class, "edit"])->name('admin.banner.edit' );//form cap nhat
        Route::put('update/{id}', [BannerController::class, "update"])->name('admin.banner.update' );//xu ly cap nhat

        Route::get('status/{id}', [BannerController::class, "status"])->name('admin.banner.status' );//cap nhat trang thai
        Route::get('delete/{id}', [BannerController::class, "delete"])->name('admin.banner.delete' );
        Route::get('restore/{id}', [BannerController::class, "restore"])->name('admin.banner.restore' );//khoi phuc

        Route::delete('destroy/{id}', [BannerController::class, "destroy"])->name('admin.banner.destroy' );//xoa
    });
    //2. Brand
    route::prefix('brand')->group(function(){
        Route::get('/', [BrandController::class, "index"])->name('admin.brand.index' );//danh sach
        Route::get('trash', [BrandController::class, "trash"])->name('admin.brand.trash' );//thung rac
        Route::get('show', [BrandController::class, "show"])->name('admin.brand.show' );//chi tiet

        Route::post('store', [BrandController::class, "store"])->name('admin.brand.store' );//xu ly them
        Route::get('edit/{id}', [BrandController::class, "edit"])->name('admin.brand.edit' );//form cap nhat
        Route::put('update/{id}', [BrandController::class, "update"])->name('admin.brand.update' );//xu ly cap nhat

        Route::get('status/{id}', [BrandController::class, "status"])->name('admin.brand.status' );//cap nhat trang thai
        Route::get('delete/{id}', [BrandController::class, "delete"])->name('admin.brand.delete' );
        Route::get('restore/{id}', [BrandController::class, "restore"])->name('admin.brand.restore' );//khoi phuc

        Route::delete('destroy/{id}', [BrandController::class, "destroy"])->name('admin.brand.destroy' );//xoa
    });
    //3.Category
    route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, "index"])->name('admin.category.index' );//danh sach
        Route::get('trash', [CategoryController::class, "trash"])->name('admin.category.trash' );//thung rac
        Route::get('show', [CategoryController::class, "show"])->name('admin.category.show' );//chi tiet
        Route::post('store', [CategoryController::class, "store"])->name('admin.category.store' );//xu ly them
        Route::get('edit/{id}', [CategoryController::class, "edit"])->name('admin.category.edit' );//form cap nhat
        Route::put('update/{id}', [CategoryController::class, "update"])->name('admin.category.update' );//xu ly cap nhat
        Route::get('status/{id}', [CategoryController::class, "status"])->name('admin.category.status' );//cap nhat trang thai
        Route::get('delete/{id}', [CategoryController::class, "delete"])->name('admin.category.delete' );
        Route::get('restore/{id}', [CategoryController::class, "restore"])->name('admin.category.restore' );//khoi phuc
        Route::delete('destroy/{id}', [CategoryController::class, "destroy"])->name('admin.category.destroy' );//xoa
    });
    //4.Contact
    route::prefix('contact')->group(function(){
        Route::get('/', [ContactController::class, "index"])->name('admin.contact.index' );//danh sach
        Route::get('trash', [ContactController::class, "trash"])->name('admin.contact.trash' );//thung rac
        Route::get('show', [ContactController::class, "show"])->name('admin.contact.show' );//chi tiet
        Route::get('edit/{id}', [ContactController::class, "edit"])->name('admin.contact.edit' );//form cap nhat
        Route::put('update/{id}', [ContactController::class, "update"])->name('admin.contact.update' );//xu ly cap nhat
        Route::get('status/{id}', [ContactController::class, "status"])->name('admin.contact.status' );//cap nhat trang thai
        Route::get('delete/{id}', [ContactController::class, "delete"])->name('admin.contact.delete' );
        Route::get('restore/{id}', [ContactController::class, "restore"])->name('admin.contact.restore' );//khoi phuc
        Route::delete('destroy/{id}', [ContactController::class, "destroy"])->name('admin.contact.destroy' );//xoa
    });
    //5.Menu
    route::prefix('menu')->group(function(){
        Route::get('/', [MenuController::class, "index"])->name('admin.menu.index' );//danh sach
        Route::get('trash', [MenuController::class, "trash"])->name('admin.menu.trash' );//thung rac
        Route::get('show', [MenuController::class, "show"])->name('admin.menu.show' );//chi tiet
        Route::post('store', [MenuController::class, "store"])->name('admin.menu.store' );//xu ly them
        Route::get('edit/{id}', [MenuController::class, "edit"])->name('admin.menu.edit' );//form cap nhat
        Route::put('update/{id}', [MenuController::class, "update"])->name('admin.menu.update' );//xu ly cap nhat
        Route::get('status/{id}', [MenuController::class, "status"])->name('admin.menu.status' );//cap nhat trang thai
        Route::get('delete/{id}', [MenuController::class, "delete"])->name('admin.menu.delete' );
        Route::get('restore/{id}', [MenuController::class, "restore"])->name('admin.menu.restore' );//khoi phuc
        Route::delete('destroy/{id}', [MenuController::class, "destroy"])->name('admin.menu.destroy' );//xoa
    });
    //6.Order
    route::prefix('order')->group(function(){
        Route::get('/', [OrderController::class, "index"])->name('admin.order.index' );//danh sach
        Route::get('trash', [OrderController::class, "trash"])->name('admin.order.trash' );//thung rac
        Route::get('show', [OrderController::class, "show"])->name('admin.order.show' );//chi tiet
        Route::get('edit/{id}', [OrderController::class, "edit"])->name('admin.order.edit' );//form cap nhat
        Route::put('update/{id}', [OrderController::class, "update"])->name('admin.order.update' );//xu ly cap nhat
        Route::get('status/{id}', [OrderController::class, "status"])->name('admin.order.status' );//cap nhat trang thai
        Route::get('delete/{id}', [OrderController::class, "delete"])->name('admin.order.delete' );
        Route::get('restore/{id}', [OrderController::class, "restore"])->name('admin.order.restore' );//khoi phuc
        Route::delete('destroy/{id}', [OrderController::class, "destroy"])->name('admin.order.destroy' );//xoa
    });
    //7.Post
    route::prefix('post')->group(function(){

        Route::get('/', [PostController::class, "index"])->name('admin.post.index' );//danh sach
        Route::get('trash', [PostController::class, "trash"])->name('admin.post.trash' );//thung rac
        Route::get('show', [PostController::class, "show"])->name('admin.post.show' );//chi tiet
        Route::get('create', [PostController::class, "create"])->name('admin.post.create' );//form them
        Route::post('store', [PostController::class, "store"])->name('admin.post.store' );//xu ly them
        Route::get('edit/{id}', [PostController::class, "edit"])->name('admin.post.edit' );//form cap nhat
        Route::put('update/{id}', [PostController::class, "update"])->name('admin.post.update' );//xu ly cap nhat
        Route::get('status/{id}', [PostController::class, "status"])->name('admin.post.status' );//cap nhat trang thai
        Route::get('delete/{id}', [PostController::class, "delete"])->name('admin.post.delete' );
        Route::get('restore/{id}', [PostController::class, "restore"])->name('admin.post.restore' );//khoi phuc
        Route::delete('destroy/{id}', [PostController::class, "destroy"])->name('admin.post.destroy' );//xoa
    });
    //8.Product
    route::prefix('product')->group(function(){

        Route::get('/', [ProductController::class, "index"])->name('admin.product.index' );//danh sach
        Route::get('trash', [ProductController::class, "trash"])->name('admin.product.trash' );//thung rac
        Route::get('show', [ProductController::class, "show"])->name('admin.product.show' );//chi tiet
        Route::get('create', [ProductController::class, "create"])->name('admin.product.create' );//form them
        Route::post('store', [ProductController::class, "store"])->name('admin.product.store' );//xu ly them
        Route::get('edit/{id}', [ProductController::class, "edit"])->name('admin.product.edit' );//form cap nhat
        Route::put('update/{id}', [ProductController::class, "update"])->name('admin.product.update' );//xu ly cap nhat
        Route::get('status/{id}', [ProductController::class, "status"])->name('admin.product.status' );//cap nhat trang thai
        Route::get('delete/{id}', [ProductController::class, "delete"])->name('admin.product.delete' );
        Route::get('restore/{id}', [ProductController::class, "restore"])->name('admin.product.restore' );//khoi phuc
        Route::delete('destroy/{id}', [ProductController::class, "destroy"])->name('admin.product.destroy' );//xoa
    });
    //9.Topic
    route::prefix('topic')->group(function(){
        Route::get('/', [TopicController::class, "index"])->name('admin.category.index' );//danh sach
        Route::get('trash', [TopicController::class, "trash"])->name('admin.category.trash' );//thung rac
        Route::get('show', [TopicController::class, "show"])->name('admin.category.show' );//chi tiet
        Route::post('store', [TopicController::class, "store"])->name('admin.category.store' );//xu ly them
        Route::get('edit/{id}', [TopicController::class, "edit"])->name('admin.category.edit' );//form cap nhat
        Route::put('update/{id}', [TopicController::class, "update"])->name('admin.category.update' );//xu ly cap nhat
        Route::get('status/{id}', [TopicController::class, "status"])->name('admin.category.status' );//cap nhat trang thai
        Route::get('delete/{id}', [TopicController::class, "delete"])->name('admin.category.delete' );
        Route::get('restore/{id}', [TopicController::class, "restore"])->name('admin.category.restore' );//khoi phuc
        Route::delete('destroy/{id}', [TopicController::class, "destroy"])->name('admin.category.destroy' );//xoa
    });
    //10.User
    route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, "index"])->name('admin.user.index' );//danh sach
        Route::get('trash', [UserController::class, "trash"])->name('admin.user.trash' );//thung rac
        Route::get('show', [UserController::class, "show"])->name('admin.user.show' );//chi tiet
        Route::get('create', [UserController::class, "create"])->name('admin.user.create' );//form them
        Route::post('store', [UserController::class, "store"])->name('admin.user.store' );//xu ly them
        Route::get('edit/{id}', [UserController::class, "edit"])->name('admin.user.edit' );//form cap nhat
        Route::put('update/{id}', [UserController::class, "update"])->name('admin.user.update' );//xu ly cap nhat
        Route::get('status/{id}', [UserController::class, "status"])->name('admin.user.status' );//cap nhat trang thai
        Route::get('delete/{id}', [UserController::class, "delete"])->name('admin.user.delete' );
        Route::get('restore/{id}', [UserController::class, "restore"])->name('admin.user.restore' );//khoi phuc
        Route::delete('destroy/{id}', [UserController::class, "destroy"])->name('admin.user.destroy' );//xoa
    });
    
});