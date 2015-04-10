<?php namespace App\Components\Memorials\Repositories;

use App\Components\Memorials\Models\PhotoAlbum;
use App\Repositories\BaseRepository;

interface PhotoItemRepository extends BaseRepository {

    public function getPhotoWithPaginate(PhotoAlbum $album, $paginate = 20);
}