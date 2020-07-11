<?php


namespace Advanture\Transactions;


use Illuminate\Support\ServiceProvider;

class TransactionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerMigrations();
    }


    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }
}
