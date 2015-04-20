<?php namespace App\Components\Posts;

use App\Components\Services\Repositories\EloquentServiceRepository;
use App\Components\Services\Repositories\ServiceRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class PostsServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Posts\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'Posts');
        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'Posts');

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
            require app_path('Components/Posts/routes.php');
        });
    }

    public function register()
    {

        /**
         * Repositories
         */
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);

    }
}