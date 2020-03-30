<?php

namespace Domain\Price;

class PerNightCalculator
{
    public function calc($base, $duration, $nights)
    {
        return $base * $duration * $nights;
    }
}
