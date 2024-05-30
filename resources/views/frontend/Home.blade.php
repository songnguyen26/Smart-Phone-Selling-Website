@extends('layout.site');
@section('maincontent')
    <div>
         <!-- start slide show -->
      <x-slider />
    <!-- end slide show -->
    <!-- banner -->
      <x-banner/>
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
      <x-flash-sale/>
    <!-- end sale product -->
    <!-- start product -->
    <div class="product">
        <div class="container">
            <h2 class="my-4 text-center">Sản phẩm mới nhất</h2>
            <div class="row p-3">
              @for ($i = 0; $i < 4; $i++)
                <x-product-item/>
              @endfor 
            </div>
        </div>
    </div>
    <!-- end product -->
    </div>
@endsection