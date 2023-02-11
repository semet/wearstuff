<x-layouts.main>
    <x-slot:title>
        Checkout
    </x-slot:title>
    <x-partials.page-title title="Checkout"/>

    <section class="section">
        <div class="container">
            <div class="row">

                {{-- Cart Sidebar --}}
                <x-checkout.cart-sidebar/>

                <div class="col-md-7 col-lg-8">
                    <div class="card rounded shadow p-4 border-0">
                        <h4 class="mb-3">Alamat Pengiriman</h4>
                        <form class="needs-validation" novalidate method="post" action="{{ route('checkout.choose.delivery.service') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" value="{{ auth()->user()->name }}" disabled readonly/>
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="No. Telepon" value="{{ auth()->user()->phone }}" disabled readonly/>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ auth()->user()->email }}" disabled readonly/>
                                </div>

                                @if($address->isNotEmpty())
                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <select name="address" id="address" class="form-select" required>
                                        <option value="" selected>--Pilih Alamat--</option>
                                        @foreach ($address as $ad)
                                            <option value="{{ $ad->id }}">{{ $ad->line }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Silakan pilih alamat pengiriman
                                    </div>
                                </div>
                                @else
                                <p class="text-danger">Anda belum mendaftarkan alamat. Silakan daftarkan <a href="#" data-bs-toggle="modal" data-bs-target="#addressAddPopup">sekarang</a></p>
                                @endif
                                <div class="col-12 my-4">
                                    <label for="courier" class="form-label">Kurir</label>
                                    <select name="courier" id="courier" class="form-select" required>
                                        <option value="" selected>--Pilih Kurir--</option>
                                        @foreach ($couriers as $courier)
                                            <option value="{{ $courier->code }}">{{ $courier->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Silakan pilih Kurir
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="w-100 btn btn-primary" type="submit">Pilih Layanan Pengiriman</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

</x-layouts.main>
