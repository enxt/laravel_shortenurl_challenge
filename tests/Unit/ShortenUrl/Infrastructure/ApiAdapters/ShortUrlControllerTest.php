<?php

namespace ShortenUrl\Infrastructure\ApiAdapters;

use App\ShortenUrl\Application\Ports\api\ShortenUrlApiPort;
use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Infrastructure\ApiAdapters\Model\ShortUrlRequest;
use App\ShortenUrl\Infrastructure\ApiAdapters\ShortUrlController;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class ShortUrlControllerTest extends TestCase
{

    public function testShort_whenValidUrl_thenReturnSuccess()
    {

        // Given
        $shortUrlPort = Mockery::mock(ShortenUrlApiPort::class, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->once()->andReturn(new ShortedUrl("success"));
        });
        $shortUrlRequest = Mockery::mock(ShortUrlRequest::class, function (MockInterface $mock) {
            $mock->shouldReceive('safe')->once()->andReturn(['url' => 'http://www.test.com']);
        });
        $shortUrlController = new ShortUrlController($shortUrlPort);

        // When
        $response = $shortUrlController->short($shortUrlRequest);

        // Then
        $this->assertNotNull($response);
        $this->assertEquals("success", $response["url"]);
    }

    public function testShort_whenNoAuthBearer_thenReturnShortedUrl()
    {

        // When
        $response = $this->post("/api/v1/short-urls", ['url' => 'http://www.badurl.com']);

        // Then
        $response->assertUnauthorized();
    }

    public function testShort_whenInvalidUrl_thenUnprocssableEntity()
    {
        // When
        $response = $this->post("/api/v1/short-urls", ['url' => 'htt://www.badurl.com'], ['Authorization' => 'Bearer {}']);

        // Then
        $response->assertUnprocessable();
    }
}
