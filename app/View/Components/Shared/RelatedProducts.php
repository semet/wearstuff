<?php

namespace App\View\Components\Shared;

use App\Models\Product;
use Illuminate\View\Component;
use Route;

class RelatedProducts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $category
    ) {
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
        $relatedProducts = Product::where('category_id', $this->category)
            ->take(10)
            ->get()
            ->reject(fn ($item) => $item->id === $id);

        return view('components.shared.related-products', [
            'relatedProducts' => $relatedProducts
        ]);
    }
}
