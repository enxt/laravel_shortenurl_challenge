<?php

namespace App\ShortenUrl\Infrastructure\Shared\Validators;

class BearerTokenValidator
{
    private const SYMBOLS = ["{" => "}", "[" => "]", "(" => ")"];

    public function validate(null|string $token): bool
    {

        if (is_null($token)) {
            return false;
        }

        if (empty($token)) {
            return true;
        }

        $symbolsIndexList = [];

        foreach (str_split($token) as $char) {
            $this->addSymbolToStackIfOpening($char, $symbolsIndexList);

            if ($this->notCanRemoveSymbolFromStackIfClosing($char, $symbolsIndexList)) {
                return false;
            }
        }

        return (empty($symbolsIndexList));
    }


    private function addSymbolToStackIfOpening(string $char, array &$symbolsIndexList): void
    {

        if (array_key_exists($char, self::SYMBOLS)) {
            array_push($symbolsIndexList, array_search($char, array_keys(self::SYMBOLS)));
        }
    }

    private function notCanRemoveSymbolFromStackIfClosing(string $currentSymbol, array &$symbolsIndexList): bool
    {

        if (in_array($currentSymbol, self::SYMBOLS)) {
            $removedSymbol = array_pop($symbolsIndexList);
            return $this->isMatchedClosingSymbol($removedSymbol, $currentSymbol, $symbolsIndexList);
        }

        return false;
    }

    private function isMatchedClosingSymbol(null|int $lastItemRemoved, string $char, array &$symbolsIndexList): bool
    {

        if (array_search($char, array_values(self::SYMBOLS)) !== $lastItemRemoved) {
            return true;
        }

        return false;
    }

}
