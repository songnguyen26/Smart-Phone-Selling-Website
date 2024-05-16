<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('frontend.product');
    }
    public function productDetail($slug){
        return view('frontend.productDetail',compact('slug'));
    }
}
