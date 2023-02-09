<div class="container mt-100 mt-60">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
                <li class="nav-item m-1">
                    <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                        <div class="text-center">
                            <h6 class="mb-0">Description</h6>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item m-1">
                    <a class="nav-link py-2 px-5 rounded" id="additional-info" data-bs-toggle="pill" href="#additional" role="tab" aria-controls="additional" aria-selected="false">
                        <div class="text-center">
                            <h6 class="mb-0">Additional Information</h6>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item m-1">
                    <a class="nav-link py-2 px-5 rounded" id="review-comments" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false">
                        <div class="text-center">
                            <h6 class="mb-0">Review</h6>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->
            </ul>

            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
                    <p class="text-muted mb-0">
                        {{-- preview --}}
                        {{ $product->description }}
                    </p>
                </div>

                <div class="card border-0 tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-info">
                    <p class="text-muted mb-0">
                        {{ $product->additional_info }}
                    </p>
                </div>

                <div class="card border-0 tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-comments">
                    <x-shared.product-review-tab :reviews="$product->reviews"/>
                </div>
            </div>
        </div>
    </div>
</div><!--end container-->
