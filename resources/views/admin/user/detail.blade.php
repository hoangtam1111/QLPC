@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/Users.css') }}">
    <div class="container">
        <h2>Thông tin user</h2>
        @if (!empty($user))
            <table class="table table-bordered">
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
            </table>
        @endif
        <a href="{{ route('admin.user.index') }}" class="btn action-1">Quay lại trang user</a>
    </div>
@endsection
