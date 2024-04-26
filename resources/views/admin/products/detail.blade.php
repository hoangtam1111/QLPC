@extends('layouts.app')
@section('content')
<link href="{{ asset('css/productDetail.css') }}" rel="stylesheet" />
<div class="container">
    <div class="product">
        <div class="row">
            <h2>Tên sản phẩm: {{ $product->name }}</h2>
            <div class="col-lg-6 col-md-6 col-12">
                <img src="{{ asset('storage/product/'.$product->photo.'') }}" style="max-width: 300px;" />
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h3 class="product__price">
                    Giá tiền: {{ $product->price_format($product->price) }}
                </h3>
                <div class="product__info">
                    <h4>Thông tin sản phẩm</h4>
                    {{ $product->description }}
                </div>
                <div>
                    <a href="{{ route('admin.product.index') }}" class="btn action-1">Quay lại QL sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
