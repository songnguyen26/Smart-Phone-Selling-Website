@extends('layout.site');
@section('maincontent')
    <div>
         <!-- start slide show -->
    <div class="slide-show">
        <div class="list-image">
            <img class="img-fluid" src="assets/image/slider_1.webp" alt="">
            <img class="img-fluid" src="assets/image/slider_2.webp" alt="">
            <img class="img-fluid" src="assets/image/slider_3.webp" alt="">
        </div>
    </div>
    <!-- end slide show -->
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <div class="row p-3">
                <div class="col banner-item"><a href=""><img class="rounded img-fluid" src="assets/image/img_3banner_1.webp" alt=""></a></div>
                <div class="col banner-item"><a href=""><img class="rounded img-fluid" src="assets/image/img_3banner_2.webp" alt=""></a></div>
                <div class="col banner-item"><a href=""><img class="rounded img-fluid" src="assets/image/img_3banner_3.webp" alt=""></a></div>
            </div>
            
        </div>
    </div>
    <!-- end banner -->
    <!-- category -->
    <div class="container">
      <div class="row">
        <div class="col">
          
        </div>
      </div>
    </div>
    <!-- end category -->
    <!-- sale product -->
    <div class="container bg-danger">
      <div class="row fs-3 text fw-bold text-light p-3">Hot Sale cuối tuần</div>
      <div class="row p-3">
        <div class="col-md-3 col-6 product-item ">
          <a class="text-decoration-none" href="productDetail.html">
              <div class="card h-100 rounded">
                <div class="sale text-white">Giảm 20%</div>
                <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                <ul class="action">
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                  <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                </ul>
                <div class="card-body">
                  <h4 class="card-title">Product 3</h4>
                  <p class="text-decoration-line-through fw-light">30.00</p>
                  <h5 class="text-danger fw-bold">$29.99</h5>
                  
                </div>
              </div>
          </a>
        </div>
        <div class="col-md-3 col-6 product-item ">
          <a class="text-decoration-none" href="productDetail.html">
              <div class="card h-100 rounded">
                <div class="sale text-white">Giảm 20%</div>
                <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                <ul class="action">
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                  <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                </ul>
                <div class="card-body">
                  <h4 class="card-title">Product 3</h4>
                  <p class="text-decoration-line-through fw-light">30.00</p>
                  <h5 class="text-danger fw-bold">$29.99</h5>
                  
                </div>
              </div>
          </a>
        </div>
        <div class="col-md-3 col-6 product-item ">
          <a class="text-decoration-none" href="productDetail.html">
              <div class="card h-100 rounded">
                <div class="sale text-white">Giảm 20%</div>
                <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                <ul class="action">
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                  <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                </ul>
                <div class="card-body">
                  <h4 class="card-title">Product 3</h4>
                  <p class="text-decoration-line-through fw-light">30.00</p>
                  <h5 class="text-danger fw-bold">$29.99</h5>
                  
                </div>
              </div>
          </a>
        </div>
        <div class="col-md-3 col-6 product-item ">
          <a class="text-decoration-none" href="productDetail.html">
              <div class="card h-100 rounded">
                <div class="sale text-white">Giảm 20%</div>
                <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                <ul class="action">
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                  <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                  <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                </ul>
                <div class="card-body">
                  <h4 class="card-title">Product 3</h4>
                  <p class="text-decoration-line-through fw-light">30.00</p>
                  <h5 class="text-danger fw-bold">$29.99</h5>
                  
                </div>
              </div>
          </a>
        </div>
      </div>
      <div class="row p-3">
        <div class="col-5  text-center">
          <a class="btn see-all">Xem tất cả ></a>
        </div>
      </div>
    </div>
    <!-- end sale product -->
    <!-- start product -->
    <div class="product">
        <div class="container">
            <h2 class="my-4 text-center">Sản phẩm mới nhất</h2>
            <div class="row p-3">
              <div class="col-md-3 col-6 product-item pt-3">
                <a class="text-decoration-none" href="productDetail.html">
                    <div class="card h-100 rounded">
                      <div class="sale text-white">Giảm 20%</div>
                      <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                      <ul class="action">
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                        <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                      </ul>
                      <div class="card-body">
                        <h4 class="card-title">Product 3</h4>
                        <p class="text-decoration-line-through fw-light">30.00</p>
                        <h5 class="text-danger fw-bold">$29.99</h5>
                        
                      </div>
                    </div>
                </a>
              </div>
              <div class="col-md-3 col-6 product-item pt-3">
                <a class="text-decoration-none" href="productDetail.html">
                    <div class="card h-100 rounded">
                      <div class="sale text-white">Giảm 20%</div>
                      <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                      <ul class="action">
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                        <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                      </ul>
                      <div class="card-body">
                        <h4 class="card-title">Product 3</h4>
                        <p class="text-decoration-line-through fw-light">30.00</p>
                        <h5 class="text-danger fw-bold">$29.99</h5>
                        
                      </div>
                    </div>
                </a>
              </div>
              <div class="col-md-3 col-6 product-item pt-3">
                <a class="text-decoration-none" href="productDetail.html">
                    <div class="card h-100 rounded">
                      <div class="sale text-white">Giảm 20%</div>
                      <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                      <ul class="action">
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                        <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                      </ul>
                      <div class="card-body">
                        <h4 class="card-title">Product 3</h4>
                        <p class="text-decoration-line-through fw-light">30.00</p>
                        <h5 class="text-danger fw-bold">$29.99</h5>
                        
                      </div>
                    </div>
                </a>
              </div>
              <div class="col-md-3 col-6 product-item pt-3">
                <a class="text-decoration-none" href="productDetail.html">
                    <div class="card h-100 rounded">
                      <div class="sale text-white">Giảm 20%</div>
                      <img class="card-img-top"  src="assets/image/product3.png" alt="Product 3">
                      <ul class="action">
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-eye"></i></a></li>
                        <li  class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li class="action-btn"><a class="text-dark" href=""><i class="fa-solid fa-cart-plus"></i></a></li>
                      </ul>
                      <div class="card-body">
                        <h4 class="card-title">Product 3</h4>
                        <p class="text-decoration-line-through fw-light">30.00</p>
                        <h5 class="text-danger fw-bold">$29.99</h5>
                        
                      </div>
                    </div>
                </a>
              </div>
            </div>
        </div>
    </div>
    <!-- end product -->
    </div>
@endsection