<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        public CartService $cart
    ) {
    }

    public function index()
    {
        return view('pages.cart.index', [
            'cart' => $this->cart
        ]);
    }

    public function addToCart(string $productId, ?int $quantity = null)
    {
        $this->cart->add($productId, $quantity);
        return back();
    }

    public function removeItem(Cart $cart)
    {
        $this->cart->remove($cart);

        return back();
    }
}
