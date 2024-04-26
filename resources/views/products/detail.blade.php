@extends('layouts.app')
@section('content')
    <link href="./content/css/productDetail.css" rel="stylesheet" />
    <div class="container">
        <div class="product mb-5">
            <div class="row">
                <h2 class="mt-5 mb-5 bg-secondary p-3 text-white">{{ $product->name }}</h2>
                <div class="col-lg-6 col-md-6 col-12">
                    <img class="p-3"
                        style="border:solid 1px #cdcdcd; box-shadow: 2px 2px 1px 2px #cdcdcd; border-radius: 5px; width: 50%;"
                        src="{{ asset('storage/product/' . $product->photo . '') }}" />
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="product__price mt-2 pt-3 pd-bottom-12">
                        Giá: {{ $product->price_format( $product->price) }}
                    </h3>
                    <hr />
                    <div class="product__info">
                        <h4>Thông tin sản phẩm</h4>
                        {{ $product->description }}
                    </div>
                    <ul class="list-action">
                        <li>
                            <form action="/product/buy" class="d-flex">
                                <button class="btn buy action-1" type="submit">Mua ngay</i></button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('cart.insert-cart') }}" method="post" enctype="multipart/form-data" class="d-flex">
                                @csrf
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <button class="btn action-2" type="submit">Thêm vào giỏ hàng</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
