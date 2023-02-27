<?php

namespace ShortenUrl\Infrastructure\Shared\Middleware;

use App\ShortenUrl\Infrastructure\Shared\Middleware\AuthorizationBearerToken;
use App\ShortenUrl\Infrastructure\Shared\Validators\BearerTokenValidator;
use Illuminate\Http\Request;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class AuthorizationBearerTokenTest extends TestCase
{

    public function testHandle()
    {

        // Given
        $bearerTokenValidation = Mockery::mock(BearerTokenValidator::class, function (MockInterface $mock) {
            $mock->shouldReceive("validate")->once()->andReturn(true);
        });

        $request = Mockery::mock(Request::class, function (MockInterface $mock) {
            $mock->shouldReceive("header")->once()->andReturn("Bearer");
        });

        $authorizeBearerToken = new AuthorizationBearerToken($bearerTokenValidation);

        // When
        $response = $authorizeBearerToken->handle($request, function () {
        });

        // Then
        $this->assertNull($response);

    }
}
