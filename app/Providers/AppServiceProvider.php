<?php

namespace App\Providers;

use App;
use App\Decorators\CacheMessagesDecorator;
use App\Interfaces\MessagesRepositoryInterface;
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
        App::bind(MessagesRepositoryInterface::class, CacheMessagesDecorator::class);
    }
}
