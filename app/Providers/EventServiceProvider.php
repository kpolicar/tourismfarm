<?php

namespace App\Providers;

use App\Events\Approved;
use App\Events\Inquired;
use App\Listeners\SendEmailApprovalNotification;
use App\Listeners\SendEmailVerificationNotification as SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Inquired::class => [
            SendEmailVerificationNotification::class,
        ],
        Approved::class => [
            SendEmailApprovalNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
