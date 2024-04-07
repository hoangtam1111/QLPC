@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/productIndex.css') }}">
<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="#">Trang chủ</a> /
            </li>
            <li>
                <a href="{{ route('admin.type.index') }}">Loại sản phẩm</a> /
            </li>
        </ul>
    </div>
    <a href="{{ route('admin.type.insert') }}">Thêm loại sản phẩm mới</a>
    <table class="table table-bordered">
        <tr>
            <th>Tên loại SP</th>
            <th>Chỉnh sửa</th>
        </tr>
        @if (!empty($listType))
            @foreach ($listType as $type=>$item)
                <tr>
                    <td>{{ $item->type_name }}</td>
                    <td><a href="{{ route('admin.type.update',['id'=>$item->type_id]) }}">Sửa</a> | <a href="{{ route('admin.type.delete',['id'=>$item->type_id]) }}">Xóa</a></td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection
