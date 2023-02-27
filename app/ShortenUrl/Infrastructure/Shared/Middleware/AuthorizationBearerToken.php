<?php

namespace App\ShortenUrl\Infrastructure\Shared\Middleware;

use App\ShortenUrl\Infrastructure\Shared\Validators\BearerTokenValidator;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthorizationBearerToken
{

    public function __construct(private readonly BearerTokenValidator $bearerTokenValidator)
    {
    }

    public function handle(Request $request, Closure $next)
    {

        $token = $this->getBearerToken($request);
        if ($this->bearerTokenValidator->validate($token)) {
            return $next($request);
        }

        throw new HttpException(401, 'Invalid bearer token');
    }

    private function getBearerToken(Request $request)
    {

        $header = $request->header('Authorization', '');
        $position = strrpos($header, 'Bearer');

        if ($position !== false) {
            $header = substr($header, $position + 6);

            return str_contains($header, ',') ? strstr($header, ',', true) : $header;
        }
    }
}
