<?php namespace App\Components\Memorials\Repositories\Memorials;

use App\Components\Memorials\Models\Video;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentVideoRepository extends EloquentBaseRepository implements VideoRepository
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
    public function __construct(Video $video, Guard $user)
    {
        $this->model = $video;
        $this->user = $user;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = array())
    {
        $attributes['created_by'] = $this->user->user()->id;

        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes = array())
    {
        return $this->getElementById($attributes['id'])->update($attributes);
    }
}