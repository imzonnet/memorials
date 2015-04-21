<?php namespace App\Components\Posts\Repositories;

use App\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository {

    public function all_categories($type = 'post');
}