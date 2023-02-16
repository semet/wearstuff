<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Mail\InvoiceEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoiceToCustomer
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
        // Mail::to($event->order->user->email)->send(new InvoiceEmail($event->order));
        info('sending Invoice email to ' . $event->order->user->email);
    }
}
