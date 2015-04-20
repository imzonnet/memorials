<?php namespace App\Components\Memorials\Repositories;

use App\Repositories\BaseRepository;

interface ServiceRepository extends BaseRepository {

    public function all_services();
}