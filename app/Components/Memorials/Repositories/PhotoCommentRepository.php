<?php namespace App\Components\Memorials\Repositories;

use App\Components\Memorials\Models\PhotoAlbum;
use App\Repositories\BaseRepository;

interface PhotoCommentRepository extends BaseRepository {

    public function getCommentsChild($id);

}