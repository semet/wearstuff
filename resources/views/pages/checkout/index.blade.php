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
                        <form class="needs-validation" novalidate>
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

                                @if(!is_null(auth()->user()->shippingAddress))
                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <select name="address" id="address" class="form-select">
                                        <option value="" selected>--Pilih Alamat--</option>
                                        @foreach (auth()->user()->shippingAddress as $address)
                                            <option value="{{ $address->id }}">{{ $address->line }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                @else
                                <p class="text-danger">Anda belum mendaftarkan alamat. Silakan daftarkan <a href="#" data-bs-toggle="modal" data-bs-target="#addressAddPopup">sekarang</a></p>
                                @endif
                                <div class="mt-4">
                                    <button class="w-100 btn btn-primary" type="submit">Continue to checkout</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

</x-layouts.main>
