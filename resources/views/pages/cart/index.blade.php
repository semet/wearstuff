<x-layouts.main>
    <x-slot:title>
        Keranjang
    </x-slot:title>
    <x-partials.page-title title="Keranjang anda"/>
    {{--  --}}
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom py-3" style="min-width:20px "></th>
                                    <th class="border-bottom text-start py-3" style="min-width: 300px;">Product</th>
                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">Price</th>
                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">Qty</th>
                                    <th class="border-bottom text-end py-3 pe-4" style="min-width: 160px;">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart->items() as $item)
                                <tr class="shop-list">
                                    <td class="h6 text-center"><a href="javascript:void(0)" class="text-danger"><i class="uil uil-times"></i></a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets') }}/images/shop/product/s1.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                            <h6 class="mb-0 ms-3">{{ $item->product->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp. {{ number_format($item->product->finalPrice()) }}</td>
                                    <td class="text-center qty-icons">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="text-end fw-bold pe-4">Rp. {{ number_format($item->product->priceWithQuantity($item->quantity)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-8 col-md-6 mt-4 pt-2">
                    <a href="{{ route('home') }}" class="btn btn-primary">Shop More</a>
                </div>
                <div class="col-lg-4 col-md-6 ms-auto mt-4 pt-2">
                    <div class="table-responsive bg-white rounded shadow">
                        <table class="table table-center table-padding mb-0">
                            <tbody>
                                <tr>
                                    <td class="h6 ps-4 py-3">Subtotal</td>
                                    <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->subTotal())}}</td>
                                </tr>
                                <tr>
                                    <td class="h6 ps-4 py-3">PPN (10%)</td>
                                    <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->getTax())}}</td>
                                </tr>
                                <tr class="bg-light">
                                    <td class="h6 ps-4 py-3">Grand Total</td>
                                    <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->grandTotal())}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 pt-2 text-end">
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to checkout</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

</x-layouts.main>
