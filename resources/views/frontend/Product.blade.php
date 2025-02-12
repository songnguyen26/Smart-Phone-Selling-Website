@extends('layout.site');
@section('title','Sản phẩm')
@section('maincontent')
<div>
        <!--filter-->
        <form action="{{ route('site.product') }}">
          @csrf
          <div class="mydict">
            <div>
              <label>
                <input type="radio" name="default"  >
                <span>Mới nhất</span>
              </label>
              <label>
                <input type="radio" name="nameasc">
                <span>Tên A-Z</span>
              </label>
              <label>
                <input type="radio" name="namedesc">
                <span>Tên Z-A</span>
              </label>
              <label>
                <input type="radio" name="priceasc">
                <span>Giá từ thấp đến cao</span>
              </label>
              <label>
                <input type="radio" name="pricedesc">
                <span>Giá từ cao đến thấp</span>
              </label>
              <button class="btn btn-primary" type="submit">Lọc</button>
            </div>
        </form>
        </div>
        <!--end filter-->
        <div class="product">
              <div class="container">
                  <h2 class="my-4 text-center">Tất cả sản phẩm</h2>
                  <div class="row p-5">
                          @foreach ($productList as $product_item)
                              <x-product-item :productitem="$product_item"/>
                          @endforeach
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      {{ $productList->links() }}
                    </div>
                  </div>
              </div>
          </div>
</div>
@endsection