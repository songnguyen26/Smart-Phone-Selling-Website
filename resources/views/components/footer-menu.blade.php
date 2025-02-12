@foreach ($menuList as $item)
<li class="list-menu-item"><a  href="{{ url($item->link) }}">{{ $item->name }}</a></li> 
@endforeach

