@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/Users.css') }}">
<div class="container">
    <form method="post" action="{{ route('admin.user.post-delete') }}" enctype="multipart/form-data">
        <div class="login">
            <h2>Xóa tài khoản</h2>
            <table class="table table-bordered">
                <input type="hidden" name="user_id" value="{{ $user->user_id }}" />
                <tr>
                    <td>Tài khoản</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{ $user->address }}</td>
                </tr>
                @csrf
            </table>
            <div class="action">
                <button type="submit" class="btn action-1">Xóa</button>
                <a href="./index.php" class="btn action-2">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
@endsection
