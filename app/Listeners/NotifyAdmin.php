<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Mail\NewOrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class NotifyAdmin
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
        // Mail::to('admin')->send(new NewOrderMail($event->order));
        info('Hey ad min, new order just got paid');
    }
}
