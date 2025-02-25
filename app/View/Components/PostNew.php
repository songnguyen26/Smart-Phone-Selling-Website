<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
class PostNew extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   $postNew=Post::where([['status','=',1],['type','=','post']])
        ->orderBy('created_at','desc')
        ->limit(4)
        ->get();
        return view('components.post-new',compact('postNew'));
    }
}
