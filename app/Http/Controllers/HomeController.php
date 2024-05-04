<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products1=Product::where('product_type_id',1)->get();
        $products2=Product::where('product_type_id',2)->get();
        $products3=Product::where('product_type_id',3)->get();
        $product_types=ProductType::get();
        //dd($products1);
        return view('index',compact('products1','products2','products3','product_types'));
    }
}
