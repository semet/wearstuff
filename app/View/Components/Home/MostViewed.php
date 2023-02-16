<?php

namespace App\View\Components\Home;

use App\Models\Product;
use Illuminate\View\Component;

class MostViewed extends Component
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
        $products = Product::with('views')
            ->get()
            ->sortByDesc(function (Product $product) {
                return $product->views->count();
            })
            ->take(8)
            ->all();
        return view('components.home.most-viewed', [
            'products' => $products
        ]);
    }
}
