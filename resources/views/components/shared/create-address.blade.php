<div
    class="modal fade"
    id="addressAddPopup"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow-lg border-0 overflow-hidden">
            <div class="modal-body py-4">
                <div class="card bg-white shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Tambahkan Alamat Baru</h4>
                        <form class="mt-4 needs-validation" novalidate method="POST" action="{{ route('address.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="province" class="form-label">Provinsi</label>
                                    <select name="province" id="province" class="form-select" required>
                                        <option value="">--Pilih Provinsi--</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->province_id }}">{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Provinsi tidak boleh kosong</div>
                                </div>

                                <div class="col-12 my-4">
                                    <label for="city" class="form-label">Kabupaten/Kota</label>
                                    <select name="city" id="city" class="form-select" required>
                                    </select>
                                    <div class="invalid-feedback">Kabupaten tidak boleh kosong</div>
                                </div>

                                <div class="col-12 my-4">
                                    <label for="city" class="form-label">Alamat/Jalan</label>
                                    <textarea name="line" id="line" rows="3" class="form-control" required></textarea>
                                    <div class="invalid-feedback">Alamat tidak boleh kosong</div>
                                </div>

                                <div class="col-12 my-4">
                                    <label for="city" class="form-label">Nomor Bangunan</label>
                                   <input type="text" name="building_number" id="building_number" class="form-control">
                                </div>
                                <div class="col-12 my-4 d-flex justify-content-center gap-4">
                                    <button class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        //
        $('#province').change(function(e) {
            var provinceId = e.target.value
            var url = '{{ route('city.by.province') }}' + '?provinceId='+provinceId

            axios.get(url)
            .then(function (res) {
                $('#city').empty()
                $('#city').append(`<option selected value="">--Pilih Kabupaten/Kota--</option>`)
                $.each(res.data.cities, function (idx, city) {
                    $('#city').append(`<option value="${city.city_id}">${city.city_name}</option>`)
                });
            })
        })
    });
</script>
@endpush
