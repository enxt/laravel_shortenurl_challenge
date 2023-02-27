<?php

namespace App\ShortenUrl\Infrastructure\ApiAdapters;

use App\ShortenUrl\Application\Ports\api\ShortenUrlApiPort;
use App\ShortenUrl\Domain\Models\Url;
use Illuminate\Routing\Controller as BaseController;

class ShortUrlController extends BaseController
{
    private ShortenUrlApiPort $shortenUrlApiPort;

    public function __construct(ShortenUrlApiPort $shortenUrlApiPort)
    {
        $this->shortenUrlApiPort = $shortenUrlApiPort;
    }

    public function short(): array
    {
        $shortedUrl = $this->shortenUrlApiPort->execute(new Url("tst"));
        return ['url' => $shortedUrl->getShortedResource()];
    }
}
