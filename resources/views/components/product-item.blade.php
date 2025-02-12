<div class="col-md-3 col-6 product-item pt-3">
    <a class="text-decoration-none" href="{{ route('site.product.detail',["slug"=>$product->slug]) }}">
        <div class="card h-100 rounded">
          @if ($product->pricesale>0)
            <div class="sale text-white">Giảm {{ ceil(($product->pricesale/$product->price)*100) }}%</div>
            <img class="card-img-top"  src="{{ asset('assets/image/product/'.$product->image) }}" alt="Product 3">
            <ul class="action">
              <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
              <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
              <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
            </ul>
            <div class="card-body">
              <h4 class="card-title">{{ $product->name }}</h4>
              <p class="text-decoration-line-through fw-light">{{ number_format($product->price) }}</p>
              <h5 class="text-danger fw-bold">{{ number_format($product->price-$product->pricesale) }} VND</h5>
              
            </div>
          @else
            <img class="card-img-top"  src="{{ asset('assets/image/product/'.$product->image) }}" alt="Product 3">
            <ul class="action">
              <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
              <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
              <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
            </ul>
            <div class="card-body">
              <h4 class="card-title">{{ $product->name }}</h4>
              <p class="text-decoration-line-through fw-light">   </p>
              <h5 class="text-danger fw-bold">{{ number_format($product->price) }} VND</h5>
              
            </div>
          @endif
          
         
        </div>
    </a>
  </div>