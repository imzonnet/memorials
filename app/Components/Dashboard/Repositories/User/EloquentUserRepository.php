<?php
namespace App\Components\Dashboard\Repositories\User;

use App\Repositories\EloquentBaseRepository;
use App\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }


    public function getUserById($id)
    {
        $user = $this->model->find($id);
        if (is_null($user)) {
            throw new \Exception('User not found');
        }
        return $user;
    }
}