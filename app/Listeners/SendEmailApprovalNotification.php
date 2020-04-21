<?php

namespace App\Listeners;

use App\Events\Approved;

class SendEmailApprovalNotification
{
    public function handle(Approved $event)
    {
        $event->inquiry->sendEmailApprovalNotification();
    }
}
