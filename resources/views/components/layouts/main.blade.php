<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>{{ $title ?? str_replace('_', ' ', config('app.name')) }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Wearstuf, Number 1 Lombok Online store." />
		<meta name="keywords" content="Wearstuf, Lombok, NTB, Online Store" />
		<meta name="author" content="Hamdani" />
		<meta name="email" content="hamdanilombok@gmail.com" />
		<meta name="website" content="https://hamdani.vercel.app" />
		<meta name="Version" content="v3.8.0" />
		<!-- favicon -->
		<link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />
		<!-- Bootstrap -->
		<link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Slider -->
		<link rel="stylesheet" href="{{ asset('assets') }}/css/tiny-slider.css" />
		<!-- Icons -->
		<link href="{{ asset('assets') }}/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
		<link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"
		/>
        {{-- Toastr --}}
		<link href="{{ asset('assets') }}/js/toastr/build/toastr.min.css" rel="stylesheet" type="text/css" />

		<!-- Main Css -->
		<link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
		<link href="{{ asset('assets') }}/css/colors/default.css" rel="stylesheet" id="color-opt" />
	</head>

	<body>
		<!-- Loader -->
		<!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
		<!-- Loader -->

		<!-- Navbar STart -->
		<x-partials.header/>
		<!--end header-->
		<!-- Navbar End -->

        {{ $slot }}

		<!-- Footer Start -->
		<x-partials.footer/>
		<!--end footer-->
		<!-- Footer End -->

		<!-- Product View Start -->
		<x-partials.product-view/>
		<!-- Product View End -->

		<!-- Wishlist Popup Start -->
		<x-partials.wishlist-popup/>
		<!-- Wishlist Popup End -->

        <!-- Login Popup Start -->
		<x-partials.login-popup/>
		<!-- Login Popup End -->

        <!-- Add address popup Start -->
		<x-shared.create-address/>
		<!-- Add address popup End -->

		<!-- Offcanvas Start -->
		<x-partials.search-bar/>
		<!-- Offcanvas End -->

		<!-- Back to top -->
		<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"
			><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i
		></a>
		<!-- Back to top -->


		<!-- javascript -->
        @routes
		<script src="{{ asset('assets') }}/js/jquery/jquery.min.js"></script>
		<script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
		<!-- SLIDER -->
		<script src="{{ asset('assets') }}/js/tiny-slider.js "></script>
		<!-- Icons -->
		<script src="{{ asset('assets') }}/js/feather.min.js"></script>
        {{-- Toastr --}}
		<script src="{{ asset('assets') }}/js/toastr/build/toastr.min.js"></script>
        {{-- Parsley --}}
        <script src="{{ asset('assets') }}/js/parsleyjs/parsley.min.js"></script>
        <script src="{{ asset('assets') }}/js/parsleyjs/form-validation.init.js"></script>
        {{-- axios --}}
		<script src="{{ asset('assets') }}/js/axios/axios.min.js"></script>
		<!-- Main Js -->
		<script src="{{ asset('assets') }}/js/plugins.init.js"></script>
		<!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
		<script src="{{ asset('assets') }}/js/app.js"></script>
        @stack('scripts')
		<!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
	</body>
</html>
