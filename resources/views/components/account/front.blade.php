<div class="tab-pane fade bg-white @if(request()->get('tab') == 'dashboard') show active @endif shadow rounded p-4" id="dash" role="tabpanel" aria-labelledby="dashboard">
    <h6 class="text-muted">Hello <span class="text-dark">{{ auth()->user()->name }}</span></h6>

    <h6 class="text-muted mb-0">From your account dashboard you can view your <a href="javascript:void(0)" class="text-danger">recent orders</a>, manage your <a href="javascript:void(0)" class="text-danger">shipping and billing addresses</a>, and <a href="javascript:void(0)" class="text-danger">edit your password and account details</a>.</h6>
</div><!--end teb pane-->
