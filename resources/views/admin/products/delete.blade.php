@extends('layouts.app')
@section('content')
<link href="{{ asset('css/productDetail.css') }}" rel="stylesheet" />

<div class="container">
    <form  method="post" action="{{ route('admin.product.post-delete') }}" enctype="multipart/form-data" class="d-flex">
        @csrf
        <div class="product">
            <input type="hidden" name="id" value="{{ $product->id }}" />
            <div class="row">
                <h2>Tên sản phẩm: {{ $product->name }}</h2>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="{{ asset('storage/product/'.$product->photo.'') }}" />
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="product__price">
                        Giá tiền: {{ $product->price_format($product->price) }}
                    </h3>
                    <h3 class="product__price">
                        Số lượng: {{ $product->quantity }}
                    </h3>
                    <div class="product__info">
                        <h4>Thông tin sản phẩm</h4>
                        {{ $product->description }}
                    </div>
                    <h2>Bạn có muốn xoá ?</h2>
                    <ul class="list-action">
                        <li>
                            <button class="btn buy action-1" type="submit">Xoá</button>
                        </li>
                        <li>
                            <a href="{{ route('admin.product.index') }}" class="btn action-2">Huỷ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
