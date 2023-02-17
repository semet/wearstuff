<x-layouts.admin.main>
    <x-slot:title>
    Preview Product
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-6">
                        <h2>{{ $data->productName }}</h2>
                        <h4>#SKU: {{ $data->productSku }}</h4>
                    </div>
                    <div class="col-3">
                        <h4>Price: Rp. {{ number_format($data->productPrice) }}</h4>
                        <h4>Weight: {{ $data->productWeight }} Gr</h4>
                    </div>
                    <div class="col-3">
                        <h6>Size: {{ $data->productSize }}</h6>
                        <h6>Quantity: {{ $data->productQuantity }}</h6>
                        <h6>Gender: {{ $data->productGender }}</h6>
                    </div>
                </div>

                <hr/>

                <h3># Overview</h3>
                {!! $data->overview !!}
                <h3 class="mt-2"># Description</h3>
                {!! $data->description !!}
                <h3 class="mt-2"># Additional Information</h3>
                {!! $data->additionalInfo !!}
                @isset($data->ingredients)
                <h3 class="mt-2"># Ingredients</h3>
                {!! $data->ingredients !!}
                @endisset

                <div class="mx-auto d-flex">
                    <button class="btn btn-primary ml-2">Save and Next</button>
                </div>
            </div>

        </div>
    </div>
</x-layouts.admin.main>
