<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="{{ route('home') }}">
            <img
                src="{{ asset('assets') }}/images/logo-dark.png"
                height="24"
                class="logo-light-mode"
                alt=""
            />
            <img
                src="{{ asset('assets') }}/images/logo-light.png"
                height="24"
                class="logo-dark-mode"
                alt=""
            />
        </a>
        <!-- End Logo container-->

        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item mb-0 pe-1">
                <a
                    href="javascript:void(0)"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop"
                >
                    <i class="uil uil-search h5 text-dark align-middle"></i>
                </a>
            </li>
            {{-- cart --}}
            <x-partials.cart-dropdown/>
            {{-- Wishlist--}}
            <x-partials.wishlist-dropdown/>
            {{-- User Menu --}}
            @guest
            <li class="list-inline-item mb-0">
                <button
                    type="button"
                    class="btn btn-icon btn-pills btn-primary"
                    data-bs-toggle="modal"
                   data-bs-target="#loginPopup"
                >
                    <i data-feather="log-in" class="icons"></i>
                </button>
            </li>
            @endguest

            @auth
            <x-partials.user-menu/>
            @endauth

        </ul>
        <!--end login button-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li>
                    <a href="{{ route('home') }}" class="sub-menu-item">Home</a>
                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Shop</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li>
                            <a href="shop-fullwidth-grids.html" class="sub-menu-item"
                                >Fullwidth Grid</a
                            >
                        </li>
                        <li>
                            <a href="shop-grids.html" class="sub-menu-item"
                                >Product Grids</a
                            >
                        </li>
                        <li>
                            <a href="shop-fullwidth-lists.html" class="sub-menu-item"
                                >Fullwidth List</a
                            >
                        </li>
                        <li>
                            <a href="shop-lists.html" class="sub-menu-item"
                                >Product List</a
                            >
                        </li>
                        <li>
                            <a href="shop-product-detail.html" class="sub-menu-item"
                                >Product Details</a
                            >
                        </li>
                        <li>
                            <a href="shop-cart.html" class="sub-menu-item">Shop Cart</a>
                        </li>
                        <li>
                            <a href="shop-checkouts.html" class="sub-menu-item"
                                >Checkouts</a
                            >
                        </li>
                        <li>
                            <a href="shop-myaccount.html" class="sub-menu-item"
                                >My Account</a
                            >
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="shop-aboutus.html" class="sub-menu-item"> Support</a>
                </li>

            </ul>
            <!--end navigation menu-->
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</header>
