<?php namespace App\Components\Memorials;

use App\Components\Memorials\Repositories\EloquentFlowerItemRepository;
use App\Components\Memorials\Repositories\EloquentFlowerRepository;
use App\Components\Memorials\Repositories\EloquentMemorialFlowerRepository;
use App\Components\Memorials\Repositories\EloquentMemorialServiceRepository;
use App\Components\Memorials\Repositories\EloquentPhotoCommentRepository;
use App\Components\Memorials\Repositories\EloquentPhotoItemRepository;
use App\Components\Memorials\Repositories\EloquentServiceRepository;
use App\Components\Memorials\Repositories\EloquentVIdeoCommentRepository;
use App\Components\Memorials\Repositories\EloquentVideoRepository;
use App\Components\Memorials\Repositories\FlowerItemRepository;
use App\Components\Memorials\Repositories\FlowerRepository;
use App\Components\Memorials\Repositories\MemorialFlowerRepository;
use App\Components\Memorials\Repositories\MemorialServiceRepository;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\EloquentPhotoAlbumRepository;
use App\Components\Memorials\Repositories\EloquentGuestbookRepository;
use App\Components\Memorials\Repositories\EloquentMemorialRepository;
use App\Components\Memorials\Repositories\EloquentTimelineRepository;
use App\Components\Memorials\Repositories\GuestbookRepository;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoCommentRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Components\Memorials\Repositories\ServiceRepository;
use App\Components\Memorials\Repositories\TimeLineRepository;
use App\Components\Memorials\Repositories\VideoCommentRepository;
use App\Components\Memorials\Repositories\VideoRepository;
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
            __DIR__ . '/Database/Migrations/' => base_path('/database/migrations')
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
        $this->app->bind(GuestbookRepository::class, EloquentGuestbookRepository::class);
        $this->app->bind(PhotoAlbumRepository::class, EloquentPhotoAlbumRepository::class);
        $this->app->bind(PhotoItemRepository::class, EloquentPhotoItemRepository::class);
        $this->app->bind(VideoRepository::class, EloquentVideoRepository::class);
        $this->app->bind(PhotoCommentRepository::class, EloquentPhotoCommentRepository::class);
        $this->app->bind(VideoCommentRepository::class, EloquentVideoCommentRepository::class);
        $this->app->bind(MemorialServiceRepository::class, EloquentMemorialServiceRepository::class);
        $this->app->bind(MemorialFlowerRepository::class, EloquentMemorialFlowerRepository::class);
        //flowers
        $this->app->bind(FlowerRepository::class, EloquentFlowerRepository::class);
        $this->app->bind(FlowerItemRepository::class, EloquentFlowerItemRepository::class);
        //Services
        $this->app->bind(ServiceRepository::class, EloquentServiceRepository::class);

    }
}