<div class="tab-pane fade bg-white shadow rounded p-4 @if(request()->get('tab') == 'address') show active @endif" id="address" role="tabpanel" aria-labelledby="addresses">
    <div class="d-flex justify-content-between">
        <h6 class="text-muted mb-0">Daftar alamat pengiriman.</h6>
        <a href="javascript:void(0)" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#addressAddPopup"><i class="uil uil-plus align-middle"></i></a>
    </div>


    <div class="row">
        @foreach($addresses as $address)
        <div class="col-lg-6 mt-4 pt-2">
            <div class="d-flex align-items-center mb-4 justify-content-between">
                <h5 class="mb-0">Alamat:</h5>
                <a href="javascript:void(0)" class="text-primary h5 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Edit"><i class="uil uil-edit align-middle"></i></a>
            </div>
            <div class="pt-4 border-top">
                <p class="h6">{{ auth()->user()->name }}</p>
                <p class="h6 text-muted">Provinsi {{ $address->province->province }},</p>
                <p class="h6 text-muted">Kota/Kabupaten {{ $address->city->city_name }},</p>
                <p class="h6 text-muted">{{ $address->line }}, </p>
                <p class="h6 text-muted">Nomor {{ $address->building_number }},</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
