<div class="tab-pane fade bg-white shadow rounded p-4 @if(session('profileUpdated') || request()->get('tab') == 'setting') show active @endif" id="account" role="tabpanel" aria-labelledby="account-details">
    {{--  --}}
    <h5 class="mt-4">Informasi Akun :</h5>
    <form method="POST" action="{{ route('account.update.profile') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <div class="form-icon position-relative">
                        <i data-feather="user" class="fea icon-sm icons"></i>
                        <input name="name" id="name" type="text" class="form-control ps-5" value="{{ auth()->user()->name }}">
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="Male" @selected(auth()->user()->gender == 'Male' ) >Laki-laki</option>
                        <option value="Female" @selected(auth()->user()->gender == 'Female' ) >Perempuan</option>
                    </select>
                </div>
            </div><!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="form-icon position-relative">
                        <i data-feather="mail" class="fea icon-sm icons"></i>
                        <input name="email" id="email" type="email" class="form-control ps-5" value="{{ auth()->user()->email }}" readonly disabled>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="phone">No. Telepon</label>
                    <div class="form-icon position-relative">
                        <i data-feather="phone" class="fea icon-sm icons"></i>
                        <input name="phone" id="phone" type="text" class="form-control ps-5" value="{{ auth()->user()->phone }}" disabled readonly>
                    </div>
                </div>
            </div><!--end col-->


            <div class="col-lg-12 mt-2 mb-0">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div><!--end col-->
        </div><!--end row-->
    </form>
    <hr/>
    {{--  --}}
    <h5 class="mt-4">Foto profil :</h5>
    <form method="POST" action="{{ route('account.update.photo') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="photo">Update Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
            </div>
        </div>
    </form>
    {{--  --}}
    <hr/>
    <h5 class="mt-4">Change password :</h5>
    <form method="POST" action="{{ route('account.update.password') }}">
        @csrf
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="oldPassword">Password Lama :</label>
                    <div class="form-icon position-relative">
                        <i data-feather="key" class="fea icon-sm icons"></i>
                        <input type="password" name="oldPassword" id="oldPassword" class="form-control ps-5" placeholder="Old password" required="">
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="newPassword">Password Baru :</label>
                    <div class="form-icon position-relative">
                        <i data-feather="key" class="fea icon-sm icons"></i>
                        <input type="password" name="newPassword" id="newPassword" class="form-control ps-5" placeholder="New password" required="">
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="newPassword_confirmation">Ulang Password Baru :</label>
                    <div class="form-icon position-relative">
                        <i data-feather="key" class="fea icon-sm icons"></i>
                        <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" class="form-control ps-5" placeholder="Re-type New password" required="">
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-12 mt-2 mb-0">
                <button class="btn btn-primary">Simpan</button>
            </div><!--end col-->
        </div><!--end row-->
    </form>
</div>
