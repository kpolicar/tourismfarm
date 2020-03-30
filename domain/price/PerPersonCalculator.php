<?php

namespace Domain\Price;

class PerPersonCalculator
{
    public function calc($base, $duration, $persons)
    {
        return $base * $duration * $persons;
    }
}
