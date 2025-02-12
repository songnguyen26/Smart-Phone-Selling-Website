<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Topic;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Post::where('post.status','!=',0)
        ->join('topic','post.topic_id','=','topic.id')
        ->select('post.id as id','title','name','type','image','post.status as status')
        ->get();
        
        return view('backend.post.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topicList=Topic::where('status','!=',0)
        ->get();
        $topicId="";
        foreach($topicList as $item){
            $topicId .="<option value='" .($item->id). "'>" .$item->name."</option>";
        }
        return view('backend.post.create',compact('topicId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post=new Post();
        $post->title=$request->title;
        $post->slug=Str::of($request->title)->slug('-');
        $post->detail=$request->detail;
        $post->description=$request->description;
        $post->topic_id=$request->topic_id;
        $post->type=$request->type;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$post->slug .".".$exten;
                $request->image->move(public_path("assets/image/post"),$filename);
                $post->image=$filename;
            }
        }
        $post->status=$request->status;
        $post->created_at=date('Y-m-d H:i:s');
        $post->created_by=Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::where('id','=',$id)
        ->first();
        if($post)
        {
            $postArray=$post->toArray();
        }
        else{
            return redirect()->route('admin.post.index');
        }
        return view('backend.post.show',compact('postArray','post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        $topicList=Topic::where('status','!=',0)
        ->get();
        $htmltopic="";
        foreach($topicList as $item){
            if($post->topic_id==$item->id)
            {
                $htmltopic .="<option selected value='" .($item->id). "'>" .$item->name."</option>";
            }
            else
            {
                $htmltopic .="<option value='" .($item->id). "'>" .$item->name."</option>";
            }
        }
        return view('backend.post.edit',compact('post','htmltopic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post=Post::find($id);
        if($post==null){
            return redirect()->route('admin.post.index');
        }
        $post->title=$request->title;
        $post->slug=Str::of($request->title)->slug('-');
        $post->detail=$request->detail;
        $post->description=$request->description;
        $post->topic_id=$request->topic_id;
        $post->type=$request->type;
        if($request->image){
            $exten=$request->file("image")->extension();
            if(in_array($exten,['png','jpg','webp','gif'])){
                $filename=$post->slug .".".$exten;
                $request->image->move(public_path("assets/image/post"),$filename);
                $post->image=$filename;
            }
        }
        $post->status=$request->status;
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function trash()
    {
        
        $list = Post::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.post.trash',compact('list'));
    }
    public function status(string $id)
    {
        $post=Post::find($id);
        if($post==null){
            return redirect()->route('admin.post.index');
        }
        $post->status=($post->status==1)? 2: 1; 
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function delete(string $id)
    {
        $post=Post::find($id);
        if($post==null){
            return redirect()->route('admin.post.index');
        }
        $post->status=0; 
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function restore(string $id)
    {
        $post=Post::find($id);
        if($post==null){
            return redirect()->route('admin.post.trash');
        }
        $post->status=1; 
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        if($post==null){
            return redirect()->route('admin.post.trash');
        }
        $post->delete();
        return redirect()->route('admin.post.trash');
    }
}
