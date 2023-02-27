<?php

namespace App\ShortenUrl\Domain\Models;

class ShortedUrl
{

    public function __construct(private readonly string $shortedResource)
    {
    }

    public function getShortedResource(): string
    {
        return $this->shortedResource;
    }
}
