<x-layouts.auth>
    <x-slot:title>
        Reset Password
    </x-slot:title>
    <section class="bg-home d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="me-lg-5">
                        <img src="{{ asset('assets') }}/images/user/recovery.svg" class="img-fluid d-block mx-auto" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
                    @endif
                    <div class="card shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center">Amankan Akun Anda</h4>

                            <form class="login-form mt-4" method="POST" action="{{ route('password.send.request') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="text-muted">Silakan masukkan email anda.</p>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="email@example.com" name="email" id="email" required="">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Kirim</button>
                                        </div>
                                    </div><!--end col-->
                                    <div class="mx-auto">
                                        <p class="mb-0 mt-3">
                                            <small class="text-dark me-2">Sudah ingat lagi passwordnya ?</small>
                                            <a href="{{ route('login.show') }}" class="text-dark fw-bold">Login</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->

</x-layouts.auth>
