<?php

namespace App\Providers;

use App\Events\PaymentSuccessful;
use App\Listeners\NotifyAdmin;
use App\Listeners\SendInvoiceToCustomer;
use App\Listeners\UpdateShoppingCart;
use App\Listeners\UpdateStockQuantity;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PaymentSuccessful::class => [
            //send invoice to customer;
            SendInvoiceToCustomer::class,
            //send notification to Admin;
            NotifyAdmin::class,
            //Update stock
            UpdateStockQuantity::class,
            //update cart
            UpdateShoppingCart::class
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
