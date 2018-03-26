<?php

namespace Tests\Fibonacci;

use Fibonacci\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testFibonacci()
    {
        $this->assertEquals(0, Fibonacci::fib(0));
        $this->assertEquals(1, Fibonacci::fib(1));
    }
}