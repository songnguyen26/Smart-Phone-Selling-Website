<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    echo "Hello World";
});
Route::get('home',function(){
    return "Home";
});
Route::get('welcome',function(){
    return view("welcome");
});
Route::get("user",[UserController::class,"show"]);
Route::get("user/1",[UserController::class,"index"]);
Route::get("user/{id}/edit",[UserController::class,"edit"])->name("user.edit");
Route::get("user/list/{page?}",[UserController::class,"list"])->name("user.list");