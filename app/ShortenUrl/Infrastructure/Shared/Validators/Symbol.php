<?php

namespace App\ShortenUrl\Infrastructure\Shared\Validators;

interface Symbol
{

    static function execute(int $index, array &$symbolsIndexList) : bool;
}
