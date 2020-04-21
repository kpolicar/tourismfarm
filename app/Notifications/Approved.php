<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class Approved extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::getFromJson('Inquiry approved'))
            ->line(Lang::getFromJson('Your inquiry has been approved.'))
            ->line(Lang::getFromJson('We can\'t wait to meet you!'));
    }
}
