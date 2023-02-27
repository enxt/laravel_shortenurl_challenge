<?php

namespace App\ShortenUrl\Application\Ports\api;

use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;

interface ShortenUrlApiPort
{

    function execute(Url $url): ShortedUrl;
}
