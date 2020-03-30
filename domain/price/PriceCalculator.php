<?php

namespace Domain\Price;

use App\Accommodation;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PriceCalculator implements UrlRoutable
{
    public function calculate()
    {
    }

    public function getRouteKey()
    {
    }

    public function getRouteKeyName()
    {
    }

    public function resolveRouteBinding($value)
    {
        $model = Accommodation::make();
        if (!$record = Accommodation::make()->resolveRouteBinding($value)) {
            throw (new ModelNotFoundException)->setModel(get_class($model));
        }
        if ($record->price_type == 'per-person') {
            return new PerPersonCalculator();
        } elseif ($record->price_type == 'per-night') {
            return new PerNightCalculator();
        }
    }
}
