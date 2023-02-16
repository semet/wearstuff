<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Events\OrderExpired;
use App\Models\OrderItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestoreStockQuantity
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderExpired | OrderCancelled $event)
    {
        $event->order->items->each(function (OrderItem $item) {
            $item->product()->increment('quantity', $item->quantity);
        });
    }
}
