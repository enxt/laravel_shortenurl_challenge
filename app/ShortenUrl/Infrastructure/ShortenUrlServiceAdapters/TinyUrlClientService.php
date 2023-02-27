<?php

namespace App\ShortenUrl\Infrastructure\ShortenUrlServiceAdapters;

use App\ShortenUrl\Application\Ports\spi\ShortenUrlServicePort;
use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;

class TinyUrlClientService implements ShortenUrlServicePort
{

    function execute(Url $url): ShortedUrl
    {
        // TODO: Implement execute() method.
        return new ShortedUrl("noooooovaleeee");
    }
}
