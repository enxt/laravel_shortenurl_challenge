<?php

namespace App\ShortenUrl\Infrastructure\Shared\Validators;

class CloseSymbol implements Symbol
{

    static public function execute(int $index, array &$symbolsIndexList): bool
    {

        return $index !== array_pop($symbolsIndexList);
    }
}
