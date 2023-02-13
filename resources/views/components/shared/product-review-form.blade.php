<div class="col-lg-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
    <form class="ms-lg-4 needs-validation" action="{{ route('review.store', $productId) }}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-12">
                <h5>Tambahkan review anda:</h5>
            </div>
            <div class="col-md-12 mt-3">
                <div class="mb-3">
                    <label class="form-label" for="message">Your Review:</label>
                    <div class="form-icon position-relative">
                        <i data-feather="message-circle" class="fea icon-sm icons"></i>
                        <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control ps-5" required></textarea>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-12">
                <div class="send d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </form><!--end form-->
</div><!--end col-->
