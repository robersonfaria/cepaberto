<?php
namespace RobersonFaria\Cepaberto\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Rfweb\Cepaberto\Facade\CepAberto;

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

        $loader = AliasLoader::getInstance();
        $loader->alias('CepAberto', CepAberto::class);

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