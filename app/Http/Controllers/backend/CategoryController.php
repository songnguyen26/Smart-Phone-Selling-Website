<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $list=Category::where('status','!=','0')
        ->get();
        $htmlSortOrder="";
        $parent_id="";
        foreach($list as $item){
            $htmlSortOrder .="<option value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
            $parent_id .="<option value='" .($item->id). "'>" .$item->name."</option>";
        }
        return view('backend.category.index',compact('list','htmlSortOrder','parent_id'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->slug=Str::of($request->name)->slug('-');
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->sort_order=$request->sort_order;
        //upload file
        if($request ->image){
            $exten=$request->file("image")->extension();//lay duoi file
            if(in_array($exten,['png','jpg','gif','webp'])){
                $filename=$category->slug .".".$exten;
                $request->image->move(public_path("assets/image/categories"),$filename);
                $category->image=$filename;
            }
        }
        $category->status=$request->status;
        $category->created_at=date('Y-m-d H:i:s');
        $category->created_by=Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::where('id','=',$id)
        ->first();
        if($category)
        {
            $categoryArray=$category->toArray();
        }
        else{
            return redirect()->route('admin.category.index');
        }
        return view('backend.category.show',compact('categoryArray','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $category=Category::find($id);
        $list = Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach ($list as $item){
            if($category->parent_id==$item->id)
            {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";    
            }
            else {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if($category->sort_order-1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . $item->sort_order . "'>" . $item->name . "</option>"; 
            }
            else{
                $htmlsortorder .="<option value='" . $item->sort_order . "'>" . $item->name . "</option>";
            }
        }
        return view('backend.category.edit',compact('category','htmlsortorder','htmlparentid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category=Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index');
        }
        $category->name=$request->name;
        $category->slug=Str::of($request->name)->slug('-');
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->sort_order=$request->sort_order;
        //upload file
        if($request ->image){
            $exten=$request->file("image")->extension();//lay duoi file
            if(in_array($exten,['png','jpg','gif','webp'])){
                $filename=$category->slug .".".$exten;
                $request->image->move(public_path("assets/image/categories"),$filename);
                $category->image=$filename;
            }
        }
        $category->status=$request->status;
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function trash()
    {
        
        $list = Category::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.category.trash',compact('list'));
    }
    public function status(string $id)
    {
        $category=Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index');
        }
        $category->status=($category->status==1)? 2: 1; 
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function delete(string $id)
    {
        $category=Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index');
        }
        $category->status=0; 
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function restore(string $id)
    {
        $category=Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.trash');
        }
        $category->status=1; 
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.trash');
        }
        $category->delete();
        return redirect()->route('admin.category.trash');
    }
}
