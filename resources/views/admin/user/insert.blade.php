@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/Users.css') }}">
<div class="container">
    <form method="post" action="{{ route('admin.user.post-insert') }}" enctype="multipart/form-data">
        <div class="login">{{ old('admin') }}
            <h2>Tạo mới tài khoản</h2>
            <input type="text" class="form-control" name="name" placeholder="Họ Tên" value="{{ old('name') }}"/>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="email" class="form-control" name="email" placeholder="Email của bạn" value="{{ old('email') }}" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ old('address') }}" />
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" class="form-control" name="username" placeholder="Tài khoản" value="{{ old('username') }}" />
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="password" class="form-control" name="oassword" placeholder="Nhập mật khẩu" value="{{ old('password') }}" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                Admin<?php if(empty(old('admin'))){ ?>
                        <input type="checkbox" name="Admin" id="">
                    <?php } else{?>
                        <input type="checkbox" name="Admin" id="" checked>
                    <?php }?>

            </div>
            @csrf
            <div class="action">
                <button type="submit" class="btn action-1">Lưu</button>
                <a href="{{ route('admin.user.index') }}" class="btn action-2">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
@endsection
