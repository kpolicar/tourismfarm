<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = ['price'];

    protected $dates = ['from', 'to'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Inquiry $model) {
            $model->price = 100;
        });
    }
}
