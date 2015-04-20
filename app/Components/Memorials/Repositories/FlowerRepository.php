<?php namespace App\Components\Memorials\Repositories;

use App\Repositories\BaseRepository;

interface FlowerRepository extends BaseRepository {
    public function all_flowers();
}