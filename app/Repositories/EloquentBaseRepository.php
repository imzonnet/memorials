<?php
namespace App\Repositories;

class EloquentBaseRepository implements BaseRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function create(array $attributes = array())
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes = array())
    {
        return $this->getElementById($attributes['id'])->update($attributes);
    }

    public function delete(){
        return $this->model->delete();
    }

    public function with($relations)
    {
        if (is_string($relations))
        {
            $relations = func_get_args();
        }

        $this->model = $this->model->with($relations);

        return $this;
    }

    public function getElementById($id)
    {
        $element = $this->model->find($id);
        if (is_null($element)) {
            throw new \Exception('Not found');
        }
        return $element;
    }

    public function find($id, $columns = array('*'))
    {
        //$this->model->find($id, $columns);
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'), $con = "=")
    {
        return $this->model->where($attribute, $con, $value)->first($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }
}