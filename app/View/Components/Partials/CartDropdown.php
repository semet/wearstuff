<?php

namespace App\View\Components\Partials;

use App\Services\CartService;
use Illuminate\View\Component;

class CartDropdown extends Component
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
        $cart = new CartService();
        return view('components.partials.cart-dropdown', [
            'cart' => $cart
        ]);
    }
}
