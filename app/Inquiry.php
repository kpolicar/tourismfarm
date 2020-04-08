<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inquiry extends Model implements MustVerifyEmail
{
    use Notifiable;

    protected $guarded = ['price'];

    protected $dates = ['from', 'to'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Inquiry $model) {
            $model->price = 100;
        });
    }

    public function hasVerifiedEmail()
    {
        return $this->is_verified;
    }

    public function markEmailAsVerified()
    {
        return $this->is_verified = true;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerifyEmail);
    }
}
