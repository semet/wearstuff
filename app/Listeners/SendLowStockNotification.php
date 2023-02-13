<?php

namespace App\Listeners;

use App\Events\StockRunningLow;
use App\Mail\LowStockNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendLowStockNotification
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
     * @param  \App\Events\StockRunningLow  $event
     * @return void
     */
    public function handle(StockRunningLow $event)
    {
        // Mail::to('admin')->send(new LowStockNotificationMail($event->product));

        info('hey admin, stock with SKU ' . $event->product->sku . ' is running low. please update it!');
    }
}
