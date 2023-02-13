<div {{ $attributes->merge(['class' => 'card shop-list border-0 position-relative']) }}>
    <ul class="label list-unstyled mb-0">
        @if($product->isNew())
        <li>
            <a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a>
        </li>
        @endif
        <li>
            <a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">
                {{ $product->solds->sum('quantity') }} terjual
            </a>
        </li>
        @if($product->discount)
        <li>
            <a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a>
        </li>
        @endif
    </ul>
    <div class="shop-image position-relative overflow-hidden rounded shadow">
        <a href="shop-product-detail.html">
            <img src="{{ asset('assets') }}/images/shop/product/s1.jpg" class="img-fluid" alt="{{ $product->name }}"/>
        </a>
        <a href="shop-product-detail.html" class="overlay-work">
            <img src="{{ asset('assets') }}/images/shop/product/s-1.jpg" class="img-fluid" alt="{{ $product->name }}"/>
        </a>
        @if($product->quantity == 0)
        <div class="overlay-work">
            <div class="py-2 bg-soft-dark rounded-bottom out-stock">
                <h6 class="mb-0 text-center text-danger">Habis terjual</h6>
            </div>
        </div>
        @endif
        @if($product->quantity <= 5 && $product->quantity > 0)
        <div class="overlay-work">
            <div class="py-2 bg-soft-info rounded-bottom out-stock">
                <h6 class="mb-0 text-center">Stok terbatas ({{ $product->quantity }} pcs)</h6>
            </div>
        </div>
        @endif
        @auth
        <ul class="list-unstyled shop-icons">
            @if($product->quantity > 0)
            <li>
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-icon btn-pills btn-success">
                    <i data-feather="shopping-cart" class="icons"></i>
                </a>
            </li>
            <li class="mt-2">
                <a href="javascript:void(0)" class="btn btn-icon btn-pills btn-danger"><i data-feather="heart" class="icons"></i></a>
            </li>
            @endif
        </ul>
        @endauth
        @guest
        <ul class="list-unstyled shop-icons">
            <li>
                <a href="javascript:void(0)" class="btn btn-icon btn-pills btn-success" data-bs-toggle="modal" data-bs-target="#loginPopup">
                    <i data-feather="shopping-cart" class="icons"></i>
                </a>
            </li>
            <li class="mt-2">
                <a href="javascript:void(0)" class="btn btn-icon btn-pills btn-danger" data-bs-toggle="modal" data-bs-target="#loginPopup">
                    <i data-feather="heart" class="icons"></i>
                </a>
            </li>
        </ul>
        @endguest
    </div>
    <div class="card-body content pt-4 p-2 text-center">
        <a href="{{ route('product.show', $product->id) }}" class="text-dark product-name h6">{{ $product->name }}</a>
        <div class="d-flex justify-content-center mt-1">
            <h7 class="text-dark small fst-italic mb-0 mt-1">
                Rp. {{ number_format($product->finalPrice()) }}
                @if($product->discount)
                    <del class="text-danger ms-2">{{ $product->price }}</del>
                @endif
            </h7>
            {{-- <ul class="list-unstyled text-warning mb-0">
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
            </ul> --}}
        </div>
    </div>
</div>

