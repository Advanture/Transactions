<?php


namespace Advanture\Transactions;


use Illuminate\Support\ServiceProvider;

class TransactionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!config('transactions.enabled')) {
            return;
        }

        $this->registerMigrations();

        $this->publishes([
            __DIR__ . '../config/transactions.php' => config_path('transactions.php'),
        ]);
    }


    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }
}
