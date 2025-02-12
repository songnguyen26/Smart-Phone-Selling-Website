<div class="container bg-danger">
    <div class="row fs-3 text fw-bold text-light p-3">Hot Sale cuối tuần</div>
    <div class="row p-3">
      @foreach ($saleProduct as $product_sale)
          <x-product-item :productitem="$product_sale"/>
      @endforeach
    </div>
    <div class="row p-3">
      <div class="col-5  text-center">
        <a class="btn see-all">Xem tất cả ></a>
      </div>
    </div>
  </div>