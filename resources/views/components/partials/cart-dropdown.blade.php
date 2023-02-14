<li class="list-inline-item mb-0 mx-2">
    @auth
    <div class="dropdown">
        <button
            type="button"
            class="btn btn-icon btn-pills btn-primary dropdown-toggle position-relative"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <span class="class badge bg-danger rounded-circle position-absolute" style="top: -6px; left: -16px">
                {{ $cart->items()->sum('quantity') }}
            </span>
            <i data-feather="shopping-cart" class="icons"></i>
        </button>
        <div
            class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-4"
            style="width: 400px"
        >
            <div class="pb-4">
                @foreach ($cart->items() as $item)
                <a href="javascript:void(0)" class="d-flex align-items-center @if($loop->iteration !== 1) mt-4 @endif">
                    <img
                        src="{{ asset('assets') }}/images/shop/product/s-1.jpg"
                        class="shadow rounded"
                        style="max-height: 64px"
                        alt=""
                    />
                    <div class="flex-1 text-start ms-3">
                        <h6 class="text-dark mb-0">{{ $item->product->name }}</h6>
                        <p class="text-muted mb-0">Rp. {{ number_format($item->product->finalPrice()) }} X {{ $item->quantity }}</p>
                    </div>
                    <h6 class="text-dark mb-0">Rp. {{ number_format($item->product->priceWithQuantity($item->quantity)) }}</h6>
                </a>
                @endforeach

            </div>

            <div
                class="d-flex align-items-center justify-content-between pt-4 border-top my-2"
            >
                <h6 class="text-dark mb-0">Sub Total:</h6>
                <h6 class="text-dark mb-0">Rp. {{ number_format($cart->subTotal())}}</h6>
            </div>
            <div
                class="d-flex align-items-center justify-content-between pt-4 border-top my-2"
            >
                <h6 class="text-dark mb-0">Tax (10%):</h6>
                <h6 class="text-dark mb-0">Rp. {{ number_format($cart->getTax())}}</h6>
            </div>
            <div
                class="d-flex align-items-center justify-content-between pt-4 border-top my-2"
            >
                <h6 class="text-dark mb-0">Grand Total(Rp-IDR):</h6>
                <h6 class="text-dark mb-0">Rp. {{ number_format($cart->grandTotal())}}</h6>
            </div>

            <div class="my-4 d-flex justify-content-between">
                <a href="{{ route('cart') }}" class="btn btn-success">View Cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
            </div>
            <p class="text-muted text-start mt-1 mb-0">*T&C Apply</p>
        </div>
    </div>
    @endauth

    @guest
    <a
        type="button"
        class="btn btn-icon btn-pills btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#loginPopup"
    >

        <i data-feather="shopping-cart" class="icons"></i>
    </a>
    @endguest
</li>
