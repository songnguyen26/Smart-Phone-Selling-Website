@extends('layout.site');
@section('maincontent')
<div>
    <div class="container py-3">
        <div class="row">
         <div class="col-4 pt-3">
           <img class="img-fluid" src="assets/image/product1.webp" alt="">
         </div>
         <div class="col-5 pt-3">
           <div class="row"><h1>product3</h1></div>
           <div class="row"><span> Mã: đang cập nhật</span></div>
           <div class="row"><span>Thương hiệu: Apple | Tình trạng: Còn hàng</span> </div>
           <hr>
           <div class="row" style="color: red; font-weight: bold; font-size: larger;"><span>2.590.000₫</span> </div>
           <div class="row">
              <div class="input-group quantity mr-3" style="width: 150px;">
               <button id="minus"  onclick="handleMinus()" type="button" class="btn btn-danger" data-type="minus" >
                   <span class="fa fa-minus"></span>
               </button>
               <input id="quantity" type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="100">
               <button id="plus" onclick="handlePlus()"  type="button" class="btn btn-danger" data-type="plus" >
                   <span class="fa fa-plus"></span>
               </button>
           </div>
           </div>
           <div class="row py-3">
             <div class="col-9">
               <button class="btn btn-danger " style="width: 300px; height: 65px;"><span class="fs-5 text fw-bold" >Mua ngay</span> <br> Giao tận nơi hoặc nhận tại cửa hàng</button>
             </div>
             <div class="col-3">
               <button href="" class="btn btn-danger" style="width: 100px; height: 65px;" >
                 <i class="fa-solid fa-cart-plus"></i>
                 <br><span style="font-size: 12px;">Thêm vào giỏ</span>
               </button>
             </div>
           </div>
   
         </div>
         <div class="col-3 pt-3">
           <div class="row">
             <ul class="list-group">
               <li class="list-group-item" style="background-color: #BF1E2E; color: #ffffff;"><i class="fa-solid fa-gift"></i> Khuyến mãi đặc biệt</li>
               <li class="list-group-item" >
                 <p>
                   - Giảm 250.000đ khi mua kèm gói bảo hành VIP 12 tháng 1 Đổi 1.
                   <br>- Giảm trực tiếp 40%, tối đa 600.000 VNĐ khi mở thẻ TP Bank EVO.
                   <br>- Thu cũ đổi mới: Thu giá cao trợ giá đến 95%.
                   <br>- Tặng cường lực. 
                 </p>
               </li>
             </ul>
           </div>
           <div class="row">
             <ul class="list-group">
               <li class="list-group-item" style="background-color: #141414; color: #ffffff;"><i class="fa-solid fa-circle-check"></i> Chính sách hỗ trợ</li>
               <li class="list-group-item" >
                 <p>
                   <i class="fa-solid fa-truck"></i> Vận chuyển miễn phí
                   <br><i class="fa-solid fa-bag-shopping"></i> Quà tặng
                   <br>- Thu cũ đổi mới: Thu giá cao trợ giá đến 95%.
                   <br>- Tặng cường lực. 
                 </p>
               </li>
             </ul>
           </div>
         </div>
        </div>
       </div>
</div>
@endsection