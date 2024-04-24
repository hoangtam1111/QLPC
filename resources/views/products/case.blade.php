<div class="homeProduct">
    <div class="blockTitle">
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <h2>CASE - THÙNG MÁY</h2>
                </a>
            </div>
            <div class="col-9">
                <ul class="list-title">
                    <li><a href="#">Xem tất cả</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blockContent block-3">
        <div class="row justify-content-center">
            <div id="recipeCarousel3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php
                        $i=0;
                        foreach($result3 as $row) {
                            if($i==0){?>
                    <div class="carousel-item active item-1">
                        <div class="col-lg-3 col-md-3">
                            <div class="card-product">
                                <div class="card">
                                    <img src="./content/images/product/<?php echo $row->Anh; ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a href="./detail.php?id=<?php echo $row->MaSP; ?>"><?php echo $row->TenSP; ?></a>
                                        <div style="color: red;"><?php echo number_format($row->Gia, 0, '.', ','); ?> đ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="carousel-item item-1">
                        <div class="col-lg-3 col-md-3">
                            <div class="card-product">
                                <div class="card">
                                    <img src="./content/images/product/<?php echo $row->Anh; ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a href="./detail.php?id=<?php echo $row->MaSP; ?>"><?php echo $row->TenSP; ?></a>
                                        <div style="color: red;"><?php echo number_format($row->Gia, 0, '.', ','); ?> đ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                            $i++;
                        };?>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel3" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="border-radius: 1px solid red; color: red;"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel3" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"
                        style="border-radius: 1px solid red; color: red;"></span>
                </a>
            </div>
        </div>
    </div>

</div>
