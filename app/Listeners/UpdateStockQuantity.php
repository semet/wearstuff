<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Events\StockRunningLow;
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
            //reduce the stock amount based on ordered quantity
            $item->product()->decrement('quantity', $item->quantity);
            //check if stock amount <= 5, if true, notify admin!
            if ($item->product->quantity <= 3) {
                StockRunningLow::dispatch($item->product);
            }
            //add the sold item into the database
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
