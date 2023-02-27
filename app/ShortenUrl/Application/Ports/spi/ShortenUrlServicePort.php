<?php

namespace App\ShortenUrl\Application\Ports\spi;

use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;

interface ShortenUrlServicePort
{

    function execute(Url $url): ShortedUrl;
}
