@extends('layout.site')
@section('title','Liên hệ')
@section('maincontent')
<div>
    <div class="container">
        <div class="row pt-3">
          <div class="col-6">
            <p class="fs-3 text fw-bold">Cửa hàng Sudes Phone</p>
            <p>
              Hệ thống cửa hàng Sudes Phone chuyên bán lẻ điện thoại, máy tính laptop, smartwatch, smarthome, phụ kiện chính hãng - Giá tốt, giao miễn phí.
            </p>
            <p>
              <b>Địa chỉ:</b>  70 Lữ Gia, Phường 15, Quận 11, Tp.HCM
            </p>
            <p>
              <b>Hot line: </b><a class="text-decoration-none text-danger" href="">1900 6750</a>
            </p>
            <p>
              <b>Email:</b> <a class="text-decoration-none text-danger" href="">support@sapo.vn</a>
            </p>
            <form action="{{ route('site.saveContact') }}" method="POST">
              @csrf
              <h4>Liên hệ với chúng tôi</h4>
              @if (Auth::check())
                @php
                  $user=Auth::user();
                @endphp
                <div class="row pt-3">
                  <div class="col">
                    <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Họ và tên" name="name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control"value="{{ $user->email }}" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="row pt-3">
                  <div class="col">
                    <input type="text" class="form-control" value="{{ $user->phone }}" placeholder="Điện thoại" name="phone">
                  </div>
                </div>
              @else
                <div class="row pt-3">
                  <div class="col">
                    <input type="text" class="form-control"  placeholder="Họ và tên" name="name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control"  placeholder="Email" name="email">
                  </div>
                </div>
                <div class="row pt-3">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Điện thoại" name="phone">
                  </div>
                </div>
              @endif
              <div class="row pt-3">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Tiêu đề" name="title">
                </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                  <textarea name="content" id="content" class="form-control" placeholder="Nội dung"></textarea>
                </div>
              </div>
              <div class="row py-3">
                <div class="col">
                  <button type="submit" class="btn btn-danger">Gửi tin nhắn ></button>
                </div>
              </div>
            </form>
           
          </div>
          <div class="col-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.518170261775!2d106.65068857481789!3d10.771568589376892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec07488c543%3A0x7dc9617e924ddb50!2zNzAgxJAuIEzhu68gR2lhLCBQaMaw4budbmcgMTUsIFF14bqtbiAxMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1715176194501!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
</div>
@endsection