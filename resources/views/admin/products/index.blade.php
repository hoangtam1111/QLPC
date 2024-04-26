@extends('layouts.app')
@section('content')
<link href="{{ asset('css/productIndex.css') }}" rel="stylesheet" />
<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">Trang chủ</a> /
            </li>
            <li>
                <a href="{{ route('admin.product.index')  }}">Sản phẩm</a> /
            </li>
        </ul>
    </div>
    <a href="{{ route('admin.product.insert')  }}"><h2>Thêm sản phẩm</h2></a>
    <div class="row">
        @if(count($products)>0)

            <div class="col-6">
                <h2>{{ count($products) }} sản phẩm</h2>
            </div>
            <div class="col-6">
                <div class="dropdown">
                    {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=name">Sắp xếp theo tên</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=price">Sắp xếp theo giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=priceDesc">Sắp xếp theo giá giảm dần</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=type">Sắp xếp theo loại linh kiện</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=brand">Sắp xếp theo hãng</a></li>
                    </ul> --}}
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hãng</th>
                    <th>Loại</th>
                    <th>Chỉnh sửa</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/product/'.$product->photo.'') }}" style="height: 50px" class="card-img-top" alt="">
                        </td>
                        <td><a href="{{ route('admin.product.detail',$product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->price_format($product->price) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>{{ $product->product_type->type_name }}</td>
                        <td><a href="{{ route('admin.product.update',$product->id) }}">Sửa</a> | <a href="{{ route('admin.product.delete',$product->id) }}">Xóa</a></td>
                    </tr>
                @endforeach

            </table>
        @endif

    </div>
</div>
@endsection
