<?php namespace App\Components\Posts\Repositories;

use App\Components\Posts\Models\Category;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
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
    public function __construct(Category $item, Guard $user)
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
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes = array())
    {
        $attributes['created_by'] = $this->user->user()->id;
        return $this->getElementById($attributes['id'])->update($attributes);
    }

    public function all_categories($type = 'post')
    {
        $lists = [];
        $categories = $this->model->where('type', '=', $type)->get();
        foreach($categories as $item) {
            $lists[$item->id] = $item->title;
        }
        return $lists;
    }
}