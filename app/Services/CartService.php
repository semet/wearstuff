<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;

class CartService
{
    /**
     * Add To cart
     *
     * @param Product $product
     * @param integer|null $quantity
     * @return void
     */
    public function add(Product $product, ?int $quantity = null)
    {
        $cart = Cart::query();

        if ($cart->where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first()
        ) {
            $cart->increment('quantity', $quantity ?? 1);
        } else {
            $cart->create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $quantity ?? 1
            ]);
        }
    }
    /**
     * Undocumented function
     *
     * @param string $id
     * @return boolean
     */
    public function remove(string $id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return false;
        } else {
            $cart->delete();

            return true;
        }
    }

    public function items(): Collection
    {
        return Cart::where('user_id', auth()->id())
            ->with(['product'])
            ->get();
    }

    public function getTotalPrice(): int
    {
        $cart = $this->items();

        return $cart->map(function ($item) {
            return $item->product->finalPrice() * $item->quantity;
        })->sum();
    }

    public function subTotal()
    {
        return $this->getTotalPrice();
    }

    public function getTax()
    {
        return 10 / 100 * $this->subTotal();
    }

    public function grandTotal()
    {
        return $this->subTotal() + $this->getTax();
    }
}
