<?php namespace App\Components\Services\Repositories;

use App\Repositories\BaseRepository;

interface ServiceRepository extends BaseRepository {

    public function all_services();
}