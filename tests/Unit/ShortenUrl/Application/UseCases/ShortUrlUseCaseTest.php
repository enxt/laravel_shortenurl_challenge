<?php

namespace ShortenUrl\Application\UseCases;

use App\ShortenUrl\Application\Ports\spi\ShortenUrlServicePort;
use App\ShortenUrl\Application\UseCases\ShortUrlUseCase;
use App\ShortenUrl\Domain\Models\ShortedUrl;
use App\ShortenUrl\Domain\Models\Url;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class ShortUrlUseCaseTest extends TestCase
{

    public function testExecute()
    {

        // Give
        $url = new Url('http://www.something.com/somethingverylargetoremember/index');
        $shortenUrlServicePortMock = Mockery::mock(ShortenUrlServicePort::class, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->once()->andReturn(new ShortedUrl('http://www.shortedurl.com/2342sadflkj'));
        });
        $shortUrlUseCase = new ShortUrlUseCase($shortenUrlServicePortMock);

        // When
        $response = $shortUrlUseCase->execute($url);

        // Then
        $this->assertNotNull($response);
        $this->assertEquals('http://www.shortedurl.com/2342sadflkj', $response->getShortedResource());
    }
}
