<?php namespace App\Components\Posts\Repositories;

use App\Components\Posts\Models\Post;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
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
    public function __construct(Post $item, Guard $user)
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
        $attributes['created_by'] = $this->user->user()->id;
        if( !isset($attributes['state']) || empty($attributes['state'])) {
            $attributes['state'] = 0;
        }
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes = array())
    {
        $attributes['created_by'] = $this->user->user()->id;
        if( !isset($attributes['state']) || empty($attributes['state'])) {
            $attributes['state'] = 0;
        }
        return $this->getElementById($attributes['id'])->update($attributes);
    }

    public function all_post($type = 'post')
    {
        return $this->model->where('type', '=', $type)->get();
    }
}