<?php

namespace App\ShortenUrl\Infrastructure\ApiAdapters;

use App\ShortenUrl\Application\Ports\api\ShortenUrlApiPort;
use App\ShortenUrl\Domain\Models\Url;
use App\ShortenUrl\Infrastructure\ApiAdapters\Model\ShortUrlRequest;
use Illuminate\Routing\Controller as BaseController;

class ShortUrlController extends BaseController
{
    private ShortenUrlApiPort $shortenUrlApiPort;

    public function __construct(ShortenUrlApiPort $shortenUrlApiPort)
    {

        $this->shortenUrlApiPort = $shortenUrlApiPort;
    }

    public function short(ShortUrlRequest $shortUrlRequest): array
    {

        $validatedRequest = $shortUrlRequest->safe();

        $shortedUrl = $this->shortenUrlApiPort->execute(new Url($validatedRequest['url']));
        return ['url' => $shortedUrl->getShortedResource()];
    }
}
