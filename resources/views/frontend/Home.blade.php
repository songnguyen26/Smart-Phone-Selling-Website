@extends('layout.site');
@section('title','Trang chủ')
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
      <x-product-new/>
    <!-- end product -->
    <x-post-new/>
    </div>
@endsection