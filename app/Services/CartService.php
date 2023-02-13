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
    public function add(string $productId, ?int $quantity = null)
    {
        $cart = Cart::query();

        if ($cart->where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first()
        ) {
            $cart->increment('quantity', $quantity ?? 1);
        } else {
            $cart->create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
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
    public function remove(Cart $cart)
    {
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
        return ceil(10 / 100 * $this->subTotal());
    }

    public function grandTotal()
    {
        return $this->subTotal() + $this->getTax();
    }

    public function itemsWithTax()
    {
        $items = $this->items();

        $all = $items->map(function (Cart $item) {
            return [
                'sku' => $item->product->sku,
                'name' => $item->product->name,
                'price' => $item->product->finalPrice(),
                'quantity' => $item->quantity,
                'subtotal' => $item->product->priceWithQuantity($item->quantity),
            ];
        })->push([
            'sku' => 'TAX',
            'name' => 'PPN 10%',
            'price' => $this->getTax(),
            'quantity' => 1,
            'subtotal' => $this->getTax(),
        ]);

        return $all;
    }

    public function getWeight()
    {
        $items = $this->items();
        return $items->map(fn ($item) => $item->product->weight * $item->quantity)->sum();
    }

    // public function itemsWithDeliveryAndTax(array $data)
    // {
    //     $items = $this->itemsWithTax()->push([
    //         'service' => $data['service'],
    //         'name' => $data['description'],
    //         'price' => $data['cost_value'],
    //         'quantity' => 1,
    //         'subtotal' => $data['cost_value'],
    //     ]);

    //     return $items;
    // }

    public function totalPiceWithDelivery($deliveryCost)
    {
        return $this->grandTotal() + $deliveryCost;
    }
}
