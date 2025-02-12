@extends('layout.admin')
@section('title','Chi tiết hóa đơn')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết hóa đơn</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    {{-- <a class="btn btn-sm btn-danger" href="{{ route('admin.category.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:30px;">Mã hóa đơn</th>
                                <th class="text-center" style="width:90px;">Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th class="text-center" style="width:200px;">Số lượng</th>
                                <th class="text-center" style="width:30px;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalMoney=0;
                            @endphp
                          @foreach ($list as $item)
                              <tr>
  
                                  <td class="text-center">
                                      {{ $item->order_id }}
                                  </td>
                                  
                                  <td class="text-center">
                                    <img src="{{ asset('assets/image/product/'.$item->image) }}" class="img-fluid"
                                        alt="{{ $item->name }}">
                                </td>
                                <td>{{ $item->name }}</td>
                                  <td>{{ $item->price }}</td>
                                  <td class="text-center">
                                      {{ $item->qty }}
                                  </td>
                                  <td class="text-center">
                                      {{ $item->amount}}
                                  </td>
                              </tr>
                              @php
                                  $totalMoney +=$item->amount
                              @endphp
                          @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">
                                    <strong>Tổng tiền: {{ $totalMoney }}</strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection