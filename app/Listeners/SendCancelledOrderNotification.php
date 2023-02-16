<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Mail\CancelledOrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendCancelledOrderNotification
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
     * @param  \App\Events\OrderCancelled  $event
     * @return void
     */
    public function handle(OrderCancelled $event)
    {
        // Mail::to($event->order->user->email)->send(new CancelledOrderMail($event->order));
        info('hey ' . $event->order->user->email . ' your order with number ' . $event->order->number . ' has been cancelled');
    }
}
