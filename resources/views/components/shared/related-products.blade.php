<div class="container mt-100 mb-4">
    <div class="row">
        <div class="col-12">
            <h5 class="mb-0">Related Products</h5>
        </div><!--end col-->

        <div class="col-12 mt-4">
            <div class="tiny-four-item">
                @foreach ($relatedProducts as $product)
                <div class="tiny-slide">
                    <x-shared.product-card-simple :product="$product" class="m-2"/>
                </div>
                @endforeach
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
