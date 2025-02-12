<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Banner::where('status','!=','0')
        ->get();
        $htmlSortOrder="";
        foreach($list as $item){
            $htmlSortOrder .="<option value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
        }
        return view('backend.banner.index',compact('list','htmlSortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner=new Banner();
        $banner->name=$request->name;
       
        $banner->link=$request->link;
        $banner->description=$request->description;
        $banner->position=$request->postion;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$banner->name ."." .$exten;
                $request->image->move(public_path("assets/image/banner"),$filename);
                $banner->image=$filename;
            }
        }
        $banner->created_at=date('Y-m-d H:i:s');
        $banner->created_by=Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner=Banner::where('id','=',$id)
        ->first();
        if($banner)
        {
            $bannerArray=$banner->toArray();
        }
        else{
            return redirect()->route('admin.banner.index');
        }
        return view('backend.banner.show',compact('bannerArray','banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner=Banner::find($id);
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner=Banner::find($id);
        if($banner==null){
            return redirect()->route('admin.banner.index');
        }
        $banner->name=$request->name;
        $banner->link=$request->link;
        $banner->description=$request->description;
        $banner->position=$request->postion;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$banner->name ."." .$exten;
                $request->image->move(public_path("assets/image/banner"),$filename);
                $banner->image=$filename;
            }
        }
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function trash()
    {
        
        $list = Banner::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.banner.trash',compact('list'));
    }
    public function status(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null){
            return redirect()->route('admin.banner.index');
        }
        $banner->status=($banner->status==1)? 2: 1; 
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null){
            return redirect()->route('admin.banner.index');
        }
        $banner->status=0; 
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function restore(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null){
            return redirect()->route('admin.banner.trash');
        }
        $banner->status=1; 
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null){
            return redirect()->route('admin.banner.trash');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash');
    }
 
}
