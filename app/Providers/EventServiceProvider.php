<?php

namespace App\Providers;

use App\Events\MessageWasReceived;
use App\Listeners\SendAutoResponder;
use App\Listeners\SendNotificationToTheOwner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        Registered::class => [
            //SendEmailVerificationNotification::class,
            MessageWasReceived::class => [
                SendAutoResponder::class,
                SendNotificationToTheOwner::class
            ]
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
