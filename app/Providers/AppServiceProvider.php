<?php

namespace App\Providers;

use App;
use App\Decorators\CacheMessagesDecorator;
use App\Interfaces\MessagesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        App::bind(MessagesInterface::class, CacheMessagesDecorator::class);
    }
}
