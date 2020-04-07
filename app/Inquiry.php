<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = ['price'];

    protected $dates = ['from', 'to'];
}
