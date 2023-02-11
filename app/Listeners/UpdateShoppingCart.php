<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateShoppingCart
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
    public function handle(PaymentSuccessful $event)
    {
        Cart::where('user_id', $event->order->user->id)->delete();
    }
}
