<div class="product">
    <div class="container">
        <h2 class="my-4 text-center">Sản phẩm mới nhất</h2>
        <div class="row p-3">
          @foreach ($productNew as $product_item)
              <x-product-item :productitem="$product_item"/>
          @endforeach
        </div>
    </div>
</div>