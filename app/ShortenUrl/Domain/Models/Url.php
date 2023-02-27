<?php

namespace App\ShortenUrl\Domain\Models;

class Url
{
    public function __construct(private readonly string $resource)
    {
    }

    public function getResource(): string
    {
        return $this->resource;
    }
}
