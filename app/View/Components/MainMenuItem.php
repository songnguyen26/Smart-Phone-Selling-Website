<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;
class MainMenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public  $menu_row=null;
    public function __construct($menurow)
    {
        $this->menu_row=$menurow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu=$this->menu_row;
        $agrs_mainmenu_sub=[
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',$menu->id]
        ];
        $list_menu_sub=Menu::where($agrs_mainmenu_sub)
        ->get();
       
        
        return view('components.main-menu-item',compact('list_menu_sub','menu'));
    }
}
