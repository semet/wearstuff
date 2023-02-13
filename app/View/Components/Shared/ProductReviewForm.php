<?php

namespace App\View\Components\Shared;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class ProductReviewForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $id = Route::current()->parameter('id');
        return view('components.shared.product-review-form', [
            'productId' => $id
        ]);
    }
}
