<?php


namespace Domain\price;


use http\Client\Request;

interface Calculator
{
    public function calculate(Request $request);
}
