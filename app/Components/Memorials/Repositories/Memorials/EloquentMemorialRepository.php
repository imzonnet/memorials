<?php namespace App\Components\Memorials\Repositories\Memorials;

use App\Components\Memorials\Models\Memorial;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentMemorialRepository extends EloquentBaseRepository implements MemorialRepository
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
    public function __construct(Memorial $memorial, Guard $user)
    {
        $this->model = $memorial;
        $this->user = $user;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = array())
    {
        $attributes['created_by'] = $this->user->user()->id;
        if(!isset($attributes['timeline']) || empty($attributes['timeline'])) {
            $attributes['timeline'] = 0;
        }
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes = array())
    {
        if(!isset($attributes['timeline']) || empty($attributes['timeline'])) {
            $attributes['timeline'] = 0;
        }

        return $this->getElementById($attributes['id'])->update($attributes);
    }
}