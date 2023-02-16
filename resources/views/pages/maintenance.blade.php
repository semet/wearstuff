<x-layouts.auth>
    <x-slot:title>
        Login
    </x-slot:title>
    <section class="bg-home d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background-image: url('{{ asset('assets') }}/images/maintenance.jpg');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center">
                    <a href="javascript:void(0)" class="logo h5">
                        <img src="{{ asset('assets') }}/images/logo-light.png" height="24" alt=""/>
                    </a>
                    <div class="text-uppercase text-white title-dark mt-2 mb-4 maintenance">System Is Under Maintenance</div>
                    <p class="text-white-50 para-desc mx-auto para-dark">Perfect and awesome template to present your future product or service. Hooking audience attention is all in the opener.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-center">
                        <span id="maintenance" class="timer"></span><span class="d-block h6 text-uppercase text-white">Minutes</span>
                        <!-- <div id="maintenance" class="mb-4 overflow-hidden text-center"></div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="index.html" class="btn btn-primary mt-4"><i class="mdi mdi-backup-restore"></i> Go Back Home</a>
                </div>
            </div>
        </div> <!-- end container -->
    </section><!--end section-->

</x-layouts.auth>
