<?php

namespace App\Listeners;

use App\Events\Inquired;

class SendEmailVerificationNotification
{
    public function handle(Inquired $event)
    {
        if (!$event->inquiry->hasVerifiedEmail()) {
            $event->inquiry->sendEmailVerificationNotification();
        }
    }
}
