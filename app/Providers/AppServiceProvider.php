<?php

namespace App\Providers;

use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '564rx7rrbddmjvb9',
                    'publicKey' => 'cdpkz5znkwdx46zs',
                    'privateKey' => 'ab9892237623dd66c29f97acd3a8d9d8'
                ]
            );
        });
    }
}
