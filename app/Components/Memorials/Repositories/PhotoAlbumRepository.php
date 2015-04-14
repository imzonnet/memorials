<?php namespace App\Components\Memorials\Repositories;

use App\Repositories\BaseRepository;

interface PhotoAlbumRepository extends BaseRepository {

    public function getListWithPaginate($paginate = 20);

}