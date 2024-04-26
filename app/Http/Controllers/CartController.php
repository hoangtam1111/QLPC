<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index(){
        if(Auth::user()->role=='user'){
            $id=Auth::user()->id;
            $carts=Cart::where('user_id',$id)->get();
            return view('cart',compact('carts'));
        }
    }
    public function insert(Request $request){
        if(Auth::user()->role=='user'){
            $id=Auth::user()->id;
            $product_id=$request->id;
            $cart=Cart::where('product_id', $product_id)
            ->where('user_id', $id)
            ->first();
            if($cart!=null){
                $cart->quantity+=1;
                $cart->save();
            }else{
                Cart::create([
                    'product_id'=>$product_id,
                    'user_id'=>$id,
                    'quantity'=>1
                ]);
            }
            return redirect()->route('cart.index');
        }
    }
    public function update(Request $request){
        $cart=Cart::find($request->id);
        $cart->quantity=$request->quantity;
        $cart->save();
        return redirect()->route('cart.index');
    }
    public function delete(Request $request){
        Cart::find($request->id)->delete();
        return redirect()->route('cart.index');
    }
}
