<?php namespace App\Components\Memorials\Repositories\Memorials;

use App\Components\Memorials\Models\Guestbook;
use App\Components\Memorials\Models\Memorial;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentGuestbookRepository extends EloquentBaseRepository implements GuestbookRepository
{
    /**
     * @var Guestbook
     */
    protected $model;
    /**
     * @var Guard
     */
    protected $user;

    /**
     * @param Guestbook $guestbook
     * @param Guard $user
     */
    public function __construct(Guestbook $guestbook, Guard $user)
    {
        $this->model = $guestbook;
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