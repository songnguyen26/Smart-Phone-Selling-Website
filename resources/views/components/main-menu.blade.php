<div class="offcanvas-body">
    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
      @foreach ($menuList as $menuitem )
        <x-main-menu-item :menurow="$menuitem" />
      @endforeach
      {{-- <li class="nav-item">
        <a class="nav-link mx-lg-2 active" aria-current="page" href="{{ route('site.home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-lg-2" href="about.html">Giới thiệu</a>
      </li>
      <li class="nav-item">
          <a class="nav-link mx-lg-2" href="{{ route('site.product') }}">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-lg-2" href="policy.html">Chính sách</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-lg-2" href="{{ route('site.contact') }}">Liên hệ</a>
        </li> --}}
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li> -->
    </ul>
  </div>