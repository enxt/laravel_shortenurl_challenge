<?php

namespace App\ShortenUrl\Infrastructure\ShortenUrlServiceAdapters;

use App\ShortenUrl\Application\Ports\spi\ShortenUrlServicePort;
use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;
use Illuminate\Support\Facades\Http;

class TinyUrlClientService implements ShortenUrlServicePort
{

    function execute(Url $url): ShortedUrl
    {

        $shortedUrl = Http::get(config('services.tinyUrl.url'), ['url' => $url->getResource()]);
        return new ShortedUrl($shortedUrl);
    }
}
