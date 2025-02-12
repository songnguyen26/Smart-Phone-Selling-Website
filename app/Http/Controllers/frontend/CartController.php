<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
class CartController extends Controller
{
    public function index()
    {
        $cart_list=session('cart',[]);
        return view("frontend.cart",compact('cart_list'));
    }
    public function addcart()
    {
        $productid=$_GET['productid'];
        $qty=$_GET['qty'];
       
        $product = Product::find($productid);
        $cartitem = array(
            'id' => $productid,
            'name' => $product->name,
            'image' => $product->image,
            'price'=>($product->pricesale>0)?$product->price-$product->pricesale:$product->price,
            'qty' => $qty,
        );
        //lay ra gio hang
        $cart=session('cart',[]);
        if (is_array($cart)&& count($cart)==0){
            array_push($cart,$cartitem);
        }
        else
        {
            $check_exist=true;
            foreach($cart as $key=>$item)
            {
                if(in_array($productid,$item))
                {
                    $cart[$key]['qty']+= $qty;
                    $check_exist=false;
                    break;
                }
            }
            if($check_exist==true){
                array_push($cart,$cartitem);
            }
        }
        
   
        session(['cart'=>$cart]);
        $count=is_array( session('cart',[])) && count( session('cart',[]))> 0 ?count( session('cart',[])):0;
        echo $count;
    }
    public function update(Request $request)
    {
        $carts=session('cart',[]);
        $list_qty=$request->qty;
        foreach($carts as $key=>$cart)
        {
            foreach($list_qty as $productid=>$qtyvalue)
            {
                if($carts[$key]['id']==$productid)
                {
                    $carts[$key]['qty']=$qtyvalue;
                }
            }
        }
        session(['cart'=>$carts]);
        return redirect()->route('site.cart');
    }

    public function delete($id)
    {
        $carts=session('cart',[]);
        foreach($carts as $key=>$cart)
        {
            if($carts[$key]['id']==$id)
            {
                unset($carts[$key]);
            }
        }
        session(['cart'=>$carts]);
        return redirect()->route('site.cart');
    }
    public function checkout()
    {
        $cart_list=session('cart',[]);
        return view("frontend.checkout",compact('cart_list'));
    }
    public function docheckout(Request $request)
    {
        $user=Auth::user();
        $order=new Order();
        $cart=session('cart',[]);
        $order->user_id=$user->id;
        $order->name=$request->name;
        $order->phone=$request->phone;
        $order->email=$request->email;
        $order->address=$request->address;
        $order->note=$request->note;
        $order->status=2;
        $order->created_at=date('Y-m-d H:i:s');
        if($order->save())
        {
            foreach($cart as $cart)
            {
                $orderDetail=new OrderDetail();
                $orderDetail->order_id=$order->id;
                $orderDetail->product_id=$cart['id'];
                $orderDetail->price=$cart['price'];
                $orderDetail->qty=$cart['qty'];
                $orderDetail->amount=$cart['price']*$cart['qty'];
                $orderDetail->save();
            }
            session(['cart'=>[]]);
        }
        return view('frontend.checkout_message');
    }
}
