<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Brand::where('status','!=','0')
        ->get();
        $htmlSortOrder="";
        foreach($list as $item){
            $htmlSortOrder .="<option value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
        }
        return view('backend.brand.index',compact("list","htmlSortOrder"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand=new Brand();
        $brand->name=$request->name;
        $brand->slug=Str::of($request->name)->slug('-');
        $brand->description=$request->description;
        $brand->sort_order=$request->sort_order;
        //upload file
        if($request ->image){
            $exten=$request->file("image")->extension();//lay duoi file
            if(in_array($exten,['png','jpg','gif','webp'])){
                $filename=$brand->slug .".".$exten;
                $request->image->move(public_path("assets/image/brands"),$filename);
                $brand->image=$filename;
            }
        }
        $brand->status=$request->status;
        $brand->created_at=date('Y-m-d H:i:s');
        $brand->created_by=Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand=Brand::where('id','=',$id)
        ->first();
        if($brand)
        {
            $brandArray=$brand->toArray();
        }
        else{
            return redirect()->route('admin.brand.index');
        }
        return view('backend.brand.show',compact('brandArray','brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand=Brand::find($id);
        $list=Brand::where('status','!=','0')
        ->get();
        $htmlsortorder="";
        foreach($list as $item){
            if($brand->sort_order-1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . $item->sort_order . "'>Sau: " . $item->name . "</option>"; 
            }
            else{
                $htmlsortorder .="<option value='" . $item->sort_order . "'>Sau: " . $item->name . "</option>";
            }
        }
        return view('backend.brand.edit',compact('brand','htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand=Brand::find($id);
        $brand->name=$request->name;
        $brand->slug=Str::of($request->name)->slug('-');
        $brand->description=$request->description;
        $brand->sort_order=$request->sort_order;
        //upload file
        if($request ->image){
            $exten=$request->file("image")->extension();//lay duoi file
            if(in_array($exten,['png','jpg','gif','webp'])){
                $filename=$brand->slug .".".$exten;
                $request->image->move(public_path("assets/image/brands"),$filename);
                $brand->image=$filename;
            }
        }
        $brand->status=$request->status;
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function trash()
    {
        
        $list = Brand::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.brand.trash',compact('list'));
    }
    public function status(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null){
            return redirect()->route('admin.brand.index');
        }
        $brand->status=($brand->status==1)? 2: 1; 
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function delete(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null){
            return redirect()->route('admin.brand.index');
        }
        $brand->status=0; 
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function restore(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null){
            return redirect()->route('admin.brand.trash');
        }
        $brand->status=1; 
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null){
            return redirect()->route('admin.brand.trash');
        }
        $brand->delete();
        return redirect()->route('admin.brand.trash');
    }
}
