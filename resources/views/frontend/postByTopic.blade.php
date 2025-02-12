@extends('layout.site');
@section('title','Bài viết theo chủ đề')
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
              <h2 class="my-4 text-center">{{ $topicList->name }}</h2>
              <div class="row p-5">
                      @foreach ($postByTopic as $post_item)
                          <div class="col-md-3 col-6 product-item pt-3">
                            <a class="text-decoration-none" href="{{ route('site.post.detail',["slug"=>$post_item->slug]) }}">
                                <div class="card h-100 rounded">
                                    <img class="card-img-top"  src="{{ asset('assets/image/post/'.$post_item->image) }}" alt="Product 3">
                                    
                                    <div class="card-body">
                                      <h4 class="card-title text-danger fw-bold">{{ $post_item->title }}</h4>
                                      <p class="text-decoration-line-through fw-light">   </p>
                                      <h5 class="">{{ $post_item->description }}</h5>
                                      
                                    </div>
                                </div>
                            </a>
                          </div>
                      @endforeach
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  {{ $postByTopic->links() }}
                </div>
              </div>
          </div>
      </div>
</div>
@endsection