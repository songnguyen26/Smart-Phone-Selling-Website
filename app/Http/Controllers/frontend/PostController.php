<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
class PostController extends Controller
{
    
    public function index(){
        $postList=Post::where([['status','=',1],['type','=','post']])
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('frontend.Post',compact('postList'));
    }
    public function postDetail($slug)
    {
        $postDetail=Post::where([
            ['status','=',1],
            ['slug','=',$slug],
            ['type','=','post']
        ])
        ->first();
        $sameTopic=Post::where([
            ['status','=',1],
            ['topic_id','=',$postDetail->topic_id],
            ['type','=','post'],
            ['id','!=',$postDetail->id]
        ])
        ->limit(4)
        ->get();
        return view('frontend.PostDetail',compact('postDetail','sameTopic'));
    }
    public function Topic($slug)
    {
        $topicList=Topic::where([['status','=',1],['slug','=',$slug]])
        ->select('id','name')
        ->first();
        $postByTopic=Post::where([['status','=',1],['topic_id','=',$topicList->id]])
        ->orderBy('created_at','asc')
        ->paginate(1);
        return view('frontend.postByTopic',compact('postByTopic','topicList'));
    }
    public function Page($slug)
    {
        $pageDetail=Post::where([
            ['status','=',1],
            ['slug','=',$slug]
        ])
        ->first();
        return view('frontend.pageDetail',compact('pageDetail'));
    }
    
}
