
@if (count($list_menu_sub)==0)
  <li class="nav-item">
    <a class="nav-link mx-lg-2" href="{{ url($menu->link) }}">{{ $menu->name }}</a>
  </li>
@else
<li class="nav-item">
  <a class="nav-link" href="{{ url($menu->link) }}">{{ $menu->name }}</a>
  <ul class="dropdown-menu">
    @foreach ($list_menu_sub as $menu_sub)
      <li class="dropdown-submenu">
        <a class="dropdown-item" href="{{ url($menu_sub->link) }}">{{ $menu_sub->name }}</a>
        {{-- <ul class="dropdown-menu">
          @foreach ($list_menu_sub as $item)
              @if ($item->parent_id==$menu_sub->id)
              <li><a class="dropdown-item" href="#">{{ $item->name }}</a></li>
              @endif
          @endforeach
        </ul> --}}
      </li>
    @endforeach
  </ul>
</li>
@endif