<x-layouts.main>
    <x-slot:title>
        Preview
    </x-slot:title>
    <x-partials.page-title title="Preview Order Detail"/>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-10 mx-auto">
                    <div class="card rounded shadow p-4 border-0">
                        {{-- Customer Information --}}
                        <h4 class="mb-3"># Data diri anda</h4>
                        <table class="table table-hover">
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>{{ auth()->user()->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                        </table>
                        <h4 class="my-3"># Alamat Pengiriman</h4>
                        <table class="table table-hover">
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>{{ auth()->user()->shippingAddress[0]->line }}</td>
                            </tr>
                        </table>
                        <h4 class="my-3"># Keterangan Kurir</h4>
                        <table class="table table-hover">
                            <tr>
                                <th scope="row">Nama Layanan</th>
                                <td>{{ $order->deliveryService->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Keterangan</th>
                                <td>{{ $order->deliveryService->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Biaya</th>
                                <td>{{ $order->deliveryService->cost }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Estimasi</th>
                                <td>{{ $order->deliveryService->estimated_day }}</td>
                            </tr>
                        </table>
                        <h4 class="my-3"># Pesanan</h4>
                        <table class="table mb-0 table-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom text-start py-3" style="min-width: 300px;">Produk</th>
                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">Harga</th>
                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">Qty</th>
                                    <th class="border-bottom text-end py-3 pe-4" style="min-width: 160px;">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart->items() as $item)
                                <tr class="shop-list">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets') }}/images/shop/product/s1.jpg" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                            <h6 class="mb-0 ms-3">{{ $item->product->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="text-center pt-4">Rp. {{ number_format($item->product->finalPrice()) }}</td>
                                    <td class="text-center qty-icons pt-4">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="text-end fw-bold pe-4 pt-4">Rp. {{ number_format($item->product->priceWithQuantity($item->quantity)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-responsive bg-white rounded shadow">
                            <table class="table table-center table-padding mb-0">
                                <tbody>
                                    <tr>
                                        <td class="h6 ps-4 py-3">Subtotal</td>
                                        <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->subTotal())}}</td>
                                    </tr>

                                    <tr>
                                        <td class="h6 ps-4 py-3">Ongkir</td>
                                        <td class="text-end fw-bold pe-4">Rp. {{ number_format($order->deliveryService->cost)}}</td>
                                    </tr>

                                    <tr>
                                        <td class="h6 ps-4 py-3">PPN (10%)</td>
                                        <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->getTax())}}</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="h6 ps-4 py-3">Grand Total</td>
                                        <td class="text-end fw-bold pe-4">Rp. {{ number_format($cart->totalPiceWithDelivery($order->deliveryService->cost))}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- Pay Button --}}
                        <div class="mt-4">
                            <button class="w-100 btn btn-primary" type="button" id="pay-button">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault();

                snap.pay('{{ $snapToken }}', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                        window.location.href = '{{ route('checkout.success', $order) }}'
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                        window.location.href = '{{ route('checkout.pending', $order) }}'
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                    },
                    onClose: function(){
                        location.reload();
                    }
                });
            });
        </script>
    @endpush
</x-layouts.main>
