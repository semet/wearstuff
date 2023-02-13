<x-layouts.auth>
    <x-slot:title>
        Update password
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
                            <h4 class="card-title text-center">Update password</h4>

                            <form class="login-form mt-4" method="POST" action="{{ route('password.reset.update', $token) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password baru <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="Password baru" name="password" id="password" required="">
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Ulangi Password <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="password" class="form-control ps-5 @error('password_confirmation') is-invalid @enderror" placeholder="Ulang password baru" name="password_confirmation" id="password_confirmation" required="">
                                            </div>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->

</x-layouts.auth>
