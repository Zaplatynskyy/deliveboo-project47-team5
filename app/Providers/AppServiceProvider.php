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
                    'merchantId' => 'k3qtrmcbdx2ybyjt',
                    'publicKey' => 'bx4st9z4rqg7r3vw',
                    'privateKey' => '71718874cc2db5f9face3d84057f68d6'
                ]
            );
        });
    }
}
