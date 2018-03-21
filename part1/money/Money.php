<?php

namespace Part1\Money;

class Money implements Expression
{
    protected $amount;
    protected $currency;

    public function getAmount()
    {
        return $this->amount;
    }

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $addend): Sum
    {
        return new Sum($this, $addend);
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(Money $other): bool
    {
        return $this->amount === $other->amount
            && $this->currency() === $other->currency();
    }

    public function reduce(string $to): Money
    {
        $rate = ($this->currency === "CHF" && $to === "USD") ? 2 : 1;
        return new Money($this->amount / $rate, $to);
    }

    public function __toString(): string
    {
        return $this->amount . ' ' . $this->currency;
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, "CHF");
    }
}
