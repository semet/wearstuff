<?php

namespace App\Listeners;

use App\Events\OrderExpired;
use App\Mail\ExpiredOrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendExpiredOrderNotification
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
     * @param  \App\Events\OrderExpired  $event
     * @return void
     */
    public function handle(OrderExpired $event)
    {
        // Mail::to($event->order->user->email)->send(new ExpiredOrderMail($event->order));
        info('hey ' . $event->order->user->email . ' your order with number ' . $event->order->number . ' has expired');
    }
}
