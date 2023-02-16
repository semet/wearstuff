<x-layouts.auth>
    <x-slot:title>
        404 Page Not Found
    </x-slot:title>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <img src="{{ asset('assets') }}/images/404.svg" class="img-fluid" alt="">
                <div class="text-uppercase mt-4 display-3">Oh ! no</div>
                <div class="text-capitalize text-dark mb-4 error-page">Page Not Found</div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="index.html" class="btn btn-outline-primary mt-4">Go Back</a>
                <a href="index.html" class="btn btn-primary mt-4 ms-2">Go To Home</a>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
</x-layouts.auth>
