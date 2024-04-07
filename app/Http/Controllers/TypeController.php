<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private $type;
    public function __construct(){
        $this->type=new ProductType;
    }
    public function index(){
        $listType=$this->type->getAllType();
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
        $data=[$request->type_name];
        $this->type->insertType($data);
        return redirect()->route('admin.type.index');
    }
    public function update(Request $request,$id){
        $type=$this->type->getDetail($id);
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
        $data=[$request->type_name];
        $this->type->updateType($id,$data);
        return redirect()->route('admin.type.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $type=$this->type->getDetail($id);
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
        $this->type->deleteType($id);
        return redirect()->route('admin.type.index')->with('msg','Xoá thành công');
    }
}
