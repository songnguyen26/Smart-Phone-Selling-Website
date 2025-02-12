@extends('layout.site')
@section('title','Giỏ hàng')
@section('maincontent')
<section class="main container">
   <div class="container my-4" >
    <h1 class="text-center text-success">Gio hang cua ban</h1>
    @php
        $carts=session('cart',[]);
    @endphp
    @if (count($carts)<=0)
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-danger">Chưa có sản phẩm trong giỏ hàng</h3>
                <a href="{{ route('site.product') }}" class="btn btn-success">Mua hàng tại đây</a>
            </div>
        </div>
    @else
    <form action="{{ route('site.cart.update') }}" method="POST">
        @csrf
        <table class="table table-bodered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th  style="width:90px;">Hinh</th>
                    <th>ten san pham</th>
                    <th>gia</th>
                    <th>so luong</th>
                    <th>thanh tien</th>
                    <th></th>
                </tr>
               
            </thead>
            <tbody>
                @php
                    $totalMoney=0;
                @endphp
                @foreach ($cart_list as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>
                        <img class="img-fluid" src="{{ asset('assets/image/product/'.$item['image']) }}" alt="">
                    </td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{number_format( $item['price']) }}</td>
                    <td><input name="qty[{{ $item['id'] }}]" type="number" value="{{ $item['qty'] }}"></td>
                    <td>{{ number_format($item['price']*$item['qty']) }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{ route('site.cart.delete',['id'=>$item['id']]) }}">X</a>
                    </td>
                </tr>
                @php
                    $totalMoney+=$item['price']*$item['qty'];
                @endphp
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <a class="btn btn-success px-3" href="">Mua thêm</a>
                        <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
                        <a href="{{ route('site.cart.checkout') }}" class="btn btn-info px-3">Thanh toán</a>
                    </th>
                    <th colspan="3" class="text-end">
                        <strong>Tổng tiền:{{ number_format($totalMoney) }}</strong>
                    </th>
                </tr>
            </tfoot>
        </table>
    </form>
    @endif
   
   </div>

</section>
@endsection