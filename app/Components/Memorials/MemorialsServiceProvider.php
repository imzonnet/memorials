<?php namespace App\Components\Memorials;

use App\Components\Memorials\Repositories\Memorials\EloquentMemorialRepository;
use App\Components\Memorials\Repositories\Memorials\EloquentTimelineRepository;
use App\Components\Memorials\Repositories\Memorials\MemorialRepository;
use App\Components\Memorials\Repositories\Memorials\TimeLineRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class MemorialsServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Memorials\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'Memorials');
        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'Memorials');

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
            require app_path('Components/Memorials/routes.php');
        });
    }

    public function register()
    {

        /**
         * Repositories
         */
        $this->app->bind(MemorialRepository::class, EloquentMemorialRepository::class);
        $this->app->bind(TimelineRepository::class, EloquentTimelineRepository::class);

    }
}