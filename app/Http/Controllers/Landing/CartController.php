<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = new CartService();
        return view('pages.cart.index', [
            'cart' => $cart
        ]);
    }

    public function addToCart(Product $product)
    {
        (new CartService())->add($product);
        return back();
    }

    public function removeItem(Product $product)
    {
        //
    }
}
