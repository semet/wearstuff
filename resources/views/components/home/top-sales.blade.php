<div class="container mt-100 mt-60">
    <div class="row">
        <div class="col-12">
            <h5 class="mb-0">Produk Terlaris</h5>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <x-shared.product-card-simple :product="$product"/>
            </div>
        @endforeach

    </div>
    <!--end row-->
</div>
