<?php namespace App\Components\Memorials\Repositories;

use App\Components\Memorials\Models\PhotoAlbum;
use App\Components\Memorials\Models\PhotoItem;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentPhotoItemRepository extends EloquentBaseRepository implements PhotoItemRepository
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
    public function __construct(PhotoItem $item, Guard $user)
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
        return $this->getElementById($attributes['id'])->update($attributes);
    }

    public function getListWithPaginate(PhotoAlbum $album, $paginate = 20)
    {
        return $album->photoItems()->paginate($paginate);
    }

    public function delete() {

        return 1;
    }
}