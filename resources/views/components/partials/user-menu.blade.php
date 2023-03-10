<li class="list-inline-item mb-0">
    <div class="dropdown dropdown-primary">
        <button
            type="button"
            class="btn btn-icon btn-pills btn-primary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <i data-feather="user" class="icons"></i>
        </button>
        <div
            class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3"
            style="width: 200px"
        >
            <a class="dropdown-item text-dark" href="{{ route('account', ['tab' => 'dashboard']) }}">
                <i class="uil uil-user align-middle me-1"></i> Account
            </a>
            <a class="dropdown-item text-dark" href="{{ route('account', ['tab' => 'order']) }}">
                <i class="uil uil-clipboard-notes align-middle me-1"></i> History Order
            </a>
            <a class="dropdown-item text-dark" href="{{ route('account', ['tab' => 'address']) }}">
                <i class="uil uil-arrow-circle-down align-middle me-1"></i>Alamat
            </a>
            <a class="dropdown-item text-dark" href="{{ route('account', ['tab' => 'setting']) }}">
                <i class="uil uil-arrow-circle-down align-middle me-1"></i>Setting
            </a>
            <div class="dropdown-divider my-3 border-top"></div>
            <a class="dropdown-item text-dark" href="{{ route('logout') }}"><i class="uil uil-sign-out-alt align-middle me-1"></i>
                Logout
            </a>
        </div>
    </div>
</li>
