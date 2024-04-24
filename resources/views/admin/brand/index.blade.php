@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/productIndex.css') }}">
    <div class="container">
        <div class="insBreadcrumbs">
            <ul>
                <li>
                    <a href="../home">Trang chủ</a> /
                </li>
                <li>
                    <a href="#">Thương hiệu</a> /
                </li>
            </ul>
        </div>
        <a href="{{ route('admin.brand.insert') }}">Thêm thương hiệu mới</a>
        <table class="table table-bordered">
            <tr>
                <th>Tên thương hiệu</th>
                <th>Logo</th>
                <th>Chỉnh sửa</th>
            </tr>
            @if (!@empty($listBrand))
                @foreach ($listBrand as $brand => $item)
                    <tr>
                        <td>{{ $item->brand_name }}</td>
                        <td><img src="{{ $item->brand_logo }}" alt="Alternate Text" style="width:50px" /></td>
                        <td><a href="{{ route('admin.brand.update', ['id' => $item->brand_id]) }}">Sửa</a> | <a
                                href="{{ route('admin.brand.delete', ['id' => $item->brand_id]) }}">Xóa</a></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
