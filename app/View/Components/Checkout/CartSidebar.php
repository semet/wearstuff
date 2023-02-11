<?php

namespace App\View\Components\Checkout;

use App\Services\CartService;
use Illuminate\View\Component;

class CartSidebar extends Component
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
        return view('components.checkout.cart-sidebar', [
            'cart' => $cart
        ]);
    }
}
