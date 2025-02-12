@extends('layout.site')
@section('title','Thanh toán')
@section('maincontent')
<div class="container my-4" >
    <h1 class="text-center text-success">Thanh toán</h1>
    @if (!Auth::check())
        <div class="row">
            <div class="col-12 center">
                <h3>Đăng nhập để thanh toán</h3>
                <a href="{{ route('website.getLogin') }}" class="btn btn-primary">Đăng nhập</a>
            </div>
        </div>
    @else
    <table class="table table-bodered">
        <thead>
            <tr>
                <th>ID</th>
                <th  style="width:90px;">Hinh</th>
                <th>ten san pham</th>
                <th>gia</th>
                <th>so luong</th>
                <th>thanh tien</th>
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
                <td>{{ $item['qty'] }}</td>
                <td>{{ number_format($item['price']*$item['qty']) }}</td>
            </tr>
            @php
                $totalMoney+=$item['price']*$item['qty'];
            @endphp
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" >
                    <strong>Tổng tiền:{{ number_format($totalMoney) }}</strong>
                </th>
            </tr>
        </tfoot>
    </table>
    @php
        $user=Auth::user();
    @endphp
    <form action="{{ route('site.cart.docheckout') }}" method="POST" >
        @csrf
        <h4 class="text-center">Thông tin đặt hàng</h4>
        <div class="row pt-3">
          <div class="col">
            <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Họ và tên" name="name">
          </div>
          <div class="col">
            <input type="text" class="form-control" value="{{ $user->email }}" placeholder="Email" name="email">
          </div>
        </div>
        <div class="row pt-3">
          <div class="col">
            <input type="text" class="form-control" value="{{ $user->phone }}" placeholder="Điện thoại" name="phone">
          </div>
        </div>
        <div class="row pt-3">
            <div class="col">
              <input type="text" class="form-control" value="{{ $user->address }}" placeholder="Địa chỉ" name="address">
            </div>
          </div>
        <div class="row pt-3">
          <div class="col">
            <textarea name="note" id="note" class="form-control" placeholder="Ghi chú"></textarea>
          </div>
        </div>
        <div class="row pt-3">
            <button type="submit" class="btn btn-success">Đặt hàng</button>
        </div>
      </form>
    @endif
    
</div>

@endsection