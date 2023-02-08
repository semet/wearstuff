
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
		<title>{{ $title ?? str_replace('_', ' ', config('app.name')) }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
		<meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
		<meta name="author" content="Shreethemes" />
		<meta name="email" content="hamdanilombok@gmail.com" />
		<meta name="website" content="https://hamdani.vercel.app" />
		<meta name="Version" content="v3.8.0" />
		<!-- favicon -->
		<link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />
        <!-- Bootstrap -->
        <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="{{ asset('assets') }}/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Main Css -->
        <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ asset('assets') }}/css/colors/default.css" rel="stylesheet" id="color-opt">

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

        <div class="back-to-home rounded d-none d-sm-block">
            <a href="{{ route('home') }}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>

        <!-- Hero Start -->
        {{ $slot }}
        <!-- Hero End -->

        <!-- javascript -->
        <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
        <!-- Icons -->
        <script src="{{ asset('assets') }}/js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="{{ asset('assets') }}/js/plugins.init.js"></script>
        <script src="{{ asset('assets') }}/js/app.js"></script>
    </body>
</html>
