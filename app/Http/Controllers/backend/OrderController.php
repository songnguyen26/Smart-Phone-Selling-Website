<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $list=Order::where('order.status','!=',0)
        ->join('user','order.user_id','=','user.id')
        ->select('order.id as id','order.name as name','order.email as email','order.phone as phone','order.created_at as created_at','order.status as status')
        ->get();
        return view('backend.order.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list=OrderDetail::where('order_id','=',$id)
        ->join('product','orderdetail.product_id','=','product.id')
        ->select('name','image','orderdetail.price as price','orderdetail.qty as qty','amount','order_id')
        ->get();
        return view ('backend.order.show',compact('list'));
    }
    public function status(string $id)
    {
        $order=Order::find($id);
        if($order==null){
            return redirect()->route('admin.order.index');
        }
        $order->status=($order->status==1)? 2: 1; 
        $order->updated_at=date('Y-m-d H:i:s');
        $order->updated_by=Auth::id() ?? 1;
        $order->save();
        return redirect()->route('admin.order.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
