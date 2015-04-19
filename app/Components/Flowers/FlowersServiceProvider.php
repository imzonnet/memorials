<?php namespace App\Components\Flowers;

use App\Components\Flowers\Repositories\EloquentFlowerItemRepository;
use App\Components\Flowers\Repositories\EloquentFlowerRepository;
use App\Components\Flowers\Repositories\FlowerItemRepository;
use App\Components\Flowers\Repositories\FlowerRepository;
use App\Components\Services\Repositories\EloquentServiceRepository;
use App\Components\Services\Repositories\ServiceRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class FlowersServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Flowers\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'Flowers');
        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'Flowers');

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
            require app_path('Components/Flowers/routes.php');
        });
    }

    public function register()
    {

        /**
         * Repositories
         */
        $this->app->bind(FlowerRepository::class, EloquentFlowerRepository::class);
        $this->app->bind(FlowerItemRepository::class, EloquentFlowerItemRepository::class);

    }
}