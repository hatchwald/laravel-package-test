<?php
namespace MTR\PostPackage;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MTR\PostPackage\Console\InstallSeedersPackage;
use MTR\PostPackage\Http\Middleware\CapitalizeTitle;
use MTR\PostPackage\FilterPost;

class PostPackageServiceProvider extends ServiceProvider {
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php','postpackage');
        $this->app->bind('filterpost', function($app) {
            return new FilterPost();
        });
    
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../resources/views/','postpackage');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('postpackage.php')
            ],'config');

            // export migration
            $this->publishes([
                __DIR__.'/../database/migrations/2022_12_19_1000_create_posts_table.php' => database_path('migrations/2022_12_19_1000_create_posts_table.php')
            ],'migrations');

            // command
            $this->commands([
                InstallSeedersPackage::class
            ]);

            // publish view
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/postpackage')
            ],'views');

            // publish assets
            $this->publishes([
                __DIR__.'/../dist' => public_path('postpackage')
            ],'assets');
        }

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web',CapitalizeTitle::class);
    }

    public function registerRoutes()
    {
        Route::group($this->routeConfiguration(),function()
        {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    public function routeConfiguration()
    {
        return [
            'prefix' => config('postpackage.prefix'),
            'middleware' => config('postpackage.middleware')
        ];
    }

    
}