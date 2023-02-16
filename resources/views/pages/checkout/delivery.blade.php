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
                        <h4 class="mb-3">Layanan Pengiriman</h4>
                        <form class="row" action="{{ route('checkout.insert.data') }}" method="POST" id="deliveryServiceForm">
                            @csrf
                            <input type="hidden" name="selectedAddress" id="selectedAddress" value="{{ $selectedAddress }}">
                            <input type="hidden" name="service" id="service">
                            <input type="hidden" name="description" id="description">
                            <input type="hidden" name="cost_value" id="cost_value">
                            <input type="hidden" name="estimated_day" id="estimated_day">
                            <input type="hidden" name="note" id="note">
                            @foreach($costDetails as $cost)
                            <div class="col-6 my-2">
                                <div class="card card-body rounded rounded-md w-100 mh-50">
                                    Layanan: {{ $cost->service }} <br/>
                                    Keterangan: {{ $cost->description }} <br/>
                                    Biaya: Rp. {{ number_format($cost->cost[0]->value) }} <br/>
                                    Estimasi: {{ $cost->cost[0]->etd }} hari <br/>
                                    Note: {{  $cost->cost[0]->note  }}

                                    <div class="mt-4">
                                        <input type="radio" class="btn-check" name="delivery" id="{{ $cost->service }}" onchange="handleChange('{{ $cost->service }}', '{{ $cost->description }}', '{{ $cost->cost[0]->value }}', '{{ $cost->cost[0]->etd }}', '{{ $cost->cost[0]->note }}')" autocomplete="off">
                                        <label class="btn btn-primary" for="{{ $cost->service }}">Pilih</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="mt-4">
                                <button class="w-100 btn btn-primary" type="button" onclick="handleClick()">Lanjut ke Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            //{{ $cost->service }}', '{{ $cost->description }}', '{{ $cost->cost[0]->value }}', '{{ $cost->cost[0]->etd }}', '{{ $cost->cost[0]->note }}'
            function handleChange (service, description, cost_value, cost_etd, cost_note){
                var serviceInput = document.getElementById('service')
                var descriptionInput = document.getElementById('description')
                var costValueInput = document.getElementById('cost_value')
                var estimatedDayInput = document.getElementById('estimated_day')
                var noteInput = document.getElementById('note')

                serviceInput.value = service;
                descriptionInput.value = description;
                costValueInput.value = cost_value;
                estimatedDayInput.value = cost_etd;
                noteInput.value = cost_note;
            }

            function handleClick() {
                var input = document.querySelector('input[name="delivery"]:checked');
                var form = document.getElementById('deliveryServiceForm');
                if(input == null) {
                   console.log('Silakan pilih layanan pengiriman')
                }else{
                   form.submit()
                }

            }
        </script>
    @endpush
</x-layouts.main>
