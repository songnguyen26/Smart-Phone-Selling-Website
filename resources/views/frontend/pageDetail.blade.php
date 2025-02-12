@extends('layout.site')
@section('title','Trang đơn')
@section('maincontent')
   <div class="container">
    <div class="h2 py-3">{{ $pageDetail->title }}</div>
    <p>{{ $pageDetail->detail }}</p>
   </div>
@endsection
