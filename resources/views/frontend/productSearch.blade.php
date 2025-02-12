@extends('layout.site');
@section('title','Tìm kiếm sản phẩm')
@section('maincontent')
<div>

        <!--end filter-->
        <div class="product">
              <div class="container">
                @if (count($productSearch)>0)
                    <h2 class="my-4 text-center">Kết quả tìm kiếm</h2>
                    <div class="row p-5">
                            @foreach ($productSearch as $product_item)
                                <x-product-item :productitem="$product_item"/>
                            @endforeach
                    </div>
                    <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{-- {{ $productSearch->links() }} --}}
                    </div>
                    </div>
                @else
                <h2 class="my-4 text-center">Không tìm thấy sản phẩm</h2>
                @endif
              </div>
          </div>
</div>
@endsection