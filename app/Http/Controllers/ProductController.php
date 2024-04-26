<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function index(){
        $products=Product::get();
        if (Auth::user()->role == 'admin') {
            return view('admin.products.index', compact('products'));
        }
        return view('products.index', compact('products'));
    }
    public function detail($id){
        $product=Product::find($id);
        if (Auth::user()->role == 'admin') {
            return view('admin.products.detail', compact('product'));
        }
        return view('products.detail', compact('product'));
    }
    public function insert(){
        $types=ProductType::get();
        $brands=Brand::get();
        return view('admin.products.insert',compact('types','brands'));
    }
    public function postInsert(Request $request){
        //dd($request->file('photo')->getClientOriginalName());
        $request->validate([
            'name'=>'required|min:3',
            'price'=>'required|numeric',
            'description'=>'required',
            'photo'=>'required|image',
            'quantity'=>'required|numeric',
            'product_type_id'=>'required|numeric',
            'brand_id'=>'required|numeric'
        ],[
            'name.required'=>'Nhập tên',
            'name.min'=>'Nhập tên ít nhất 3 kí tự',
            'price.required'=>'Nhập giá',
            'price.numeric'=>'Nhập số',
            'description'=>'Nhập thông tin sản phẩm',
            'photo.required'=>'Vui lòng chọn ảnh',
            'photo.image'=>'Chọn file hình ảnh .jpg, .png, ...',
            'quantity.required'=>'Nhập số lượng',
            'quantity.numeric'=>'Nhập số',
            'product_type_id.required'=>'Chọn loại sản phẩm',
            'product_type_id.numeric'=>'Nhập số',
            'brand_id.required'=>'Chọn brand',
            'brand_id.numeric'=>'Nhập số',
        ]);
        if($request->hasFile('photo')){
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('storage/product',$extension);
        }
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'photo'=>$extension,
            'quantity'=>$request->quantity,
            'product_type_id'=>$request->product_type_id,
            'brand_id'=>$request->brand_id,
        ]);
        return redirect()->route('admin.products.index');
    }
    public function getUpdate(Request $request, $id=0){
        $product=Product::find($id);
        $types=ProductType::get();
        $brands=Brand::get();
        if(!empty($product)){
            $request->session()->put('id',$id);
            return view('admin.products.update',compact('product','types','brands'));
        }
        return redirect()->route('admin.brand.index')->with('msg','Không tìm thấy brand');
    }
    public function postUpdate(Request $request){
        $id=session('id');
        $request->session()->remove('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        $request->validate([
            'name'=>'required|min:3',
            'price'=>'required|numeric',
            'description'=>'required',
            'quantity'=>'required|numeric',
            'product_type_id'=>'required|numeric',
            'brand_id'=>'required|numeric'
        ],[
            'name.required'=>'Nhập tên',
            'name.min'=>'Nhập tên ít nhất 3 kí tự',
            'price.required'=>'Nhập giá',
            'price.numeric'=>'Nhập số',
            'description'=>'Nhập thông tin sản phẩm',
            'quantity.required'=>'Nhập số lượng',
            'quantity.numeric'=>'Nhập số',
            'product_type_id.required'=>'Chọn loại sản phẩm',
            'product_type_id.numeric'=>'Nhập số',
            'brand_id.required'=>'Chọn brand',
            'brand_id.numeric'=>'Nhập số',
        ]);
        $product=Product::find($id);
        $product->name=$request['name'];
        $product->price=$request['price'];
        $product->description=$request['description'];
        if($request->hasFile('photo')){
            $filePath='storage/product/'.$product->photo;
            Storage::delete($filePath);
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('storage/product',$extension);
            $product->photo=$extension;
        }
        $product->quantity=$request['quantity'];
        $product->product_type_id=$request['product_type_id'];
        $product->brand_id=$request['brand_id'];
        $product->save();
        return redirect()->route('admin.products.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $product=Product::find($id);
            if(!empty($product)){
                $request->session()->put('id',$id);
                return view('admin.products.delete',compact('product'));
            }
        }
        return redirect()->route('admin.products.index')->with('msg','Không tìm thấy id');
    }
    public function postDelete(){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        $product=Product::find($id);
        $filePath='storage/product/'.$product->photo;
        File::delete($filePath);
        $product->delete();
        return redirect()->route('admin.products.index')->with('msg','Xoá thành công');
    }
}
