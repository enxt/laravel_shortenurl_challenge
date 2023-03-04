<?php

namespace App\ShortenUrl\Infrastructure\Shared\Validators;

class OpenSymbol implements Symbol
{

    static public function execute(int $index, array &$symbolsIndexList): bool
    {

        $symbolsIndexList[] = $index;
        return false;
    }
}
