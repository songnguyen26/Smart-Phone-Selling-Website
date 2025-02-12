<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Product::where('product.status','!=',0)
        ->join('category','product.category_id','=','category.id')
        ->join('brand','product.brand_id','=','brand.id')
        ->select('product.id as id','product.image','product.name as productname','category.name as categoryname','brand.name as brandname','product.status as status')
        ->get();
        return view('backend.product.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryList=Category::where('status','!=',0)
        ->get();
        $brandList=Brand::where('status','!=',0)
        ->get();
        $htmlCategory="";
        $htmlBrand="";
        foreach($categoryList as $item){
            $htmlCategory .="<option value='" .($item->id). "'>" .$item->name."</option>";
        }
        foreach($brandList as $row){
            $htmlBrand .="<option value='" .($row->id). "'>" .$row->name."</option>";
        }
        return view('backend.product.create',compact('htmlBrand','htmlCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->slug=Str::of($request->name)->slug('-');
        $product->detail=$request->detail;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->price;
        $product->pricesale=$request->pricesale;
        $product->qty=$request->qty;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$product->slug .".".$exten;
                $request->image->move(public_path("assets/image/product"),$filename);
                $product->image=$filename;
            }
        }
        $product->status=$request->status;
        $product->created_at=date('Y-m-d H:i:s');
        $product->created_by=Auth::id()?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::where('id','=',$id)
        ->first();
        if($product)
        {
            $productArray=$product->toArray();
        }
        else{
            return redirect()->route('admin.product.index');
        }
        return view('backend.product.show',compact('productArray','product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $product=Product::find($id);
        $categoryList=Category::where('status','!=',0)
        ->get();
        $brandList=Brand::where('status','!=',0)
        ->get();
        $htmlCategory="";
        $htmlBrand="";
        foreach($categoryList as $item){
           if($item->id == $product->category_id)
           {
                $htmlCategory .="<option selected value='" .($item->id). "'>" .$item->name."</option>";
           }
           else{
                $htmlCategory .="<option value='" .($item->id). "'>" .$item->name."</option>";
           }
        }
        foreach($brandList as $row){
            if($row->id==$product->brand_id)
            {
                $htmlBrand .="<option selected value='" .($row->id). "'>" .$row->name."</option>";
            }
            else
            {
                $htmlBrand .="<option value='" .($row->id). "'>" .$row->name."</option>";
            }
        }
        
        return view('backend.product.edit',compact('product','htmlBrand','htmlCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product=Product::find($id);
        $product->name=$request->name;
        $product->slug=Str::of($request->name)->slug('-');
        $product->detail=$request->detail;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->price;
        $product->pricesale=$request->pricesale;
        $product->qty=$request->qty;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$product->slug .".".$exten;
                $request->image->move(public_path("assets/image/product"),$filename);
                $product->image=$filename;
            }
        }
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id()?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function trash()
    {
        
        $list = Product::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.product.trash',compact('list'));
    }
    public function status(string $id)
    {
        $product=Product::find($id);
        if($product==null){
            return redirect()->route('admin.product.index');
        }
        $product->status=($product->status==1)? 2: 1; 
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function delete(string $id)
    {
        $product=Product::find($id);
        if($product==null){
            return redirect()->route('admin.product.index');
        }
        $product->status=0; 
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function restore(string $id)
    {
        $product=Product::find($id);
        if($product==null){
            return redirect()->route('admin.product.trash');
        }
        $product->status=1; 
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        if($product==null){
            return redirect()->route('admin.product.trash');
        }
        $product->delete();
        return redirect()->route('admin.product.trash');
    }
}
