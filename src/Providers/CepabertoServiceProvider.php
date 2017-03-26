<?php
namespace RobersonFaria\Cepaberto\Providers;

use Illuminate\Support\ServiceProvider;

class CepabertoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cepaberto.php' => config_path('cepaberto.php'),
        ], 'config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cepaberto.php', 'cepaberto'
        );

        $this->app->bind('cepaberto', 'RobersonFaria\Cepaberto\CepAberto' );
    }
}