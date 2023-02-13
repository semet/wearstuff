<x-layouts.main>
    <x-slot:title>
        Profil
    </x-slot:title>
    <x-partials.page-title title="Profil/Akun"/>
    <section class="section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets') }}/images/client/05.jpg" class="avatar avatar-md-md rounded-circle" alt="">
                        <div class="ms-3">
                            <h6 class="text-muted mb-0">Hello,</h6>
                            <h5 class="mb-0">Cally Joseph</h5>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-8 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-muted mb-0">
                        Selamat datang. halaman ini hanya bisa dilihat oleh anda.
                    </p>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <ul class="nav nav-pills nav-justified flex-column bg-white rounded shadow p-3 mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded @if(request()->get('tab') == 'dashboard') active @endif" id="dashboard" data-bs-toggle="pill" href="#dash" role="tab" aria-controls="dash" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-dashboard h5 align-middle me-2 mb-0"></i> Dashboard</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                        <li class="nav-item mt-2">
                            <a class="nav-link rounded @if(request()->get('tab') == 'order') active @endif" id="order-history" data-bs-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-list-ul h5 align-middle me-2 mb-0"></i> Orders</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                        <li class="nav-item mt-2">
                            <a class="nav-link rounded @if(request()->get('tab') == 'address') active @endif" id="addresses" data-bs-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> Alamat</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                        <li class="nav-item mt-2">
                            <a class="nav-link rounded @if(session('profileUpdated') || request()->get('tab') == 'setting') active @endif" id="account-details" data-bs-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-user h5 align-middle me-2 mb-0"></i> Detail Akun</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                        <li class="nav-item mt-2">
                            <a class="nav-link rounded" role="tab" href="{{ route('logout') }}" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-sign-out-alt h5 align-middle me-2 mb-0"></i> Logout</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->
                    </ul><!--end nav pills-->
                </div><!--end col-->

                <div class="col-md-8 col-12 mt-4 pt-2">
                    <div class="tab-content" id="pills-tabContent">
                        {{-- Account front page --}}
                        <x-account.front/>
                       {{-- Account Orders --}}
                        <x-account.orders/>
                        {{-- Address Lists --}}
                        <x-account.address-list/>
                        {{-- Account Profile --}}
                        <x-account.profile/>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

</x-layouts.main>
