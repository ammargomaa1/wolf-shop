<?php

namespace App\Providers;

use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use App\Repositories\ItemRepository\DatabaseItemRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, DatabaseItemRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
