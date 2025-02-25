<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;
class Slider extends Component
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
    {
        $bannerList=Banner::where([['status','=',1],['position','=','slider']])
        ->orderBy('created_at','desc')
        ->get();
        return view('components.slider',compact('bannerList'));
    }
}
