<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Topic;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Topic::where('status','!=',0)
        ->get();
        $htmlSortOrder="";
       
        foreach($list as $item){
            $htmlSortOrder .="<option value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
        }
        return view('backend.topic.index',compact('list','htmlSortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic=new Topic();
        $topic->name=$request->name;
        $topic->slug=Str::of($request->name)->slug('-');
        $topic->description=$request->description;
        $topic->sort_order=$request->sort_order;
        $topic->status=$request->status;
        $topic->created_at=date('Y-m-d H:i:s');
        $topic->created_by=Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic=Topic::where('id','=',$id)
        ->first();
        if($topic)
        {
            $topicArray=$topic->toArray();
        }
        else{
            return redirect()->route('admin.topic.index');
        }
        return view('backend.topic.show',compact('topicArray','topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic=Topic::find($id);
        $list=Topic::where('status','!=',0)
        ->get();
        $htmlSortOrder="";
        foreach($list as $item){
            if($topic->sort_order -1== $item->sort_order){
                $htmlSortOrder .="<option selected value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
            }
            else{
                $htmlSortOrder .="<option value='" .($item->sort_order +1). "'>Sau: " .$item->name."</option>";
            }
        }
        return view('backend.topic.edit',compact('topic','htmlSortOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->name=$request->name;
        $topic->slug=Str::of($request->name)->slug('-');
        $topic->description=$request->description;
        $topic->sort_order=$request->sort_order;
        $topic->status=$request->status;
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function trash()
    {
        
        $list = Topic::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.topic.trash',compact('list'));
    }
    public function status(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status=($topic->status==1)? 2: 1; 
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status=0; 
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function restore(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.trash');
        }
        $topic->status=1; 
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null){
            return redirect()->route('admin.topic.trash');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
}
