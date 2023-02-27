<?php

namespace ShortenUrl\Infrastructure\Shared\Validators;

use App\ShortenUrl\Infrastructure\Shared\Validators\BearerTokenValidator;
use PHPUnit\Framework\TestCase;

class BearerTokenValidatorTest extends TestCase
{

    public function testValidate_whenTokenIsNull_thenReturnFalse()
    {
        // Given
        $bearerTokenValidation = new BearerTokenValidator();

        // When
        $response = $bearerTokenValidation->validate(null);

        // Then
        $this->assertFalse($response);

    }

    public function testValidate_whenEmptyToken_thenReturnTrue()
    {

        // Given
        $bearerTokenValidation = new BearerTokenValidator();

        // When
        $response = $bearerTokenValidation->validate("");

        // Then
        $this->assertTrue($response);
    }

    public function testValidate_whenValidToken_thenReturnTrue()
    {

        // Given
        $bearerTokenValidation = new BearerTokenValidator();
        $validTokens = [
            '{}',
            '[]',
            '()',
            '()()(){{{{[]([[]])}}}}[]',
            '((((()))))',
            '((({})))',
            '[[[{}]]]',
            '{(([][]{}()))}'
        ];

        // When Then
        foreach ($validTokens as $validToken) {
            $this->assertTrue($bearerTokenValidation->validate($validToken));
        }

    }

    public function testValidate_whenInvalidToken_thenReturnTrue()
    {

        // Given
        $bearerTokenValidation = new BearerTokenValidator();
        $validTokens = [
            ']',
            '{',
            ')',
            '()()){{{{[]([[]])}}}}[]',
            '(((()))))',
            '((({}))',
            '[[{}]]]',
            '{((][]{}()))}'
        ];

        // When Then
        foreach ($validTokens as $validToken) {
            $this->assertFalse($bearerTokenValidation->validate($validToken));
        }
    }
}
