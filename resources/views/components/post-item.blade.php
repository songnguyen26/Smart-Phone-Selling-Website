<div class="col-md-3 col-6 product-item pt-3">
    <a class="text-decoration-none" href="{{ route('site.post.detail',["slug"=>$post->slug]) }}">
        <div class="card h-100 rounded">
            <img class="card-img-top"  src="{{ asset('assets/image/post/'.$post->image) }}" alt="Product 3">
            
            <div class="card-body">
              <h4 class="card-title text-danger fw-bold">{{ $post->title }}</h4>
              <p class="text-decoration-line-through fw-light">   </p>
              <h5 class="">{{ $post->description }}</h5>
              
            </div>
        </div>
    </a>
  </div>