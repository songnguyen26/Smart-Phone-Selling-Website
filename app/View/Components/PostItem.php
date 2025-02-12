<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $post_row=null;
    public function __construct($postitem)
    {
        $this->post_row=$postitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   $post=$this->post_row;
        return view('components.post-item',compact('post'));
    }
}
