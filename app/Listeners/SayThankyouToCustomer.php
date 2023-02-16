<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Mail\ThankyouEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SayThankyouToCustomer
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
     * @param  \App\Events\OrderPlced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        // Mail::to($event->order->user->email)->send(new ThankyouEmail($event->order));
        info('Hey ' . $event->order->user->email . ' Terimakasih telah berbelanja di toko kami');
    }
}
