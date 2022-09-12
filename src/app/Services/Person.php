<?php

declare(strict_types=1);

namespace App\Services;

class Person
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}