<?php namespace App\Components\Memorials\Repositories;

use App\Components\Memorials\Models\PhotoAlbum;
use App\Repositories\BaseRepository;

interface PhotoItemRepository extends BaseRepository {

    public function getListWithPaginate(PhotoAlbum $album, $paginate = 20);
}