<?php

namespace App\View\Components\Shared;

use App\Models\Product;
use Illuminate\View\Component;

class ProductCardSimple extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Product $product
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.product-card-simple');
    }
}
