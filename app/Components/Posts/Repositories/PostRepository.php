<?php namespace App\Components\Posts\Repositories;

use App\Repositories\BaseRepository;

interface PostRepository extends BaseRepository {

    public function all_post($type = 'post');
}