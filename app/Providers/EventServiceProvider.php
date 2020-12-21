<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\SendApprovalEvent::class => [
            \App\Listeners\SendApprovalListener::class,
        ],
         \App\Events\SendDailyEvent::class => [
            \App\Listeners\SendDailyListener::class,
        ],
         \App\Events\SendRejectEvent::class => [
            \App\Listeners\SendRejectListener::class,
        ],
          \App\Events\SendP3ATEvent::class => [
            \App\Listeners\SendP3ATListener::class,
        ],
        \App\Events\SendOTPEvent::class => [
            \App\Listeners\SendOTPListener::class,
        ],
    ];
}
