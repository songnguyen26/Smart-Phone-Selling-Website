<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    
</head>
<body>
    <!-- header -->
    <header>
        <section class="header">
            <div class="container">
                <div class="row pt-3">
                    <div class="col-lg-2 col-7 ">
                        <img class="img-fluid" src="{{ asset('assets/image/logo.webp') }}" alt="">
                    </div>
                    <div class="col-lg-4 d-lg-block d-none">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
                          </div>
                    </div>
                    <div class="col-lg-6 d-lg-block ">
                        <div class="row">
                            <div class="col">
                               <a href="" class="text-decoration-none">
                                <div class="row">
                                    <div class="col-lg-3  ">
                                        <i class="fa-solid fa-location-dot fa-lg" style="color: #ffffff;"></i>
                                    </div>
                                    <div class="col-lg-9 d-lg-block d-none " style="font-size: x-small; color: #ffffff;" >
                                        <div class="row">Hệ thống cửa hàng</div>
                                        <div class="row">7 cửa hàng</div>
                                    </div>
                                </div>
                               </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                 <div class="row">
                                     <div class="col-3">
                                         <i class="fa-solid fa-phone-volume fa-lg" style="color: #ffffff;"></i>
                                     </div>
                                     <div class="col-lg-9 d-lg-block d-none " style="color: #ffffff;" >
                                         <div class="row" style=" font-size: x-small;">Gọi mua hàng</div>
                                         <div class="row" style=" font-size: small;">1900 6750</div>
                                     </div>
                                 </div>
                                </a>
                             </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>
                                        </div>
                                        <div class="col-lg-9 d-lg-block d-none " style="color: #ffffff;" >
                                            <div class="row" style=" font-size: x-small;">Thông tin </div>
                                            <div class="row" style=" font-size: small;">tài khoản</div>
                                        </div>
                                    </div>
                                   </a> 
                            </div>
                            <div class="col">
                              
                                <a href="" class="text-decoration-none">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                        </div>
                                        <div class="col-lg-9 d-lg-block d-none " style="color: #ffffff;" >
                                            <div class="row" >Giỏ hàng </div>
                                           
                                        </div>
                                    </div>
                                   </a> 
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-none col-12 pt-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
                          </div>
                    </div>
                    
                </div>
                <div class="row menu" >
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                          <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
                          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img class="img-fluid" src="assets/image/logo.webp" alt=""></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <x-main-menu/>
                          </div>
                        </div>
                      </nav>
                </div>
            </div>
        </section>
    </header>
    <div class="content">
        @yield('maincontent')
    </div>
    <!-- footer -->
    <footer>
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <ul class="list-menu">
                            <li class="list-menu-item"><img class="img-fluid" src="assets/image/logo.webp" alt=""></li>
                            <li class="list-menu-item">Hệ thống cửa hàng Sudes Phone chuyên bán lẻ điện thoại, máy tính laptop, smartwatch, smarthome, phụ kiện chính hãng - Giá tốt, giao miễn phí.</li>
                            <li class="list-menu-item">Địa chỉ: 70 Lữ Gia, Phường 15, Quận 11, Tp.HCM</li>
                            <li class="list-menu-item">Điện thoại: 1900 6750</li>
                            <li class="list-menu-item">Email: support@sapo.vn</li>
                          </ul>
                    </div>
                    <div class="col-md">
                        <ul class="list-menu">
                            <li class="list-menu-item" style="font-size: larger; font-weight: 500;">Chính sách</li>
                            <li class="list-menu-item"><a  href="">Chính sách mua hàng</a></li>
                            <li class="list-menu-item"><a href="">Chính sách đổi trả</a></li>
                            <li class="list-menu-item"><a href="">Chính sách vận chuyển</a></li>
                            <li class="list-menu-item"><a href="">Chính sách bảo mật</a></li>
                            <li class="list-menu-item"><a href="">Cam kết cửa hàng</a></li>
                          </ul>
                    </div>
                    <div class="col-md">
                        <ul class="list-menu">
                            <li class="list-menu-item" style="font-size: larger; font-weight: 500;">Hướng dẫn</li>
                            <li class="list-menu-item"><a  href="">Hướng dẫn mua hàng</a></li>
                            <li class="list-menu-item"><a href="">Hướng dẫn đổi trả</a></li>
                            <li class="list-menu-item"><a href="">Hướng dẫn chuyển khoản</a></li>
                            <li class="list-menu-item"><a href="">Hướng dẫn trả góp</a></li>
                            <li class="list-menu-item"><a href="">Hướng dẫn hoàn hàng</a></li>
                          </ul>
                    </div>
                    <div class="col-md">
                        <ul class="list-menu">
                            <li class="list-menu-item" style="font-size: larger; font-weight: 500;">Kết nối với chúng tôi</li>
                            <li class="list-menu-item"><a  href="">
                                <img src="assets/image/facebook_2.svg" alt="">
                                <img src="assets/image/instagram_1.svg" alt="">
                                <img src="assets/image/shopee.svg" alt="">
                                <img src="assets/image/lazada.svg" alt="">
                                <img src="assets/image/tiktok.svg" alt="">
                            </a></li>
                          </ul>
                          <ul class="list-menu">
                            <li class="list-menu-item" style="font-size: larger; font-weight: 500;">Hỗ trợ thanh toán</li>
                            <li class="list-menu-item"><a  href="">
                                <img src="assets/image/payment_1.svg" alt="">
                                <img src="assets/image/payment_2.svg" alt="">
                                <img src="assets/image/payment_3.svg" alt="">
                                <img src="assets/image/payment_4.svg" alt="">
                                <img src="assets/image/payment_5.svg" alt="">
                                <img src="assets/image/payment_6.svg" alt="">
                                <img src="assets/image/payment_7.svg" alt="">
                            </a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>
</body>
</html>