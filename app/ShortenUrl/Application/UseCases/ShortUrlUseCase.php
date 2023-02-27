<?php

namespace App\ShortenUrl\Application\UseCases;

use App\ShortenUrl\Application\Ports\api\ShortenUrlApiPort;
use App\ShortenUrl\Application\Ports\spi\ShortenUrlServicePort;
use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;

readonly class ShortUrlUseCase implements ShortenUrlApiPort
{

    public function __construct(private ShortenUrlServicePort $shortenUrlServicePort)
    {
    }

    function execute(Url $url): ShortedUrl
    {

        return $this->shortenUrlServicePort->execute($url);
    }
}
