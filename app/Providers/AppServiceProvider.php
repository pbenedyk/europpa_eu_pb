<?php

namespace App\Providers;

use App\Http\Repositories\CatsRepository;
use App\Http\Repositories\CatsRepositoryInterface;
use App\Http\Repositories\EmployeesRepository;
use App\Http\Repositories\EmployeesRepositoryInterface;
use App\Http\Repositories\SheltersRepository;
use App\Http\Repositories\SheltersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        SheltersRepositoryInterface::class => SheltersRepository::class,
        CatsRepositoryInterface::class => CatsRepository::class,
        EmployeesRepositoryInterface::class => EmployeesRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
