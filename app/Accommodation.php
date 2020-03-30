<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accommodation extends Model
{
    use SoftDeletes;

    const PRICE_PER_PERSON = 'per-person';
    const PRICE_PER_NIGHT = 'per-night';
    const GROUP_CAMPING = 'camping';
    const GROUP_INDOOR = 'indoor';


    public function calcPrice($persons, $duration)
    {
        if ($this->price_type == static::PRICE_PER_PERSON) {
            //
        } elseif ($this->price_type == static::PRICE_PER_NIGHT) {
            //
        }
        return $this->price;
    }

    public function getRouteKeyName()
    {
        return 'code';
    }
}
