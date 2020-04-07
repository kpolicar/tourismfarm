<?php

namespace App\Listeners;

use App\Events\Inquired;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendEmailVerificationNotification
{
    public function handle(Inquired $event)
    {
        if ($event->inquiry instanceof MustVerifyEmail && ! $event->inquiry->hasVerifiedEmail()) {
            $event->inquiry->sendEmailVerificationNotification();
        }
    }
}
