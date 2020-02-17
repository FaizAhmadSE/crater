<?php

namespace Crater\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapThree();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        /*ADD THIS LINES*/
        $this->commands([
            \Laravel\Passport\Console\InstallCommand::class,
            \Laravel\Passport\Console\KeysCommand::class,
            \Laravel\Passport\Console\ClientCommand::class,
        ]);
    }
}
