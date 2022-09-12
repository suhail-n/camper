<?php

declare(strict_types=1);

namespace App\Services;

class Greeter
{
    public function __construct(private Person $person)
    {
    }

    public function greet(): string
    {
        return "Hello " . $this->person->getName();
    }
}