<?php

namespace PredictorAPI\Client;

use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/predictorapi.php', 'predictorapi');

        $this->app->singleton(Client::class, fn() => new Client());
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }
}
