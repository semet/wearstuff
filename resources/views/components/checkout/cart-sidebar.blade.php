<div class="col-md-5 col-lg-4 order-md-last">
    <div class="card rounded shadow p-4 border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="h5 mb-0">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
        </div>
        <ul class="list-group mb-3 border">
            @foreach ($cart->items() as $item)
            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                <div>
                    <h6 class="my-0">{{ $item->product->name }}</h6>
                    <small class="text-muted">Rp. {{ number_format($item->product->finalPrice()) }} x {{ $item->quantity }}</small>
                </div>
                <span class="text-muted">Rp. {{ number_format($item->product->priceWithQuantity($item->quantity)) }}</span>
            </li>
            @endforeach
            <li class="d-flex justify-content-between bg-light p-3 border-bottom">
                <div class="text-info">
                    <h6 class="my-0">PPN 10%</h6>
                </div>
                <span class="text-info">Rp. {{ number_format($cart->getTax())}}</span>
            </li>
            <li class="d-flex justify-content-between p-3">
                <span>(IDR)</span>
                <strong>Rp. {{ number_format($cart->grandTotal())}}</strong>
            </li>
        </ul>

        {{-- <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
        </form> --}}
    </div>
</div>
