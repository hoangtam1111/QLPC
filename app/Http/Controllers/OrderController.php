<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

    }
    public function buy(){
        $total=0;
        $id=Auth::user()->id;
        $carts=Cart::where('user_id',$id)->get();

        $order=Order::create([
            'user_id'=>$id,
            'total_amount'=>0,
        ]);

        foreach($carts as $cart){
            OrderDetail::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity
            ]);
            $total+=$cart->quantity*$cart->product->price;
        }

        Cart::where('user_id',$id)->delete();
        $products=OrderDetail::where('order_id',$order->id)->get();
        return view('buy',compact('order','products','total'));
    }
}
