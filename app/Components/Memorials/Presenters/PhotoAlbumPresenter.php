<?php namespace App\Components\Memorials\Presenters;

use Laracasts\Presenter\Presenter;

class PhotoAlbumPresenter extends Presenter
{
    public function getPermalink()
    {
        return route('memorial.photoAlbums.items',[str_slug($this->memorial->name), $this->memorial->id, $this->id]);
    }

}