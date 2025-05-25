<?php

namespace App\Providers;

use App\Repository\Financeiro\FinanceiroRepository;
use App\Repository\Interfaces\Financeiro\FinanceiroRepositoryInterface;
use App\Repository\Interfaces\Vendas\VendasRepositoryInterface;
use App\Repository\Interfaces\Vendedor\VendedorRepositoryInterface;
use App\Repository\Vendas\VendasRepository;
use App\Repository\Vendedor\VendedorRepository;
use App\Services\Financeiro\FinanceiroService;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendas\VendasServiceInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;
use App\Services\Vendas\VendasService;
use App\Services\Vendedores\VendedoresService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(VendedorRepositoryInterface::class, VendedorRepository::class);
        $this->app->singleton(VendedorServiceInterface::class, VendedoresService::class);

        $this->app->singleton(VendasRepositoryInterface::class, VendasRepository::class);
        $this->app->singleton(VendasServiceInterface::class, VendasService::class);

        $this->app->singleton(FinanceiroRepositoryInterface::class, FinanceiroRepository::class);
        $this->app->singleton(FinanceiroInterface::class, FinanceiroService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
