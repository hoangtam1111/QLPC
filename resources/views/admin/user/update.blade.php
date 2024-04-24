@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/Users.css') }}">
    <div class="container">
        <form method="post" action="{{ route('admin.user.post-update') }}" enctype="multipart/form-data">
            <div class="login">
                <h2>Chỉnh sửa thông tin tài khoản</h2>
                <input type="hidden" name="user_id" value="{{ $user->user_id }}" />
                <input type="text" class="form-control" name="name" placeholder="Họ Tên"
                    value="{{ old('name') ?? $user->name }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="email" class="form-control" name="email" placeholder="Email của bạn"
                    value="{{ old('email') ?? $user->email }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                    value="{{ old('address') ?? $user->address }}" />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @csrf
                <div class="action">
                    <button type="submit" class="btn action-1">Lưu</button>
                    <a href="./index.php" class="btn action-2">Quay lại trang user</a>
                </div>
            </div>
        </form>
    </div>
@endsection
