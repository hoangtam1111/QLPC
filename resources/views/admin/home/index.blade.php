@extends('layout.app')
@section('content')
<div class="container">
    <h2>Xin chào admin</h2>
    <table class="table table-bordered">
        <tr>
            <td>Quản lý thương hiệu</td>
            <td><a href="{{ route('admin.brand.index') }}">Brand</a></td>
        </tr>
        <tr>
            <td>Quản lý loại sản phẩm</td>
            <td><a href="{{ route('admin.type.index') }}">LoaiSP</a></td>
        </tr>
        <tr>
            <td>Quản lý sản phẩm</td>
            <td><a href="../product/">SanPham</a></td>
        </tr>
        <tr>
            <td>Quản lý user</td>
            <td><a href="{{ route('admin.user.index') }}">Users</a></td>
        </tr>
    </table>
</div>
@endsection
