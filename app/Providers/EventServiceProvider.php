<?php

namespace App\Providers;

use App\Events\CreateFileEvent;
use App\Listeners\CreateFileFired;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\CreateInvoiceDetailsFired;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        CreateInvoiceDetails::class => [
            CreateInvoiceDetailsFired::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        Event::listen(
            CreateInvoiceDetails::class,
            [CreateInvoiceDetailsFired::class, 'handle']
        );
        Event::listen(
            CreateFileEvent::class,
            [CreateFileFired::class, 'handle']
        );

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
