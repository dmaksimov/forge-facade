<?php

namespace Davidmaksimov\ForgeFacade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/laravel-forge.php', 'laravel_forge'
        );

        $this->app->singleton('forge', function () {
            return new Forge(config('laravel_forge.api_key'), config('laravel_forge.server_id'));
        });
    }
}
