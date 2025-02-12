@extends('layout.site')
@section('maincontent')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-success">Đặt hàng thành công</h2>
            <a href="{{ route('site.home') }}" class="btn btn-success">Tiếp tục mua hàng</a>
        </div>
    </div>
</div>
@endsection
