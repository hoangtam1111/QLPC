<div class="homeProduct">
    <div class="blockTitle">
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <h2>CPU</h2>
                </a>
            </div>
            <div class="col-9">
                <ul class="list-title">
                    <li><a href="#">Core 3</a></li>
                    <li><a href="#">Core 5</a></li>
                    <li><a href="#">Core 7</a></li>
                    <li><a href="#">Xem tất cả</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blockContent">
        <div class="row justify-content-center">
            <div id="recipeCarousel1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @php
                        $i=0
                    @endphp
                    @foreach ($products1 as $row)
                        <div class="carousel-item {{ $i==0  ? 'active':' ' }} item-1">
                            <div class="col-lg-3 col-md-3">
                                <div class="card-product">
                                    <div class="card">
                                        <img src="{{ asset('storage/product/'.$row->photo.'') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="{{ route('products.detail',$row->id) }}"><?php echo $row->name?></a>
                                            <div style="color: red;"><?php echo number_format($row->price, 0, ".", ",") ?> đ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel1" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel1" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                </a>
            </div>
        </div>
    </div>

</div>
<script>
    let items = document.querySelectorAll('.blockContent .carousel .item-1')
items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

</script>
