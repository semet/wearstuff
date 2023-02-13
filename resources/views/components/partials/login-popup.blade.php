<div
        class="modal fade"
        id="loginPopup"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow-lg border-0 overflow-hidden">
            <div class="modal-body py-5">
                <div class="card login-page bg-white shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login</h4>

                        <form class="login-form mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input type="email" class="form-control ps-5" placeholder="Email" name="email" id="emailAddress" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control ps-5" placeholder="Password" name="password" id="userPassword" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                            </div>
                                        </div>
                                        <p class="forgot-pass mb-0">
                                            <a href="{{ route('password.reset') }}" class="text-dark fw-bold">Forgot password ?</a>
                                        </p>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 mb-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary" id="loginButton">Sign in</button>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 mt-4 text-center">
                                    <h6>Or Login With</h6>
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-facebook text-primary"></i> Facebook</a>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>
                                        </div><!--end col-->
                                    </div>
                                </div><!--end col-->

                                <div class="col-12 text-center">
                                    <p class="mb-0 mt-3">
                                        <small class="text-dark me-2">Don't have an account ?</small>
                                        <a href="{{ route('register.show') }}" class="text-dark fw-bold">Sign Up</a>
                                    </p>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const loginBtn = document.getElementById('loginButton')
        const email = document.getElementById('emailAddress')
        const password = document.getElementById('userPassword')
        const alert = document.getElementById('loginAlret')
        loginBtn.addEventListener('click', function (e) {
            e.preventDefault()
            axios.post('{{ route('login.ajax.post') }}', {
                _token: '{{ csrf_token() }}',
                email:  email.value,
                password: password.value
            })
            .then(function (res) {
                location.reload()
            })
            .catch(function (err) {
                toastr.error(err.response.data.error, 'Error!', {
                    positionClass: 'toast-top-center'
                })
            })
        });

    </script>
@endpush
