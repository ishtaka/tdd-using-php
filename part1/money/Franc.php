<?php

namespace Part1\Money;

class Franc extends Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}