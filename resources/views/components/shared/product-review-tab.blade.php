<div class="row">
    <div class="col-lg-6">
        <ul class="media-list list-unstyled mb-0">
            @foreach ($reviews as $review)
            <li>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a class="pe-3" href="#">
                            <img src="{{ asset('assets') }}/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                        </a>
                        <div class="flex-1 commentor-detail">
                            <h6 class="mb-0">
                                <a href="javascript:void(0)" class="text-dark media-heading">{{ $review->user->name }}</a>
                            </h6>
                            <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="text-muted p-3 bg-light rounded">
                        {{ $review->body }}
                    </p>
                </div>
            </li>
            @endforeach
        </ul>
    </div><!--end col-->

    <x-shared.product-review-form/>
</div><!--end row-->
