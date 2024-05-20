<?php

namespace App\Providers;

use App\Sources\Book\Domain\BookRepositoryInterface;
use App\Sources\Book\Infrastructure\PgSqlBookRepository;
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
        $this->app->bind(BookRepositoryInterface::class, PgSqlBookRepository::class);
    }
}
