<div class="container-fluid mt-4">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mt-4 pt-2">
            <div class="card shop-features border-0 rounded overflow-hidden">
                <img src="{{ asset('assets') }}/images/shop/fea{{ $loop->iteration }}.jpg" class="img-fluid" alt="" />
                <div class="category-title ms-md-4 ms-2">
                    <h4>
                       {{$category->name}}
                    </h4>
                    <a href="javascript:void(0)" class="btn btn-sm btn-soft-primary mt-2">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
        <!--end col-->
        @endforeach

    </div>
    <!--end row-->
</div>
