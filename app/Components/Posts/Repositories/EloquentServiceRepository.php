<?php namespace App\Components\Posts\Repositories;

use App\Components\Services\Models\Service;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentServiceRepository extends EloquentBaseRepository implements ServiceRepository
{
    /**
     * @var Memorial
     */
    protected $model;
    /**
     * @var Guard
     */
    protected $user;

    /**
     * @param Memorial $memorial
     * @param Guard $user
     */
    public function __construct(Service $item, Guard $user)
    {
        $this->model = $item;
        $this->user = $user;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = array())
    {
        //$attributes['created_by'] = $this->user->user()->id;

        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes = array())
    {
        if( !isset($attributes['state']) || empty($attributes['state'])) {
            $attributes['state'] = 0;
        }
        return $this->getElementById($attributes['id'])->update($attributes);
    }

}