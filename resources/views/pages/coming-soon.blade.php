<x-layouts.auth>
    <x-slot:title>
        Login
    </x-slot:title>
    <section class="bg-home d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background-image: url('{{ asset('assets') }}/images/comingsoon.jpg');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center">
                    <a href="javascript:void(0)" class="logo h5"><img src="images/logo-light.png" height="24" alt=""></a>
                    <div class="text-uppercase title-dark text-white mt-2 mb-4 coming-soon">We're Coming soon...</div>
                    <p class="text-light para-desc para-dark mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="countdown">
                        <ul class="count-down list-unstyled">
                            <li id="days" class="count-number list-inline-item m-2"></li>
                            <li id="hours" class="count-number list-inline-item m-2"></li>
                            <li id="mins" class="count-number list-inline-item m-2"></li>
                            <li id="secs" class="count-number list-inline-item m-2"></li>
                            <li id="end" class="h1"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="index.html" class="btn btn-primary mt-4"><i class="mdi mdi-backup-restore"></i> Go Back Home</a>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
</x-layouts.auth>
