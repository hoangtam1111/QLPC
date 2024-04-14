<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    public function __construct(){
        $this->user=new User;
    }
    public function index(){
        $listUser=$this->user->getAllUsers();
        return view('admin.user.index',compact('listUser'));
    }
    public function detail($id){
        $user=$this->user->getDetail($id);
        return view('admin.user.detail',compact('user'));
    }
    public function insert(){
        return view('admin.user.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'username'=>'required|min:5',
            'password'=>'required|min:8',
            'name'=>'required|min:5',
            'email'=>'required|email'
        ],[
            'username.required'=>'Vui lòng nhập username',
            'username.min'=>'Vui lòng nhập username từ 5 kí tự trở lên',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Vui lòng nhập ít nhất 8 kí tự',
            'name.required'=>'Vui lòng nhập tên người dùng',
            'name.min'=>'Nhập tên từ 5 kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định dạng email'
        ]);
        $data=[
            $request->username,
            $request->password,
            $request->name,
            $request->email,
            $request->address,
            $request->admin
        ];
        $this->user->insertUser($data);
        return redirect()->route('admin.user.index');
    }
    public function update(Request $request,$id){
        $user=$this->user->getDetail($id);
        if(!empty($user)){
            $request->session()->put('id',$id);
            return view('admin.user.update',compact('user'));
        }
        return redirect()->route('admin.user.index')->with('msg','Không tìm thấy id');
    }
    public function postUpdate(Request $request){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tim thấy user này');
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email'
        ],[
            'name.required'=>'Vui lòng nhập tên người dùng',
            'name.min'=>'Nhập tên từ 5 kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định dạng email'
        ]);
        $data=[
            $request->name,
            $request->email,
            $request->address
        ];
        $this->user->updateUser($data,$id);
        return redirect()->route('admin.user.index');
    }
    public function delete(Request $request, $id){
        if(!empty($id)){
            $user=$this->user->getDetail($id);
            if(!empty($user)){
                $request->session()->put('id',$id);
                return view('admin.user.delete',compact('user'));
            }
        }
        return redirect()->route('admin.user.index')->with('msg','Không tìm thấy id');
    }
    public function postDelete(){
        $id=session('id');
        if(empty($id))
            return back()->with('msg','Không tìm thấy id');
        $this->user->deleteUser($id);
        return redirect()->route('admin.user.index')->with('msg','Xoá thành công');
    }
}
