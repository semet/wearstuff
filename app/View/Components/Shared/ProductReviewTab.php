<?php

namespace App\View\Components\Shared;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ProductReviewTab extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Collection $reviews
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.product-review-tab');
    }
}
