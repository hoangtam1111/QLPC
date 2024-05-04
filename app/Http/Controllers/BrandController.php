<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $listBrand=Brand::get();
        return view('admin.brand.index',compact('listBrand'));
    }
    public function insert(){
        return view('admin.brand.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'brand_name'=>'required|min:3',
            'brand_logo'=>'required'
        ],[
            'brand_name.required'=>'Vui lòng nhập tên brand',
            'brand_name.min'=>'Tên phải từ 3 kí tự trở lên',
            'brand_logo.required'=>'Vui lòng nhập url logo của brand'
        ]);
        $data=[
            $request->brand_name,
            $request->brand_logo
        ];
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->brand_logo
        ]);
        return redirect()->route('admin.brand.index');
    }
    public function getUpdate(Request $request, $id=0){
        $brand=Brand::where('id',$id)->first();
        if(!empty($brand)){
            $request->session()->put('id',$id);
            return view('admin.brand.update',compact('brand'));
        }
        return redirect()->route('admin.brand.index')->with('msg','Không tìm thấy brand');
    }
    public function postUpdate(Request $request){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        $request->validate([
            'brand_name'=>'required|min:3',
            'brand_logo'=>'required'
        ],[
            'brand_name.required'=>'Vui lòng nhập tên brand',
            'brand_name.min'=>'Tên phải từ 3 kí tự trở lên',
            'brand_logo.required'=>'Vui lòng nhập url logo của brand'
        ]);
        $request->session()->remove('id');
        Brand::where('id', $id)->update([
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->brand_logo
        ]);
        return redirect()->route('admin.brand.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $brand=Brand::where('id',$id)->first();
            if(!empty($brand)){
                $request->session()->put('id',$id);
                return view('admin.brand.delete',compact('brand'));
            }
        }
        return redirect()->route('admin.brand.index')->with('msg','Không tìm thấy id');
    }
    public function postDelete(){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        Brand::where('id',$id)->delete();
        return redirect()->route('admin.brand.index')->with('msg','Xoá thành công');
    }
}
