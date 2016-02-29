<?php

namespace AuthOpenIdConnect;


use Illuminate\Support\ServiceProvider;

class OpenIdConnectServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/openidc.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('openidc.php')]);
        }

        $this->mergeConfigFrom($source, 'openidc');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('OpenIdConnectClient', function ($app) {
            $url = $app['config']['openidc.authServerUrl'];
            $clientId = $app['config']['openidc.clientId'];
            $clientSecret = $app['config']['openidc.clientSecret'];
            return new \OpenIDConnectClient($url, $clientId, $clientSecret);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['OpenIdConnectClient'];
    }
}