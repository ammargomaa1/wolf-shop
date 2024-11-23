<?php

namespace App\Providers;

use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use App\Repositories\ItemRepository\DatabaseItemRepository;
use Cloudinary\Configuration\Configuration;
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
        Configuration::instance('cloudinary://'. env('CLOUDINARY_API_KEY') .':' . env('CLOUDINARY_SECRET_KEY') .'@'. env('CLOUDINARY_CLOUD_NAME') .'?secure=false');
    }
}
