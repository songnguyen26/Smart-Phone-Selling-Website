<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    public function index(Request $request){
        $query=Product::query()->where('status','=',1);
        if(isset($request->default))
        {
            $query->orderBy('created_at','desc');
        }
        if(isset($request->nameasc))
        {
            $query->orderBy('name','asc');
        }
        if(isset($request->namedesc))
        {
            $query->orderBy('name','desc');
        }
        if(isset($request->priceasc))
        {
            $query->orderBy('price','asc');
        }
        if(isset($request->pricedesc))
        {
            $query->orderBy('price','desc');
        }
        $productList=$query
        ->paginate(8);
        return view('frontend.product',compact('productList'));
    }
    public function productDetail($slug){
    
        $productDetail=Product::where([
            ['status','=',1],
            ['slug','=',$slug]
        ])
        ->first();
        $sameProduct=Product::where( [['status','=',1],
        ['category_id','=',$productDetail->category_id]
        ,['id','!=',$productDetail->id]])
        ->get();
        return view('frontend.productDetail',compact('productDetail','sameProduct'));
    }
    public function Category(Request $request,$slug){
        $row=Category::where([['slug','=',$slug],['status','=',1]])->select('id','name','slug')->first();
        $listcatid=[];
        if($row!=null)
        {
            array_push($listcatid,$row->id);
            $list1=Category::where([['parent_id','=',$row->id],['status','=',1]])->select('id')->get();
            if(count($list1)>0)
            {
                foreach($list1 as $row1){
                    array_push($listcatid,$row1->id);
                    $list2=Category::where([['parent_id','=',$row1->id],['status','=',1]])->select('id')->get();
                    if(count($list2)>0)
                    {
                        foreach($list2 as $row2){
                            array_push($listcatid,$row2->id);
                        }
                    }
                }
            }
        }
        $query=Product::query()->where('status','=',1)
        ->whereIn('category_id',$listcatid);
        if(isset($request->default))
        {
            $query->orderBy('created_at','desc');
        }
        if(isset($request->nameasc))
        {
            $query->orderBy('name','asc');
        }
        if(isset($request->namedesc))
        {
            $query->orderBy('name','desc');
        }
        if(isset($request->priceasc))
        {
            $query->orderBy('price','asc');
        }
        if(isset($request->pricedesc))
        {
            $query->orderBy('price','desc');
        }
        $list_product=$query->paginate(4);
        return view('frontend.productCategory',compact('list_product','row'));
    }
    public function Brand(Request $request,$slug)
    {
        $brand=Brand::where([
            ['status','=',1],
            ['slug','=',$slug]
        ])
        ->select('id','name','slug')
        ->first();
        $query=Product::query()->where([
            ['status','=',1],
            ['brand_id','=',$brand->id]
        ]);
        if(isset($request->default))
        {
            $query->orderBy('created_at','desc');
        }
        if(isset($request->nameasc))
        {
            $query->orderBy('name','asc');
        }
        if(isset($request->namedesc))
        {
            $query->orderBy('name','desc');
        }
        if(isset($request->priceasc))
        {
            $query->orderBy('price','asc');
        }
        if(isset($request->pricedesc))
        {
            $query->orderBy('price','desc');
        }
        $list_product=$query->paginate(4);
        return view('frontend.productBrand',compact('brand','list_product'));
    }
    public function search(Request $request)
    {
        $productSearch=Product::where([
            ['status','=',1],
            ['name','like','%'.$request->search.'%']
        ])
        ->orderBy('name','desc')
        ->get();
        return view('frontend.productSearch',compact('productSearch'));
    }
   
}
