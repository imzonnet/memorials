<?php namespace App\Components\Dashboard;

use App\Components\Dashboard\Repositories\User\EloquentUserRepository;
use App\Components\Dashboard\Repositories\User\UserRepository;
use App\Components\Flowers\FlowersServiceProvider;
use App\Components\Posts\PostsServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
/**
 * Import Components
 */
use App\Components\Memorials\MemorialsServiceProvider;
use App\Components\Services\ServiceServiceProvider;


class DashboardServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Dashboard\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'Dashboard');
        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'Dashboard');

        $this->publishes([
            __DIR__ . '/Database/migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Components/Dashboard/routes.php');
        });
    }

    public function register()
    {
        /**
         * Bind Repositories
         */
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        /**
         * Register Child Component
         */
        $this->app->register(PostsServiceProvider::class);
        $this->app->register(MemorialsServiceProvider::class);
    }

}