@extends('layout.app')
@section('content')
<link href="{{ asset('css/Users.css') }}" rel="stylesheet" />
<link href="{{ asset('css/productIndex.css') }}" rel="stylesheet" />

<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="{{ route('admin.home') }}">Trang chủ</a> /
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}">user</a> /
            </li>
        </ul>
    </div>
    <a href="{{ route('admin.user.insert') }}" style="color: #E02207;">Thêm tài khoản mới</a>
    <table class="table table-bordered">
        <tr>
            <th>Tài khoản</th>
            <th>Họ Tên</th>
            <th>Chỉnh sửa</th>
        </tr>
        @if (!empty($listUser))
            @foreach ($listUser as $user=>$item)
            <tr>
                <td><a href="{{ route('admin.user.detail',['id'=>$item->user_id]) }}">{{ $item->username }}</a></td>
                <td>{{ $item->name }}</td>
                <td><a href="{{ route('admin.user.update',['id'=>$item->user_id]) }}">Sửa</a> | <a href="{{ route('admin.user.delete',['id'=>$item->user_id]) }}">Xóa</a></td>
            </tr>
            @endforeach

        @endif
    </table>
</div>
@endsection
