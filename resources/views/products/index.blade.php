@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/productIndex.css') }}" rel="stylesheet" />
    <div class="container">
        <div class="row">
            <div class="insBreadcrumbs">
                <ul>
                    <li>
                        <a href="/home/index">Trang chủ</a> /
                    </li>
                    <li>
                        <a href="/product/index">Sản phẩm</a> /
                    </li>
                </ul>
            </div>
            <img class="img-banner"
                src="https://file.hstatic.net/200000420363/collection/head-muc-freeship__3__c83c99ea41d643c5b847c293fd2e4794.jpg"
                alt="Alternate Text" />
        </div>

        <!-- Brand -->
        {{-- <div class="row">
            <h2>Thương hiệu</h2>
            <?php foreach($brand as $each){
            global $MaLoai;?>
            <div class="brand-item col">
                <a href="./products.php?search=<?php echo $search; ?>&loaiSP=<?php echo $MaLoai; ?>&brand=<?php echo $each->BrandId; ?>">
                    <img src="<?php echo $each->BrandLogo; ?>" alt="Alternate Text" />
                </a>
            </div>
            <?php }?>
        </div>
        <div class="row">
            <h2>Linh kiện</h2>
            <ul class="loai-item">
                <?php foreach($productType as $each){
            global $brandId;?>
                <li>
                    <a
                        href="./products.php?search=<?php echo $search; ?>&loaiSP=<?php echo $each->MaLoai; ?>&brand=<?php echo $brandId; ?>">
                        <span><?php echo $each->TenLoai; ?></span>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div> --}}
        <div class="row">
            <h2> sản phẩm</h2>
            @if (count($products) > 0)
                @foreach ($products as $pro => $each)
                    <div class="col-lg-2 col-md-4 col-4">
                        <div class="card-product">
                            <div class="card">
                                <img src="{{ asset('storage/product/' . $each->photo . '') }}" class="card-img-top"
                                    alt="">
                                <div class="card-body">
                                    <a href="{{ route('products.detail', $each->id) }}">{{ $each->name }}</a>
                                    <div style="color: red;">{{ $each->price }} đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Không tìm thấy sản phẩm</h2>
            @endif


            {{-- <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link"
                        href="./products.php?search=<?php echo $search; ?>&loaiSP=<?php echo $MaLoai; ?>&brand=<?php echo $brandId; ?>&pages=<?php echo $PrevPage; ?>">Pre</a>
                </li>
                <?php for($i = 1; $i <= $num_page; $i++){?>
                <li class="page-item">
                    <a class="page-link"
                        href="./products.php?search=<?php echo $search; ?>&loaiSP=<?php echo $MaLoai; ?>&brand=<?php echo $brandId; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php }?>
                <li class="page-item">
                    <a class="page-link"
                        href="./products.php?search=<?php echo $search; ?>&loaiSP=<?php echo $MaLoai; ?>&brand=<?php echo $brandId; ?>&pages=<?php echo $NextPage; ?>">Next</a>
                </li>
            </ul> --}}

        </div>
    </div>
@endsection
