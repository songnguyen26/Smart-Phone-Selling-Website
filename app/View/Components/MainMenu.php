<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;
class MainMenu extends Component
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
        $agrs_mainmenu=[
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',0]
        ];
        $menuList=Menu::where($agrs_mainmenu)
        ->get();
        return view('components.main-menu',compact('menuList'));
    }
}
