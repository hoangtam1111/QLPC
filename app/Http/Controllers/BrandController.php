<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brand;
    public function __construct(){
        $this->brand=new Brand();
    }
    public function index(){
        $listBrand=$this->brand->getAllBrands();
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
        $this->brand->insertBrand($data);
        return redirect()->route('admin.brand.index');
    }
    public function getUpdate(Request $request, $id=0){
        $brand=$this->brand->getDetail($id);
        if(!empty($brand)){
            $request->session()->put('id',$id);
            return view('admin.brand.update',compact('brand'));
        }
        return redirect()->route('admin.brand.index')->with('msg','Không tìm thấy brand');
    }
    public function postUpdate(Request $request){
        $id=session('id');
        echo $id;
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
        $data=[
            $request->brand_name,
            $request->brand_logo
        ];
        $request->session()->remove('id');
        $this->brand->updateBrand($data,$id);
        return redirect()->route('admin.brand.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $brand=$this->brand->getDetail($id);
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
        $this->brand->deleteBrand($id);
        return redirect()->route('admin.brand.index')->with('msg','Xoá thành công');
    }
}
