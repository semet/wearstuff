<x-layouts.main>
    <x-slot:title>
        Inoice
    </x-slot:title>
    {{-- <x-partials.page-title title="Invoice"/> --}}
    <section class="bg-invoice bg-light">
        <div class="container">
            <div class="row mt-5 pt-4 pt-sm-0 justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow rounded border-0">
                        <div class="card-body">
                            <div class="invoice-top pb-4 border-bottom">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="logo-invoice mb-2">{{ str_replace('_', ' ', config('app.name')) }}<span class="text-primary">.</span></div>
                                        <a href="javascript:void(0)" class="text-primary h6"><i data-feather="link" class="fea icon-sm text-muted me-2"></i>www.originlombok.com</a>
                                    </div><!--end col-->

                                    <div class="col-md-4 mt-4 mt-sm-0">
                                        <h5>Alamat :</h5>
                                        <dl class="row mb-0">
                                            <dt class="col-2 text-muted"><i data-feather="map-pin" class="fea icon-sm"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" data-type="iframe" class="video-play-icon text-muted lightbox">
                                                    <p class="mb-0">JL Raya Ganti, Desa Sengkerang</p>
                                                    <p class="mb-0">Kec. Praya Timur, Kab. Lombok Tengah</p>
                                                </a>
                                            </dd>

                                            <dt class="col-2 text-muted"><i class="uil uil-envelope"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="mailto:contact@example.com" class="text-muted">info@originlombok.com</a>
                                            </dd>

                                            <dt class="col-2 text-muted"><i data-feather="phone" class="fea icon-sm"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="tel:+152534-468-854" class="text-muted">(+62) 877-3669-0307</a>
                                            </dd>
                                        </dl>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <div class="invoice-middle py-4">
                                <h5>Invoice Details :</h5>
                                <div class="row mb-0">
                                    <div class="col-md-8 order-2 order-md-1">
                                        <dl class="row">
                                            <dt class="col-md-3 col-5 fw-normal">No. :</dt>
                                            <dd class="col-md-9 col-7 text-muted">{{ $order->number }}</dd>

                                            <dt class="col-md-3 col-5 fw-normal">Nama :</dt>
                                            <dd class="col-md-9 col-7 text-muted">{{ $order->user->name }}</dd>

                                            <dt class="col-md-3 col-5 fw-normal">Alamat :</dt>
                                            <dd class="col-md-9 col-7 text-muted">
                                                <p class="mb-0">{{ $order->deliveryService->address->line }},</p>
                                                <p class="mb-0">
                                                    {{ $order->deliveryService->address->building_number ? 'No. '.$order->deliveryService->address->building_number : ''}}
                                                </p>
                                            </dd>

                                            <dt class="col-md-3 col-5 fw-normal">No. Telepon :</dt>
                                            <dd class="col-md-9 col-7 text-muted">{{ $order->user->phone }}</dd>
                                        </dl>
                                    </div>

                                    <div class="col-md-4 order-md-2 order-1 mt-2 mt-sm-0">
                                        <dl class="row mb-0">
                                            <dt class="col-md-4 col-5 fw-normal">Date :</dt>
                                            <dd class="col-md-8 col-7 text-muted">{{ $order->created_at->toFormattedDateString() }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-table pb-4">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table mb-0 table-center invoice-tb">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-bottom text-start">No.</th>
                                                <th scope="col" class="border-bottom text-start">Item</th>
                                                <th scope="col" class="border-bottom">Qty</th>
                                                <th scope="col" class="border-bottom">Harga</th>
                                                <th scope="col" class="border-bottom">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $item)
                                            <tr>
                                                <th scope="row" class="text-start">{{ $loop->iteration }}</th>
                                                <td class="text-start">{{ $item->product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Rp. {{ number_format($item->product->price) }}</td>
                                                <td>Rp. {{ number_format($item->product->price * $item->quantity) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-5 ms-auto">
                                        <ul class="list-unstyled h6 fw-normal mt-4 mb-0 ms-md-5 ms-lg-4">
                                            <li class="text-muted d-flex justify-content-between mt-4">Ongkir :<span>Rp. {{ number_format($order->deliveryService->cost) }}</span></li>
                                            <li class="text-muted d-flex justify-content-between mt-4">
                                                Taxes :<span>Rp. {{ number_format($order->getTax()) }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between mt-4">Total :<span>Rp. {{ $order->total_price }}</span></li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <div class="invoice-footer border-top pt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-sm-start text-muted text-center">
                                            <h6 class="mb-0">Customer Services : <a href="tel:+152534-468-854" class="text-warning">(+12) 1546-456-856</a></h6>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="text-sm-end text-muted text-center">
                                            <button class="btn btn-primary">Belanja lagi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

</x-layouts.main>
