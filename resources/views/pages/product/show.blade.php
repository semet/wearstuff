<x-layouts.main>
    <x-slot:title>
        Detail Produk
    </x-slot:title>
    <x-partials.page-title title="Detail Produk"/>

    <section class="section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="tiny-single-item">
                        <div class="tiny-slide"><img src="{{ asset('assets') }}/images/shop/product/single-2.jpg" class="img-fluid rounded" alt=""></div>
                        <div class="tiny-slide"><img src="{{ asset('assets') }}/images/shop/product/single-3.jpg" class="img-fluid rounded" alt=""></div>
                        <div class="tiny-slide"><img src="{{ asset('assets') }}/images/shop/product/single-4.jpg" class="img-fluid rounded" alt=""></div>
                        <div class="tiny-slide"><img src="{{ asset('assets') }}/images/shop/product/single-5.jpg" class="img-fluid rounded" alt=""></div>
                        <div class="tiny-slide"><img src="{{ asset('assets') }}/images/shop/product/single-6.jpg" class="img-fluid rounded" alt=""></div>
                    </div>
                </div><!--end col-->

                <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ms-md-4">
                        <h4 class="title">{{ strtoupper($product->name) }}</h4>
                        <h5 class="text-muted">
                            Rp. {{ number_format($product->finalPrice()) }}
                            @if($product->discount)
                                <del class="text-danger ms-2">{{ $product->price }}</del>
                            @endif
                        </h5>
                        {{-- <ul class="list-unstyled text-warning h5 mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        </ul> --}}

                        <h5 class="mt-4 py-2">Overview :</h5>
                        <p class="text-muted">
                            {{ $product->overview }}
                        </p>

                        {{-- <ul class="list-unstyled text-muted">
                            <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span> Digital Marketing Solutions for Tomorrow</li>
                            <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span> Our Talented &amp; Experienced Marketing Agency</li>
                            <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span> Create your own skin to match your brand</li>
                        </ul> --}}

                        <div class="row mt-4 pt-2">
                            <div class="col-lg-6 col-12">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Size:</h6>
                                    <ul class="list-unstyled mb-0 ms-3">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">
                                                {{ $product->size }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <div class="d-flex shop-list align-items-center">
                                    <h6 class="mb-0">Quantity:</h6>
                                    <div class="qty-icons ms-3">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                        <input min="1" name="quantity" id="productQuantity" value="1" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="mt-4 pt-2">
                            <a href="javascript:void(0)" class="btn btn-primary shadow shadow-lg" onclick="addToCart('{{ $product->id }}')">
                                <i data-feather="shopping-cart" class="icons"></i>
                                Add to Cart
                            </a>
                            <a href="javascript:void(0)" class="btn btn-danger ms-2 shadow shadow-lg">
                                <i data-feather="heart" class="icons"></i>
                                Add to Wishlist
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <x-shared.product-details :product="$product"/>
        {{-- related product by the same category --}}
        <x-shared.related-products :category="$product->category->id"/>

    </section>
    @push('scripts')
        <script src={{ asset('assets/js/common/cart.js') }}></script>
    @endpush
</x-layouts.main>
