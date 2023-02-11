<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStockQuantity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PaymentSuccessful  $event
     * @return void
     */
    public function handle(PaymentSuccessful $event)
    {
        $event->order->items->each(function (OrderItem $item) use ($event) {
            $item->product()->decrement('quantity', $item->quantity);
            $item->product()->each(function (Product $product) use ($event, $item) {
                $product->solds()->create([
                    'user_id' => $event->order->user->id,
                    'product_id' => $product->id,
                    'quantity' => $item->quantity
                ]);
            });
        });
    }
}
