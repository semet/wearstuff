<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>
                        Order
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.order', ['status' => 'paid']) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Paid</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.order', ['status' => 'pending']) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pending</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.order', ['status' => 'canceled']) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cancelled</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.order', ['status' => 'expire']) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expired</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.customer') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.category') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
