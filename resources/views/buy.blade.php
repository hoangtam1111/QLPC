@extends('layouts.app')
@section('content')
    @if (count($products)>0)
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="text-align: center;"><img src="{{ asset('storage/layout/logo.jpg') }}" alt="Alternate Text" style="max-width: 300px;" /></div>
                <h2>Phiếu hóa đơn TINHOCNGOISAO.COM</h2>
                <table class="table table-bordered">
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/product/'.$product->product->photo.'') }}" style="height: 50px" class="card-img-top" alt="">
                            </td>
                            <td>
                                <h5>{{ $product->product->name }}</h5>
                                <span>Giá: <strong>{{ $product->product->price_format($product->product->price) }}</strong></span>
                                <span>Số lượng: <strong>{{ $product->quantity }}</strong></span>
                                <span>Thành tiền: <strong>{{ $product->product->price_format($product->product->price*$product->quantity) }} đ</strong></span>
                            </td>
                        </tr>
                    @endforeach>
                </table>
                <h4>Tổng tiền: <strong>{{ $product->product->price_format($total) }}</strong></h4>
            </div>
        </div>
    </div>
    @else
        <h2 class="text-danger">KHÔNG TÌM THẤY SẢN PHẨM</h2>
    @endif
@endsection
