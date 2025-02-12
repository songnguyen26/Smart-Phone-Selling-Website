<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $list=Menu::where('status','!=',0)
        ->get();
        $htmlParent_id="";
        foreach($list as $item)
        {
            $htmlParent_id .="<option value='" .($item->id). "'>" .$item->name."</option>";
        }
        $categoryList=Category::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select('id','name')
        ->get();
        $brandList=Brand::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select('id','name')
        ->get();
        $topicList=Topic::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select('id','name')
        ->get();
        $pageList=Post::where([['status','!=',0],['type','=','page']])
        ->orderBy('created_at','DESC')
        ->select('id','title')
        ->get();
        return view('backend.menu.index',compact('list','categoryList','brandList','topicList','pageList','htmlParent_id'));
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
    public function store(Request $request)
    {
        if(isset($request->createCategory)){
            $listid=$request->categoryid;
            if($listid){
                foreach($listid as $id){
                    $category=Category::find($id);
                    if($category!= null){
                        $menu=new Menu();
                        $menu->name= $category->name;
                        $menu->link="danh-muc/". $category->slug;
                        $menu->sort_order=0;
                        $menu->parent_id=$request->parent_id;
                        $menu->type='category';
                        $menu->position=$request->position;
                        $menu->table_id=$id;
                        $menu->created_at=date('Y-m-d H:i:s');
                        $menu->created_by=Auth::id()??1;
                        $menu->status=$request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }
        }
        if(isset($request->createBrand)){
            $listid=$request->brandid;
            if($listid){
                foreach($listid as $id){
                    $brand=Brand::find($id);
                    if($brand!= null){
                        $menu=new Menu();
                        $menu->name= $brand->name;
                        $menu->link="thuong-hieu/". $brand->slug;
                        $menu->sort_order=0;
                        $menu->parent_id=$request->parent_id;;
                        $menu->type='brand';
                        $menu->position=$request->position;
                        $menu->table_id=$id;
                        $menu->created_at=date('Y-m-d H:i:s');
                        $menu->created_by=Auth::id()??1;
                        $menu->status=$request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }
            else{
                echo "khong co";
            }
        }
        if(isset($request->createTopic)){
            $listid=$request->topicid;
            if($listid){
                foreach($listid as $id){
                    $topic=topic::find($id);
                    if($topic!= null){
                        $menu=new Menu();
                        $menu->name= $topic->name;
                        $menu->link="chu-de/". $topic->slug;
                        $menu->sort_order=0;
                        $menu->parent_id=$request->parent_id;;
                        $menu->type='topic';
                        $menu->position=$request->position;
                        $menu->table_id=$id;
                        $menu->created_at=date('Y-m-d H:i:s');
                        $menu->created_by=Auth::id()??1;
                        $menu->status=$request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }
            else{
                echo "khong co";
            }
        }
        if(isset($request->createPage)){
            $listid=$request->pageid;
            if($listid){
                foreach($listid as $id){
                    $page=Post::where([['id','=',$id],['type','=','page']])->first();
                    if($page!= null){
                        $menu=new Menu();
                        $menu->name= $page->title;
                        $menu->link="trang-don/". $page->slug;
                        $menu->sort_order=0;
                        $menu->parent_id=$request->parent_id;;
                        $menu->type='page';
                        $menu->position=$request->position;
                        $menu->table_id=$id;
                        $menu->created_at=date('Y-m-d H:i:s');
                        $menu->created_by=Auth::id()??1;
                        $menu->status=$request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }
            else{
                echo "khong co";
            }
        }
        if(isset($request->createCustom)){
            if(isset($request->name,$request->link)){
                $menu=new Menu();
                $menu->name= $request->name;
                $menu->link=$request->link;
                $menu->sort_order=0;
                $menu->parent_id=$request->parent_id;;
                $menu->type='custom';
                $menu->position=$request->position;
                $menu->created_at=date('Y-m-d H:i:s');
                $menu->created_by=Auth::id()??1;
                $menu->status=$request->status;
                $menu->save();
                return redirect()->route('admin.menu.index');     
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu=menu::where('id','=',$id)
        ->first();
        if($menu)
        {
            $menuArray=$menu->toArray();
        }
        else{
            return redirect()->route('admin.menu.index');
        }
        return view('backend.menu.show',compact('menuArray','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu=Menu::find($id);
        $list = Menu::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        foreach ($list as $item){
            if($menu->parent_id==$item->id)
            {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";    
            }
            else {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        }
        return view('backend.menu.edit',compact('menu','htmlparentid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu=Menu::find($id);
        if($menu==null){
            return redirect()->route('admin.menu.index');
        }
        $menu->name=$request->name;
        $menu->link=$request->link;
        $menu->parent_id=$request->parent_id;
        $menu->status=$request->status;
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function trash()
    {
        
        $list = Menu::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.menu.trash',compact('list'));
    }
    public function status(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null){
            return redirect()->route('admin.menu.index');
        }
        $menu->status=($menu->status==1)? 2: 1; 
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function delete(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null){
            return redirect()->route('admin.menu.index');
        }
        $menu->status=0; 
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function restore(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null){
            return redirect()->route('admin.menu.trash');
        }
        $menu->status=1; 
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null){
            return redirect()->route('admin.menu.trash');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash');
    }
}
