@extends('layouts.app')
@section('content')
<link href="{{ asset('css/GioHang.css') }}" rel="stylesheet" />
<div class="container">
<div class="row">
    <h2>Giỏ Hàng</h2>
    @if (count($carts)>0)
    <div class="col-lg-9 col-md-12 col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn Giá</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <?php $total=0 ?>
            @foreach ($carts as $cart)

                <tbody>
                    <tr>
                        <?php
                        $price=$cart->product->price*$cart->quantity;
                        $total+=$price;
                        ?>
                        <td><img src="{{ asset('storage/product/'.$cart->product->photo.'') }}" alt="Alternate Text" /></td>
                        <td><a href="{{ route('products.detail',$cart->product->id) }}">{{ $cart->product->name }}</a></td>
                        <td>
                            <form action="{{ route('cart.update-cart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cart->id }}" />
                                <input type="number" class="num" name="quantity" value="{{ $cart->quantity }}" min="1" />
                                <button class="btn" class="update" type="submit"></button>
                            </form>
                        </td>
                        <td>{{ $cart->product->price_format($cart->product->price) }}</td>
                        <td>{{ $cart->price_format($price) }}</td>
                        <td>
                            <form action="{{ route('cart.delete-cart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cart->id }}">
                                <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>
    <div class="col-lg-3 col-md-12 col-12">
        <div class="row">
            <div class="col-6">Tổng tiền</div>
            <div class="col-6">{{ $carts[0]->product->price_format($total) }}</div>
        </div>
        <div class="row action-product">
            <div class="col-6">
                <a href="{{ route('products.index') }}" class="btn action-1">TIẾP TỤC MUA</a>
            </div>
            <div class="col-6">
                <form action="{{ route('order.buy') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button class="btn action-2" type="submit">THANH TOÁN</button>
                </form>
            </div>
        </div>
    </div>
    @else
        <div class="info-none-product">
            <img src="https://theme.hstatic.net/200000420363/1001121558/14/empty_cart.png?v=680" width="30%" />
            <h3>Không có sản phẩm nào trong giỏ hàng</h3>
            <a href="{{ route('products.index') }}" class="btn">Quay trở lại trang sản phẩm</a>
        </div>
    @endif

</div>

@endsection
