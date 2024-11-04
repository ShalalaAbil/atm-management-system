<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

use App\Interfaces\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;

use App\Interfaces\BanknoteRepositoryInterface;
use App\Repositories\BanknoteRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(BanknoteRepositoryInterface::class, BanknoteRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
