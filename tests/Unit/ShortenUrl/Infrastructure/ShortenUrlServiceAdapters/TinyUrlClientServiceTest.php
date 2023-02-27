<?php

namespace ShortenUrl\Infrastructure\ShortenUrlServiceAdapters;

use App\ShortenUrl\Domain\Models\Url;
use App\ShortenUrl\Infrastructure\ShortenUrlServiceAdapters\TinyUrlClientService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TinyUrlClientServiceTest extends TestCase
{

    public function testExecute_whenValidUrl_thenReturnShortedUrl()
    {

        // Give
        $urlToShorten = "www.test.com";
        $expectedResult = "success";
        $tinyUrlClientAdapter = new TinyUrlClientService();

        // When
        Http::fake([config('services.tinyUrl.url') . '?*' => Http::response('success', 200)]);
        $response = $tinyUrlClientAdapter->execute(new Url($urlToShorten));

        // Then
        self::assertNotNull($response);
        self::assertEquals($expectedResult, $response->getShortedResource());
    }
}
