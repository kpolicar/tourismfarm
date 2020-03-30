<?php

namespace App;

use Carbon\Carbon;
use Domain\Price\PerNightCalculator;
use Domain\Price\PerPersonCalculator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accommodation extends Model
{
    use SoftDeletes;

    const PRICE_PER_PERSON = 'per-person';
    const PRICE_PER_NIGHT = 'per-night';
    const GROUP_CAMPING = 'camping';
    const GROUP_INDOOR = 'indoor';


    public function getRouteKeyName()
    {
        return 'code';
    }

    public function calculator()
    {
        if ($this->price_type == static::PRICE_PER_PERSON) {
            return new PerPersonCalculator();
        } elseif ($this->price_type == static::PRICE_PER_NIGHT) {
            return new PerNightCalculator();
        }
    }
}
