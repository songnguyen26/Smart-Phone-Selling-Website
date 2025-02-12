@extends('layout.site');
@section('title','Bài viết')
@section('maincontent')
<div>
    <!--filter-->
    <div>
        <div class="container py-3 mt-3 mb-3 filter">
          {{-- <a href="" class="filter-item">Mặc định</a>
          <a href="" class="filter-item">Tên A-Z</a>
          <a href="" class="filter-item">Tên Z-A</a>
          <a href="" class="filter-item">Hàng mới nhất</a>
          <a href="" class="filter-item">Giá từ thấp đến cao</a>
          <a href="" class="filter-item">Giá từ cao đến thấp</a> --}}
        </div>
      </div>
    <!--end filter-->
    <div class="product">
          <div class="container">
              <h2 class="my-4 text-center">Tất cả bài viết</h2>
              <div class="row p-5">
                      @foreach ($postList as $post_item)
                          <x-post-item :postitem="$post_item"/>
                      @endforeach
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  {{ $postList->links() }}
                </div>
              </div>
          </div>
      </div>
</div>
@endsection
