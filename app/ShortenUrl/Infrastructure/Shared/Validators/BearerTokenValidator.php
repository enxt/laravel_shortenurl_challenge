<?php

namespace App\ShortenUrl\Infrastructure\Shared\Validators;

class BearerTokenValidator
{
    private const SYMBOLS = [
        '(' => [0, OpenSymbol::class],
        ')' => [0, CloseSymbol::class],
        '{' => [1, OpenSymbol::class],
        '}' => [1, CloseSymbol::class],
        '[' => [2, OpenSymbol::class],
        ']' => [2, CloseSymbol::class],
    ];

    private array $symbolsIndexList = [];


//    public function __construct()
//    {
//    }


    public function validate(null|string $token): bool
    {

        if (is_null($token)) {
            return false;
        }

        try {
            foreach (str_split(trim($token)) as $char) {

                if (self::SYMBOLS[$char][1]::execute(self::SYMBOLS[$char][0], $this->symbolsIndexList)) {
                    return false;
                }
            }
        } catch (\Throwable $e) {
            return false;
        }

        return (empty($this->symbolsIndexList));
    }
}
