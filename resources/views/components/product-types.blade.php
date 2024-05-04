<div class="nav-sidebar__list">
    <ul>
        @if (!empty($product_types))
            @foreach ($product_types as $type)
                <li class="li-child">
                    <a href="#">
                        <span>{{ $type->type_name }}</span>
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
