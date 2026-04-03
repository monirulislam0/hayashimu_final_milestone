<?php

namespace App\Providers;

use App\Contracts\AreaContract;
use App\Contracts\CategoryContract;
use App\Contracts\NewsContract;
use App\Contracts\ProductContract;
use App\Contracts\ServiceContract;
use App\Contracts\SliderContract;
use App\Contracts\StaticPageContract;
use App\Repositories\AreaRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SliderRepository;
use App\Repositories\StaticPageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $repositories = [
        CategoryContract::class => CategoryRepository::class,
        ProductContract::class => ProductRepository::class,
        SliderContract::class  => SliderRepository::class,
        ServiceContract::class => ServiceRepository::class,
        StaticPageContract::class => StaticPageRepository::class,
        NewsContract::class => NewsRepository::class,
    ];

    public function register(): void
    {
        foreach ($this->repositories as $interface => $implementation){
            $this->app->bind($interface,$implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
