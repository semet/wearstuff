<?php

namespace App\Providers;

use App\Events\OrderCancelled;
use App\Events\OrderExpired;
use App\Events\OrderPlaced;
use App\Events\PasswordResetLinkRequested;
use App\Events\PaymentSuccessful;
use App\Events\StockRunningLow;
use App\Events\UserCreated;
use App\Listeners\NotifyAdmin;
use App\Listeners\RestoreStockQuantity;
use App\Listeners\SayThankyouToCustomer;
use App\Listeners\SendCancelledOrderNotification;
use App\Listeners\SendEmailVerification;
use App\Listeners\SendExpiredOrderNotification;
use App\Listeners\SendInvoiceToCustomer;
use App\Listeners\SendLowStockNotification;
use App\Listeners\SendPasswordResetLink;
use App\Listeners\UpdateCustomerPoint;
use App\Listeners\UpdateShoppingCart;
use App\Listeners\UpdateStockQuantity;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        UserCreated::class => [
            SendEmailVerification::class,
        ],
        OrderPlaced::class => [
            SayThankyouToCustomer::class,
            //update cart
            UpdateShoppingCart::class
        ],
        PaymentSuccessful::class => [
            //send invoice to customer;
            SendInvoiceToCustomer::class,
            //Update the point
            UpdateCustomerPoint::class,
            //send notification to Admin;
            NotifyAdmin::class,
            //Update stock
            UpdateStockQuantity::class,

        ],
        StockRunningLow::class => [
            SendLowStockNotification::class
        ],
        OrderExpired::class => [
            SendExpiredOrderNotification::class,
            //restore stock quantity
            RestoreStockQuantity::class
        ],
        OrderCancelled::class => [
            SendCancelledOrderNotification::class,
            //restore stock quantity
            RestoreStockQuantity::class
        ],
        PasswordResetLinkRequested::class => [
            SendPasswordResetLink::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
