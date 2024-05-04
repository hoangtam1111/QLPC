<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $listType=ProductType::get();
        return view('admin.type.index',compact('listType'));
    }
    public function insert(){
        return view('admin.type.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'type_name'=>'required|min:3'
        ],[
            'type_name.required'=>'Vui lòng nhập loại sản phẩm'
        ]);
        ProductType::insert([
            'type_name'=>$request->type_name
        ]);
        return redirect()->route('admin.type.index');
    }
    public function update(Request $request,$id){
        $type=ProductType::where('id',$id)->first();
        if(!empty($type)){
            $request->session()->put('id',$id);
            return view('admin.type.update',compact('type'));
        }
        return redirect()->route('admin.type.index')->with('msg','Không tìm thấy id');
    }
    public function postUpdate(Request $request){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tim thấy loại sản phẩm này');
        $request->validate([
            'type_name'=>'required|min:3'
        ],[
            'type_name.required'=>'Vui lòng nhập loại sản phẩm'
        ]);
        ProductType::where('id',$id)->update([
            'type_name'=>$request->type_name
        ]);
        return redirect()->route('admin.type.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $type=ProductType::where('id',$id)->first();
            if(!empty($type)){
                $request->session()->put('id',$id);
                return view('admin.type.delete',compact('type'));
            }
        }
        return redirect()->route('admin.type.index')->with('msg','Không tìm thấy id');
    }
    public function postDelete(){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        ProductType::where('id',$id)->delete();
        // dd($id);
        return redirect()->route('admin.type.index')->with('msg','Xoá thành công');
    }
    public function type(){
        $product_types=ProductType::get();
        return view('components.product-types',compact('product_types'));
    }
}
