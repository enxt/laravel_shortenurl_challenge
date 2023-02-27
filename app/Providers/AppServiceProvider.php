<?php

namespace App\Providers;

use App\ShortenUrl\Application\Ports\api\ShortenUrlApiPort;
use App\ShortenUrl\Application\Ports\spi\ShortenUrlServicePort;
use App\ShortenUrl\Application\UseCases\ShortUrlUseCase;
use App\ShortenUrl\Infrastructure\ShortenUrlServiceAdapters\TinyUrlClientService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        ShortenUrlApiPort::class => ShortUrlUseCase::class,
        ShortenUrlServicePort::class => TinyUrlClientService::class
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
