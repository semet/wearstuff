<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Models\VoucherItem;
use App\Services\VoucherService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateCustomerPoint
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
        if ($event->order->total_price >= config('site.minimum_expense')) {
            $event->order->user()->increment('point');
        }
        // (new VoucherService($event->order->user))->check();
        if ($event->order->user->point >= 5) {
            $voucher = VoucherItem::all()->random()->voucher()->create([
                'code' => Str::of(Str::random(5))->upper(),
                'valid_until' => now()->addDays(5),
                'claimed' => false
            ]);
            // Mail::to($event->order->user->email)->send(new VoucherMail($voucher));
            info('hey ' . $event->order->user->email . 'we have a voucher for you. here is the code : ' . $voucher->code);
        }
    }
}
