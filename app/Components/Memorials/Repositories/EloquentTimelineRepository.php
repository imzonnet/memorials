<?php namespace App\Components\Memorials\Repositories;

use App\Components\Memorials\Models\Timeline;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentTimelineRepository extends EloquentBaseRepository implements TimelineRepository
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
    public function __construct(Timeline $timeline, Guard $user)
    {
        $this->model = $timeline;
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


}